<?php
namespace App\Controllers;
use App\Core\View;

class KelionesC extends \App\Core\Controller
{
    public function keliones($tipas = '')
    {
        $KelionesM = new \App\Models\KelionesM;
        if (isset($_GET['KelTipas'])) {
            $kel_tipas = htmlspecialchars(strip_tags($_GET['KelTipas']));
            $data['keliones']     = $KelionesM->getHolidayByType($kel_tipas);
            $data['keliones_tipas'] = $_GET['KelTipas'];
        } elseif (isset($_GET['TransportoTipas'])) {
            $transporto_tipas = htmlspecialchars(strip_tags($_GET['TransportoTipas']));
            $data['keliones'] = $KelionesM->getHolidayByTransportType($transporto_tipas);
        }

        $data['sidebarNums']  = $KelionesM->getHolidayNums();

//___________________________________TEST_____________________________________//
if (isset($_GET['KelTipas']) && isset($_GET['menesis'])){
    $kel_tipas = htmlspecialchars(strip_tags($_GET['KelTipas']));
    $data['keliones'] = $KelionesM->getHolidaysByTypeAndMonth($kel_tipas, $_GET['menesis']);
}
//___________________________________TEST_____________________________________//

        View::render('keliones/kelionesV', $data);
    }

    public function sidebarSearch()
    {
        $KelionesM = new \App\Models\KelionesM;
        $data['sidebarNums']  = $KelionesM->getHolidayNums();
        View::render('TravelSearchV', $data);
    }

    // for testing purposes
    public function ajaxData($keltipas = 'Poilsine') {
        $KelionesM = new \App\Models\KelionesM;
        $data['keliones']     = $KelionesM->getHolidayByType($keltipas);
        View::render('ajaxtestV', $data);
    }
} // end of class
