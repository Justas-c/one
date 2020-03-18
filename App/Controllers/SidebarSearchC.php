<?php
namespace App\Controllers;
use App\Core\View;
//------------------------------Import----------------------------------------//

/*
                                Sidebar Search
*/


class SidebarSearchC extends \App\Core\Controller
{
    public function sidebarSearch() {
        $KelionesM = new \App\Models\KelionesM;
        $data['sidebarNums']  = $KelionesM->getHolidayNums();

        // removes unneeded vars (SidebarSearchC/sidebarSearch & searchfilter)
        $get = array_slice($_GET, 2);
        $KelionesM->sidebarSearch($get);

        View::render('sidebarSearchAjaxV', $data);
    }
}
?>
