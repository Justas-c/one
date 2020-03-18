<?php
namespace App\Controllers;

abstract class Authenticated extends \App\Core\Controller
{
    protected function before()
    {
        $this->requireLogin();
    }
}
