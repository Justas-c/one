<?php
namespace App\Controllers\Admin;
use \App\Core\View;
use \App\Flash;
use \App\Models\AdminM;

class AdminC extends \App\Controllers\Authenticated
{
    private $adminModel;

  protected function before()
  {
      // this function(as newer) overwrites default before function in __call;
      if (!isset($_SESSION['admin_id'])){
          $this->redirect('admin/adminC/aLogin');
      }
  }



  protected function after()
  {
      // Some code after
  }

  public function indexAction()
  {
      // index
      $data['pageTitle'] = 'Index';
      View::render('admins/admin_index', $data);
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
    $data['pageTitle'] = 'Login';
    View::render('admins/admin_login', $data);
    }

    public function aRegister()
    {
        // Sanitize
        // Reikes dar validation parasyt, arba ta perrasyt.
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = sanpostStr();

            $this->adminModel = new \App\Models\UserM;
            if ($this->adminModel->adminRegister($data)){
                \App\Flash::addMessage('You have successfully registered your account. Please wait for registration to be approved');
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/' . 'one' . '/' . 'admin/adminC/aLogin');
                exit;
            } else {
                //$data = ['message' => 'Registration failed', 'errors' => $this->adminModel->val_errors];
                View::render('admins/admin_register' , ['message' => 'Registration failed', 'errors' => $this->adminModel->val_errors]);
                exit;
            }
        }
        // default
        $data['pageTitle'] = 'Register';
        View::render('admins/admin_register', $data);
    }

    public function aLogout()
    {
        \App\Auth::logout();
        \App\Flash::addMessage('You have logged out');
        $this->redirect('admin/adminC/aLogin');
    }

    public function addHolidayFormAction()
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
                //$adminModel->updateKelioniuSkaicius($postdata);
                FLASH::addMessage('Holiday added!');
                $this->redirect('');
            } else {
                FLASH::addMessage('Ups, smth went wrong', FLASH::WARNING);
                View::render('admins/AddHolidayForm');
            }

        // default
        } else {
        $data['pageTitle']= 'add holiday';
        View::render('admins/AddHolidayForm', $data);
        }
    }


    public function aholidaysAction()
    {
        $this->adminModel = new adminM;
        printr($this->adminModel);

        View::render('admins/admin_holidays');
    }

    /* Shows holiday list */
    public function holidaylistAction() {
        $this->adminModel = new adminM;
        $all = $this->adminModel->allHolidays();
        //printr($all);
        $data['pageTitle']= 'holiday list';
        $data['keliones'] = $all;
        // render view:
        View::render('admins/holidayListV', $data);
    }

    public function editHolidayAction()
    {
        $KelionesM = new \App\Models\KelionesM;
        $this->adminModel = new adminM;
        $id = $_GET['id'];
        $postdata['id'] = $id;
        // If form data posted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //die('sitas kai postina');
            //filter
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            foreach($_POST as $key => $value) {
                $postdata[$key] = htmlspecialchars(strip_tags(trim($value)));
            }

            // if successfully added:
            if ($this->adminModel->editHoliday($postdata)) {
                //$adminModel->updateKelioniuSkaicius($postdata);
                FLASH::addMessage('Holiday edited!');

                // test
                $data['kelione'] = $KelionesM->getHolidayById($_GET['id']);
                View::render('keliones/KelioneV', $data);

                //View::render('keliones/KelioneV', $data);
            } else {
                FLASH::addMessage('Ups, smth went wrong', FLASH::WARNING);
                $data['pageTitle']= 'edit holiday';
                View::render('admins/editHolidayV', $data);
            }

        // default
        } else {
            FLASH::addMessage('Please note: Main image file needs to be choosen manually', FLASH::WARNING);
            $data['pageTitle']= 'edit holiday';
            $data['kelione'] = $KelionesM->getHolidayById($id);
            View::render('admins/editHolidayV', $data);
        }
    }

    // deletes holiday and table db->kelioniu_skaicius -1 relative fields
    public function deleteHolidayAction($id = -1){
        $id = $_GET['id'];
        $this->adminModel = new adminM;
        $this->adminModel->deleteHolidayById($id);
    }

    // get all admins
    public function adminListAction(){
        $this->adminModel = new adminM;
        $data['pageTitle'] = 'admin list';
        $data['all_admins'] = $this->adminModel->allAdmins();
        View::render('admins/adminList', $data);
    }
    // get all users
    public function userListAction(){
        $this->adminModel = new adminM;
        $data['pageTitle'] = 'user list';
        $data['all_users'] = $this->adminModel->allUsers();
        View::render('admins/userList', $data);
    }

} //End of class
