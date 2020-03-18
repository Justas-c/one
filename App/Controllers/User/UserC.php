<?php
namespace App\Controllers\User;
use App\Core\View;
use App\Flash;

class UserC extends \App\Core\Controller
{
    protected $userModel;

    public function login()
    {
        $this->userModel = new \App\Models\UserM;

        // Sanitize:
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $post_data = sanPostStr();

            $this->userModel->user = $this->userModel->authenticate($post_data['email'], $post_data['password']);
            $remember_me = isset($post_data['remember_me']);

            if ($this->userModel->user){
                \App\Auth::login($this->userModel, $remember_me);
                Flash::addMessage('Login successfull');
                $this->redirect(\App\Auth::getReturnToPage());
            }
        }
        //default
        View::render('Users/login');
    }

    public function register()
    {
        $this->userModel = new \App\Models\UserM;

        //Sanitize
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = sanPostStr();
            if ($this->userModel->Register($data)) {
                Flash::addMessage('Registration succesfull!');
                $this->userModel->sendActivationEmail($data['email']);
                $this->redirect('User/UserC/success');
            } else {
                View::render('Users/signup', ['message' => 'Registration failed', 'errors' => $this->userModel->val_errors]);
            }
        } else {
            View::render('Users/signup');
        }
    }

    public static function authenticate($email, $password)
    {
        $user = self::findByEmail($email);
        if ($user) {
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        //default
        return false;
    }

    public function successAction()
    {
        View::render('Users/signup_success');
    }

    public function logout()
    {
        \App\Auth::logout();
        $this->redirect('User/UserC/showLogoutMessage');
    }

    public function showLogoutMessage()
    {
        Flash::addMessage('Logout successfull');
        $this->redirect('');
    }

    // Activate account by email
    public function activateAccount()
    {
        $this->userModel = new \App\Models\UserM;
        $this->userModel::activateRegAccount($this->route_params['token']);
        $this->redirect('User/UserC/activated');
    }

    // Show the activation success page
    public function activated()
    {
        View::render('Users/activated');
    }

}//end of class
