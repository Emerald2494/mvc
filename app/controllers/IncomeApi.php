<?php

class IncomeApi extends Controller
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
        
    }
    public function index()
    {
        // echo "Welcome";
        $incomes = $this->db->readAll('vw_categories_types_users');
        $json = array('data' => $incomes);
        echo json_encode($json);
    }

    public function fileUpload()
    {
       $this->view('incomes/upload');
    }

    public function create()
    {
        $categories = $this->db->readAll('categories');
        $data = [
            'categories' => $categories,
        ];
        $this->view('create/create',$data);
    }
    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $category_id = $_POST['category'];
            $amount = $_POST['amount'];
            session_start();
            $user_id = base64_decode($_SESSION['id']);
            $date = date('Y/m/d');

            $this->model('IncomeModel');
            $incomes = new IncomeModel();
            $incomes->setAmount($amount);
            $incomes->setCategoryId($category_id);
            $incomes->setUserId($user_id);
            $incomes->setDate($date);
        }
        $this->db->create('incomes',$incomes->toArray());
        redirect('incomes');
    }
    
    public function import()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $temp = $_FILES['file']['tmp_name'];
            // print_r($temp);
            session_start();
            if (file_exists($_FILES['file']['tmp_name'])) {
                $fileName = $_FILES['file']['tmp_name'];
                $handle = fopen($fileName, 'r');
                // print_r($handle);
                // exit;
                if ($handle !== FALSE) {
                    $header = fgetcsv($handle);
                    // print_r(array_flip($header));
                    // exit;
                    while($data = fgetcsv($handle)) {
                        $cateogry = $data[0];
                        $amount = $data[1];
                        $date = $data[2];
                        // print_r($date);
                        // exit;
                        
                        $user_id = base64_decode($_SESSION['id']);
                        // echo $user_id;
                        // exit;
                        

                        $isColumnExist = $this->db->columnFilter('categories', 'name', $data[0]);
                        // print_r($isColumnExist);
                        if ($isColumnExist) {
                            $c_id = $this->db->getById('categories', $data[0]);
                            $category_id = implode($c_id);
                            $this->model('IncomeModel');
                            $income = new IncomeModel();
                            $income->setAmount($amount);
                            $income->setCategoryId($category_id);
                            $income->setUserId($user_id);
                            $income->setDate($date);
                            $isCreated = $this->db->create('incomes', $income->toArray());
                            redirect('income');
                        } else {
                            $name = $data[0];
                            $type_id = 1;
                            $description = 'Automatic fill';
                            $category = $this->model('CategoryModel');
                            $category->setName($name);
                            $category->setDescription($description);
                            $category->setTypeId($type_id);

                            $c_id = $this->db->getById('categories', $data[0]);
                            // $category_id = implode($c_id);
                            $this->model('IncomeModel');
                            $income = new IncomeModel();
                            $income->setAmount($amount);
                            $income->setCategoryId($c_id);
                            $income->setUserId($user_id);
                            $income->setDate($date);
                            $isCreated = $this->db->create('incomes', $income->toArray());
                            redirect('income');
                        };
                    }
                }
            }
        }
    }

    // public function importExcelFile()
    // {
        
    //     if(isset($_POST["submit"])){
    //         $file = $_FILES['file']['tmp_name'];
    //         $handle = fopen($file, "r");
    //         $c = 0;
    //         while(($filesop = fgetcsv($handle)) !== false)
    //         {
    //             if($_SERVER['REQUEST_METHOD'] == 'POST')
    //                 {
    //                     $category_id = $filesop[0];
    //                     $amount = $filesop[1];
    //                     session_start();
    //                     $user_id = base64_decode($_SESSION['id']);
    //                     $date = $filesop[2];

    //                     $this->model('IncomeModel');
    //                     $incomes = new IncomeModel();
    //                     $incomes->setAmount($amount);
    //                     $incomes->setCategoryId($category_id);
    //                     $incomes->setUserId($user_id);
    //                     $incomes->setDate($date);
    //                 }
    //                 $importSuccess = $this->db->create('incomes',$incomes->toArray());
    //                 $c = $c+1;
    //                 if($importSuccess)
    //                 {
    //                     echo " Your excel file successfully imported";
    //                 }
    //                 else{
    //                     echo "please try again!";
    //                 }
    //                 redirect('incomes');
    //         }
    //     }
    // }

    
    public function edit($id)
    {
        $income = $this->db->getById('incomes',$id);
        $category = $this->db->readAll('categories');
        $data = [
            "incomes" => $income,
            "categories" => $category,
        ];

        $this->view('incomes/edit',$data);
    }
    public function update($id)
    {
        $body = json_decode(file_get_contents('php://input'));
        // print_r($body);
        // exit;
        if($_SERVER['REQUEST_METHOD'] == 'PUT')
        {
            
            $amount = $body->amount;
            $category = $body->category_name;
            session_start();
            $user_id = $body->user_name;
            $date = $body->date;

            $this->model('IncomeModel');
            $income = new IncomeModel();
            $income->setId($id);
            $income->setAmount($amount);
            $income->setCategoryId($category);
            $income->setUserId($user_id);
            $income->setDate($date);

            $isUpdated = $this->db->update('incomes',$income->getId(),$income->toArray());
            // redirect('incomes');

        }
        $id = (int)$isUpdated;
        $update_data = $this->db->getById('incomes', $id);
        if(isset($update_data)) {
            $data['success'] = true;
            $data['msg'] = "Income Updated Successfully";
        }else {
            $data['success'] = false;
        }
        echo json_encode($data);
    }

    public function delete($id)
    {
        // $id = base64_decode($id);
        // $this->model('IncomeModel');
        // $income = new IncomeModel();
        // $income->setId($id);

        $isDeleted = $this->db->delete('incomes', $id);
        // setMessage('success',"Your imaginary file has been deleted.");
        // redirect('incomes');
        $del_id = (int)$isDeleted;
        $delete_data = $this->db->getById('incomes', $del_id);
        if(isset($delete_data)) {
            $data['success'] = true;
            $data['msg'] = "Income Deleted Successfully";
        }else {
            $data['success'] = false;
        }
        echo json_encode($data);
    }
}