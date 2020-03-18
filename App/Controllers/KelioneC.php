<?php
namespace App\Controllers;
use App\Core\View;

class KelioneC extends \App\Core\Controller
{
    public function kelione()
    {
        $KelionesM = new \App\Models\KelionesM;

        $data['kelione'] = $KelionesM->getHolidayById($_GET['id']);
        $data['destinations'] = '';

        $id_ir_men = $KelionesM->getAllHolidayByTypeMonth($data['kelione']['KelionesTipas']);
        $count = count($id_ir_men);

        for ($i=0; $i < $count; $i++) {
            $id[] = $id_ir_men[$i]['id'];
            $men[] = $id_ir_men[$i]['month(IsvykimoData)'];
        }

        $menesiai = $KelionesM->getAllHolidayByTypeMonth($data['kelione']['KelionesTipas']);
        $menKel = [0,0,0,0,0,0,0,0,0, 0, 0, 0, 0];
        //         1,2,3,4,5,6,7,8,9,10,11,12,13

        foreach ($men as $key => $value) {
            $menKel[$value]++;
        }
        $data['menKeliones'] = $menKel;

        View::render('keliones/KelioneV', $data);
    }
}
