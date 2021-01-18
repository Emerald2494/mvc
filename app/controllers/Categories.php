<?php
class Categories extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('CategoryModel');
        $this->db = new Database;
    }
    public function index()
    {
       $categories = $this->db->readAll('vw_categories_types');
        $data = [
            'categories' => $categories,
        ];
        // print_r($data['categories']);
        $this->view('categories/datatable',$data);
    }

    public function create()
    {
        $types = $this->db->readAll('types');
        $data = [
            'types' => $types,
        ];
        // print_r($data);
        $this->view('categories/create_new',$data);
    }


    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $type = $_POST['type'];

            $category = new CategoryModel();
            $category->setName($name);
            $category->setDescription($description);
            $category->setType($type);
            
            $categoryCreated = $this->db->create('categories',$category->toArray());
            // print_r($categoryCreated);
            setMessage('success','Added new category');
            redirect('categories/');
        }else{
            echo 'try again';
        }
    }

    public function edit_category($id)
    {
        
        $types = $this->db->readAll('types');
        $categories = $this->db->getById('categories',$id);
        // print_r($categories);
        $data = [
            'types' => $types,
            'categories' => $categories,
        ];
        // print_r($data['types']);
        
         $this->view('categories/edit_category',$data);
    }

    public function update(){
       
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $type = $_POST['type'];

            $category = new CategoryModel();
            $category->setId($id);
            $category->setName($name);
            $category->setDescription($description);
            $category->setType($type);
            
            $categoryCreated = $this->db->update('categories',$id,$category->toArray());
            setMessage('success','Update Successful!');
            redirect('categories/');
        }else{
            echo 'try again';
        }
        
    }
    public function delete($id)
    {
        // echo $id;
        $id = base64_decode($id);

        $category = new CategoryModel();
        $category->setId($id);

        $isDeleted= $this->db->delete('categories',$category->getId());
        redirect('categories');
    }

   
}