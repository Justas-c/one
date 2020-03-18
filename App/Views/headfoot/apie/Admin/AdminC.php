<?php
namespace App\Controllers\Admin;
use \App\Core\View;
use \App\Flash;

class AdminC extends \App\Core\Controller
{
    private $adminModel;

  protected function before()
  {
      // Some code before
  }

  protected function after()
  {
      // Some code after
  }

  public function index()
  {
      View::render('admins/admin_index');
      test('Admin Index');
  }


  public function indexAction()
  {
      echo '\admin Admins.php indexAction';
  }

  public function aLogin(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = sanpostStr();
        $this->adminModel = new \App\Models\UserM;
        printr($data);
        $this->adminModel->admin = $this->adminModel->authenticateAdmin($data['email'], $data['password']);

        if ($this->adminModel->admin) {
            \App\Auth::adminLogin($this->adminModel);
            \App\Flash::addMessage('Login successfull');
            $this->redirect('admin/adminC/index');
        } else {
            //View::render('admins/admin_login');
            //die('ups, smth wrong');
        }
    }
    // default
    View::render('admins/admin_login');
    }

    public function aRegister()
    {
        // Sanitize
        // Reikes dar validation parasyt, arba ta perrasyt.

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = sanpostStr();

            $this->adminModel = new \App\Models\userM;
            if ($this->adminModel->adminRegister($data)){
                \App\Flash::addMessage('You have successfully registered your account. Please wait for registration to be approved');
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/' . SITENAME . '/' . 'admin/adminC/aLogin');
                exit;
            } else {
                //$data = ['message' => 'Registration failed', 'errors' => $this->adminModel->val_errors];
                View::render('admins/admin_register' , ['message' => 'Registration failed', 'errors' => $this->adminModel->val_errors]);
                exit;
            }
        }
        // default
        View::render('admins/admin_register');
    }

    public function aLogout()
    {
        \App\Auth::logout();
        \App\Flash::addMessage('You have logged out');
        $this->redirect('admin/adminC/index');
    }

    public function addHolidayForm()
    {
        $adminModel = new \App\Models\AdminM;

        // If form data posted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //filter
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            foreach($_POST as $key => $value){
                $postdata[$key] = htmlspecialchars(strip_tags(trim($value)));
            }

        // if successfully added:
            if ($adminModel->addHoliday($postdata)) {
                $adminModel->updateKelioniuSkaicius($postdata);
                FLASH::addMessage('Holiday added!');
                $this->redirect('');
            } else {
                FLASH::addMessage('Ups, smth went wrong', FLASH::WARNING);
                View::render('admins/AddHolidayForm');
            }

        // default
        } else {
        View::render('admins/AddHolidayForm');
        }
    }

} //End of class


















// class UserC extends \App\Core\Controller
// {
//     protected $userModel;
//
//     public function login()
//     {
//         $this->userModel = new \App\Models\UserM;
//
//         // Sanitize:
//         if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//             $post_data = sanPostStr();
//
//             $this->userModel->user = $this->userModel->authenticate($post_data['email'], $post_data['password']);
//             $remember_me = isset($post_data['remember_me']);
//
//             if ($this->userModel->user){
//                 \App\Auth::login($this->userModel, $remember_me);
//                 Flash::addMessage('Login successfull');
//                 $this->redirect(\App\Auth::getReturnToPage());
//             }
//         }
//         //default
//         View::render('Users/login');
//     }
