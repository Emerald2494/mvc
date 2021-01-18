<?php

class Incomes extends Controller
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
        $data = [
            "incomes" => $incomes,
        ];
        $this->view('incomes/index',$data);
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
    public function update()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id = $_POST['id'];
            $amount = $_POST['amount'];
            $category = $_POST['category'];
            session_start();
            $user_id = base64_decode($_SESSION['id']);
            $date = date('Y/m/d');

            $this->model('IncomeModel');
            $income = new IncomeModel();
            $income->setId($id);
            $income->setAmount($amount);
            $income->setCategoryId($category);
            $income->setUserId($user_id);
            $income->setDate($date);

            $isUpdated = $this->db->update('incomes',$income->getId(),$income->toArray());
            redirect('incomes');

        }
    }

    public function delete($id)
    {
        // $id = base64_decode($id);
        // $this->model('IncomeModel');
        // $income = new IncomeModel();
        // $income->setId($id);

        $isDeleted = $this->db->delete('incomes', $id);
        setMessage('success',"Your imaginary file has been deleted.");
        redirect('incomes');
    }
}