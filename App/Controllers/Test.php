<?php
namespace App\Controllers;
use App\Models\TestPost;
use App\Core\View;

class Test extends \App\Core\Controller
{
    public function test()
    {
        $KelionesM = new \App\Models\KelionesM;
        $data['sidebarNums']  = $KelionesM->getHolidayNums();

        if (isset($_GET['KelTipas'])) {
            $data['KelTipas'] = $_GET['KelTipas'];
        } elseif (isset($_GET['TransportoTipas'])) {
            $data['TransportoTipas'] = $_GET['TransportoTipas'];
        } elseif (isset($_GET['Kaina'])) {
            $data['Kaina'] = $_GET['Kaina'];
        }

        // if first redirect was made, get holiday with php
        if (count($_GET) == 3) {
            $x[array_key_last($_GET)] = (array)end($_GET);
            $data['keliones'] = $KelionesM->sidebarSearch($x);
        }

        View::render('TravelSearchV', $data);
    }
}//end of class
