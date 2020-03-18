<?php
namespace App\Controllers;
use App\Core\View;

class Home extends \App\Core\Controller
{
    public function index()
    {
        $KelionesM = new \App\Models\KelionesM;
        $data['keliones'] = $KelionesM->mainPageHolidays();
        $data['sidebarNums'] = $KelionesM->GetHolidayNums();

        View::render('Home/index', $data);
    }

    public function homeIndex()
    {
        echo 'hello from C(Home) (M>homeIndex';
    }

    public function indexAction()
    {
        View::render('Home/index', [
            'name'    => 'Rasa',
            'colours' => ['yellow', 'green', 'red']
        ]);
    }

    public function apieMus()
    {
        View::render('headfoot/apie/apie_mus');
    }
    public function karjera()
    {
        View::render('headfoot/apie/karjera');
    }
    public function kontaktai()
    {
        \App\Flash::addMessage('The Map api is not fully supported since it\'s in development mode and billing info was not added yet.', \App\FLASH::WARNING);
        View::render('headfoot/apie/kontaktai');
    }

    public function Vizos()
    {
        printr($_GET);
        View::render('headfoot/apie/vizos');
    }

}// end of class
