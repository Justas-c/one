<?php
namespace App\Core;

abstract class Controller
{
    protected $route_params = [];

    public function __construct($route_params)
    {
        //$route_params - passed by router dispatch method
        $this->route_params = $route_params;
    }

    public function __call($name, $args)
    {
        // runs when required method was not found
        //echo 'Since method - <b>' . $name . '</b> is not found Core/Controller _call is being called';
        $method = $name . 'Action';
        if (method_exists($this, $method)){
            //call the before method of authenticated class in which before calls requireLogin
            if ($this->before() !== false){
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
          // redirect to index page
          //throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }

    protected function before()
    {
    // optional base code before __call
    }

    protected function after()
    {
    // optional base code after __call
    }

    public function redirect($url)
    {
        // if not working need to modify (M)rememberRequestPage() (C)Auth
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/' . 'one' .  '/' . $url, true, 303);
        exit;
    }

    public function requireLogin()
    {
        if (! \App\Auth::getUser()) {
            \App\Auth::rememberRequestedPage();
            \App\Flash::addMessage('Please log in to view the page', \App\FLASH::INFO);

            $this->redirect('login');
        }
    }

}// end of class
