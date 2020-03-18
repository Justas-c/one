<?php
namespace App\Controllers;
use App\Core\View;

class Items extends \App\Controllers\Authenticated
{

    // this before will only be run with +Action controllers(__call)
    protected function before()
    {
        $this->requireLogin();
        echo 'this before is only called by adding Action to method(__call)';
    }

    public function indexAction()
    {
        //$this->requireLogin();
        \App\Core\View::render('Items/Item');
    }

    public function travAction()
    {
        View::render('testView', ['user' => \App\Auth::getUser()]);;
    }

}
