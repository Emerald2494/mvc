<?php

class Pages extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    
    }
    public function index()
    {
        // echo "Welcome";
        $this->view('pages/login');
    }

    public function about()
    {
        $this->view('pages/about'); 
    }

    public function register()
    {
        $this->view('pages/register');
    }
    public function login()
    {
        $this->view('pages/login');
    }

    public function dashboard()
    {
        $this->view('pages/dashboard');
    }
    
    

}
