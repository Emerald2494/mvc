<?php

class Expenses extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('ExpenseModel');
        $this->db = new Database();
    }
    
    public function index()
    {
        // $expenses = $this->db->readAll('vw_categories_users_expenses');
        // $data = [
        //     "expenses" => $expenses,
        // ];
        $this->view('expenses/index');
    }

    public function expenseData() {
        $expenses = $this->db->readAll('vw_categories_users_expenses');
        $json = array('data' => $expenses);
        echo json_encode($json);
    }
    public function create()
    { 
        $categories = $this->db->readAll('categories');
        $types = $this->db->readAll('types');
        $data = [
            "categories" => $categories,
            "types" => $types,
        ];
        $this->view('create/create',$data);
    }
    
    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $category = $_POST['category'];
            $amount = $_POST['amount'];
            $qty = $_POST['qty'];
            session_start();
            $user_id = base64_decode($_SESSION['id']);
            $date = date('Y/m/d');

            $expenses = new ExpenseModel();
            $expenses->setCategoryId($category);
            $expenses->setAmount($amount);
            $expenses->setQty($qty);
            $expenses->setUserId($user_id);
            $expenses->setDate($date);
            $expenses = $this->db->create('expenses',$expenses->toArray());
        }
         redirect('expenses');
    }
    
    public function edit($id)
    {
        //  $id = $_POST['id'];
        $expenses = $this->db->getById('expenses',$id);
        $categories = $this->db->readAll('categories');

        $data = [
            "expenses" => $expenses,
            "categories" => $categories,
        ];

        $this->view('expenses/edit',$data);
    }

    public function update()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id = $_POST['id'];
            $amount = $_POST['amount'];
            $category = $_POST['category'];
            $qty = $_POST['qty'];
            session_start();
            $user_id = base64_decode($_SESSION['id']);
            $date = date('Y/m/d');

            $this->model('ExpenseModel');
            $expense = new ExpenseModel();
            $expense->setId($id);
            $expense->setAmount($amount);
            $expense->setCategoryId($category);
            $expense->setQty($qty);
            $expense->setUserId($user_id);
            $expense->setDate($date);

            $isUpdated = $this->db->update('expenses',$expense->getId(),$expense->toArray());
            redirect('expenses');

        }
    }

    public function delete($id)
    {
        // $id = base64_decode($id);
        // $this->model('ExpenseModel');
        // $expense = new ExpenseModel();
        // $expense->setId($id);

        // $isDeleted = $this->db->delete('expenses', $expense->getId());
        // redirect('expenses');

        // $id = $_POST['id'];
      
        $this->db->delete('expenses', $id);
        setMessage('success',"Your imaginary file has been deleted.");
        redirect('/expense/index');
    }
}