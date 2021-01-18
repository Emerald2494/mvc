<?php

class Auth extends Controller
{
    private $db;
    private $auth;
    public function __construct()
    {
        $this->model('UserModel');

        $this->db = new Database;

    }

    public function formRegister(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email_check']) && $_POST['email_check'] == 1) {

			
            $email = $_POST['email'];
            $isUserExist = $this->db->columnFilter('users','email',$email);
            if($isUserExist) {
				echo "Sorry! email has already taken. Please try another.";
			}
		}
    }


    public function register()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            
            // Check user exist 
            $email = $_POST['email'];
            $isUserExist = $this->db->columnFilter('users','email',$email);
            if($isUserExist)
            {
                setMessage("error","This email is already registered !");
                redirect('/page/register');
            }
            else
            {
            
            // Validate entries
            $validation = new UserValidator($_POST);
            $data       = $validation->validateForm();
            if (count($data) > 0) {
                $this->view('pages/register', $data);
            }
            else{
                $name = ($_POST['name']);
                $email = ($_POST['email']);
                $password = ($_POST['password']);

                $profile_image = 'default_profile.jpg';
                $token        = bin2hex(random_bytes(50));
                
                //Hash Password before saving
                $password = base64_encode(($password));

                $user = new UserModel();
                $user->setName($name);
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setToken($token);
                $user->setProfileImage($profile_image);
                $user->setIsLogin(0);
                $user->setIsActive(0);
                $user->setIsConfirmed(0);
                $user->setDate(date('Y-m-d H:i:s'));

                $userCreated = $this->db->create('users', $user->toArray());
                //$userCreated="true";
        
                if($userCreated) 
                {  
                    //Instatiate mail
                    $mail = new Mail();
                    
                    $verify_token = URLROOT.'/auth/verify/'.$token;
                    $mail->verifyMail($email,$name,$verify_token);
                    
                    setMessage("success","Please check your inbox to verify your email address !");
                
                }

                redirect('');

                }  // end of validation check

            }  // end of user-exist

            }
            
        }

        public function verify($token)
        {
            $user = $this->db->columnFilter('users','token',$token);

            if($user)
            {
               $success =  $this->db->verify($user[0]['id']);

               if($success)
               {
                   setMessage("success","Successfully Verified . Please log in !");
                 
               }
               else{
    
                setMessage("error","Fail to Verify . Please try again!");
    
               }
            }

            else 
            {
                setMessage("error","Incrorrect Token . Please try again!");
            }

            redirect("");
        }


    
    public function login_success()
    {
        // echo "Login Success!";
        if($_SERVER['REQUEST_METHOD'] == 'POST') { //check request method is POST
            $email = $_POST['email'];
            $password = base64_encode($_POST['password']);       
            $isEmailExist = $this->db->loginCheck('users', 'email', $email,'password',$password);
    
             if ($isEmailExist){

                setMessage('id',base64_encode($isEmailExist['id']));
               $id = $isEmailExist['id'];
               $isUpdate = $this->db->UpdateLogin($id);
               redirect('pages/dashboard');
        
            }else {
                //echo "Invalid Email and try again!";
                  setMessage('error','Login fail!');
                  redirect('');
            }
            
        }
    }
}