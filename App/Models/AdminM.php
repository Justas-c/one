<?php
namespace App\Models;
use PDO;

class AdminM extends \App\Core\Model
{
    public function addHoliday($postdata)
    {
    $db = static::getDb();
    $sql = 'INSERT INTO keliones
    (Pavadinimas, Title, Intro, IsvykimoData, GryzimoData, Programa, Video, Iskaiciuota, PapildomasIslaidos, Valstybe, Miestas, Viesbutis, Kaina, MainImage, KelionesTipas, TransportoTipas, DateDiff, Random1Heading, Random1Text)
    VALUES
    (:Pavadinimas, :Title, :Intro, :IsvykimoData, :GryzimoData, :Programa, :Video, :Iskaiciuota, :PapildomasIslaidos, :Valstybe, :Miestas, :Viesbutis, :Kaina, :MainImage, :KelionesTipas, :TransportoTipas, :DateDiff, :Random1Heading, :Random1Text)';
    $stmt = $db->prepare($sql);

    // date time sujungimas
    $postdata['IsvykimoData'] = $postdata['IsvykimoData'] . ' ' . $postdata['IsvykimoLaikas'];
    $postdata['GryzimoData']  = $postdata['GryzimoData'] . ' ' . $postdata['GryzimoLaikas'];


    // days difference between Isvykimas & Gryzimas
    $ITime = strtotime($postdata['IsvykimoData']);
    $RTime = strtotime($postdata['GryzimoData']);
    $timeDiff = abs($ITime - $RTime);
    $numberDays = $timeDiff/86400;  // 86400 seconds in one day

    $stmt->bindParam(':Pavadinimas',  $postdata['Pavadinimas'], PDO::PARAM_STR);
    $stmt->bindParam(':Title',        $postdata['Title'], PDO::PARAM_STR);
    $stmt->bindParam(':Intro',        $postdata['Intro'], PDO::PARAM_STR);
    $stmt->bindParam(':IsvykimoData', $postdata['IsvykimoData'], PDO::PARAM_STR);
    $stmt->bindParam(':GryzimoData',  $postdata['GryzimoData'], PDO::PARAM_STR);
    $stmt->bindParam(':Programa',     $postdata['Programa'], PDO::PARAM_STR);
    $stmt->bindParam(':Video',        $postdata['Video'], PDO::PARAM_STR);
    $stmt->bindParam(':Iskaiciuota',  $postdata['Iskaiciuota'], PDO::PARAM_STR);
    $stmt->bindParam(':Valstybe',     $postdata['Valstybe'], PDO::PARAM_STR);
    $stmt->bindParam(':Miestas',      $postdata['Miestas'], PDO::PARAM_STR);
    $stmt->bindParam(':Viesbutis',    $postdata['Viesbutis'], PDO::PARAM_STR);
    $stmt->bindParam(':Kaina',        $postdata['Kaina'], PDO::PARAM_STR);
    $stmt->bindParam(':MainImage',    $postdata['MainImage'], PDO::PARAM_STR);
    $stmt->bindParam(':KelionesTipas',$postdata['KelionesTipas'], PDO::PARAM_STR);
    $stmt->bindParam(':TransportoTipas',$postdata['TransportoTipas'], PDO::PARAM_STR);
    $stmt->bindParam(':PapildomasIslaidos',$postdata[':PapildomasIslaidos'], PDO::PARAM_STR);
    $stmt->bindParam(':DateDiff', $numberDays, PDO::PARAM_INT);
    $stmt->bindParam(':Random1Heading',$postdata['Random1Heading'], PDO::PARAM_STR);
    $stmt->bindParam(':Random1Text',$postdata['Random1Text'], PDO::PARAM_STR);

    if ($this->updateKelioniuSkaicius($postdata)) {
        $stmt->execute();
        return true;
    } else {
        die('there was an error');
    }

    // $stmt->execute();
    // return true;

    //return $stmt->execute();
    }

    public function editHoliday($postdata)
    {
        $db = static::getDb();
        $sql =
        'UPDATE keliones
        SET Pavadinimas = :Pavadinimas,
        Title           = :Title,
        Intro           = :Intro,
        IsvykimoData    = :IsvykimoData,
        GryzimoData     = :GryzimoData,
        Programa        = :Programa,
        Video           = :Video,
        Iskaiciuota     = :Iskaiciuota,
        Valstybe        = :Valstybe,
        Miestas         = :Miestas,
        Viesbutis       = :Viesbutis,
        Kaina           = :Kaina,
        MainImage       = :MainImage,
        KelionesTipas   = :KelionesTipas,
        TransportoTipas = :TransportoTipas,
        Random1Heading  = :Random1Heading,
        Random1Text     = :Random1Text,
        PapildomasIslaidos = :PapildomasIslaidos
        WHERE id        = :id';
        $stmt = $db->prepare($sql);


        // date time sujungimas
        $postdata['IsvykimoData'] = $postdata['IsvykimoData'] . ' ' . $postdata['IsvykimoLaikas'];
        $postdata['GryzimoData']  = $postdata['GryzimoData'] . ' ' . $postdata['GryzimoLaikas'];

        $stmt->bindParam(':Pavadinimas',  $postdata['Pavadinimas'], PDO::PARAM_STR);
        $stmt->bindParam(':Title',        $postdata['Title'], PDO::PARAM_STR);
        $stmt->bindParam(':Intro',        $postdata['Intro'], PDO::PARAM_STR);
        $stmt->bindParam(':IsvykimoData', $postdata['IsvykimoData'], PDO::PARAM_STR);
        $stmt->bindParam(':GryzimoData',  $postdata['GryzimoData'], PDO::PARAM_STR);
        $stmt->bindParam(':Programa',     $postdata['Programa'], PDO::PARAM_STR);
        $stmt->bindParam(':Video',        $postdata['Video'], PDO::PARAM_STR);
        $stmt->bindParam(':Iskaiciuota',  $postdata['Iskaiciuota'], PDO::PARAM_STR);
        $stmt->bindParam(':Valstybe',     $postdata['Valstybe'], PDO::PARAM_STR);
        $stmt->bindParam(':Miestas',      $postdata['Miestas'], PDO::PARAM_STR);
        $stmt->bindParam(':Viesbutis',    $postdata['Viesbutis'], PDO::PARAM_STR);
        $stmt->bindParam(':Kaina',        $postdata['Kaina'], PDO::PARAM_STR);
        $stmt->bindParam(':MainImage',    $postdata['MainImage'], PDO::PARAM_STR);
        $stmt->bindParam(':KelionesTipas',$postdata['KelionesTipas'], PDO::PARAM_STR);
        $stmt->bindParam(':TransportoTipas',$postdata['TransportoTipas'], PDO::PARAM_STR);
        $stmt->bindParam(':PapildomasIslaidos',$postdata['PapildomasIslaidos'], PDO::PARAM_STR);
        $stmt->bindParam(':Random1Heading',$postdata['Random1Heading'], PDO::PARAM_STR);
        $stmt->bindParam(':Random1Text',  $postdata['Random1Text'], PDO::PARAM_STR);
        $stmt->bindParam(':id',           $postdata['id'], PDO::PARAM_INT);

        $stmt->execute();
        return true;
    }

    public function updateKelioniuSkaicius($postdata)
    {
        $db = static::getDb();

        // Keliones Tipas
        $kelTipai = ['Pazintine', 'Poilsine', 'Kruizine', 'Egzotine', 'Savaitgalio', 'Poilsis Lietuvoje', 'Kruizas'];
        if (in_array($postdata['KelionesTipas'], $kelTipai)) {
            $kelionesTipasColumn = 'KelionesTipas_' . $postdata['KelionesTipas'];
        }

        // Kainos column nustatymas
        $kainaArr = ['KainaAsmeniui_nuo0iki300e' => [0, 300], 'KainaAsmeniui_nuo301iki700e' => [301,700], 'KainaAsmeniui_nuo701iki10000e' => [701, 10000]];
        foreach($kainaArr as $key => $value){
            if ($value[0] <= $postdata['Kaina'] && $value[1] >= $postdata['Kaina']) {
                $kainaColumn = $key;
                break;
            }
        }

        // Valstybe column
        $valstybes = ['Lietuva', 'Ispanija', 'Italija', 'Prancuzija', 'Anglija', 'Vokietija', 'Meksika', 'Olandija', 'Turkija', 'Kinija', 'Tailandas'];
        if (in_array($postdata['Valstybe'], $valstybes)){
            $valstybe = 'Valstybe_' . $postdata['Valstybe'];
            $valstybeColumn = $valstybe;
        }

        // Transporto Tipas
        $transportoTipai = ['Lektuvu', 'Autobusu', 'Kruizine'];
        if (in_array($postdata['TransportoTipas'], $transportoTipai)) {
            $transportoTipasColumn = 'Transportas_' . $postdata['TransportoTipas'];
        }

        // Keliones trukme
        $kelionesTrukme = ['DateDiff_iki5dienu' => [0, 4], 'DateDiff_nuo5iki10dienu' => [5, 9], 'DateDiff_nuo10dienu' => [10, 99]];
        $dateDiff = strtotime($postdata['GryzimoData']) - strtotime($postdata['IsvykimoData']);
        $dateDiff = $dateDiff / (60*60*24); // dienos
        test();
        printr($dateDiff);

        printr($kelionesTrukme);
        // die('gg');

        // check if dateDiff is in between ranges specified in ($kelionesTrukme) will add to errors later. For now laikinai bellow(few lines below)
        foreach($kelionesTrukme as $key => $value) {
            if($value[0] <= $dateDiff && $value[1] >= $dateDiff) {
                $kelionesTrukmeColumn = $key;
            }
        }

        // laikinai errors:
        if (!isset($kelionesTrukmeColumn)){
            die('Unexpected holiday day difference, please press back and check the datetime fields again');
        }

        // cia update bus
        $sql1 = "SELECT $kelionesTipasColumn, $Column, $valstybeColumn, $transportoTipasColumn, $kelionesTrukmeColumn  FROM kelioniu_skaicius";

        $db->exec("UPDATE kelioniu_skaicius SET
            $kelionesTipasColumn = $kelionesTipasColumn + 1,
            $kainaColumn = $kainaColumn + 1,
            $valstybeColumn = $valstybeColumn + 1,
            $transportoTipasColumn = $transportoTipasColumn + 1,
            $kelionesTrukmeColumn = $kelionesTrukmeColumn +1
            WHERE id = 1");

        return true;

        // $sql = "UPDATE Travel_num SET Travel_num.Country = " . $postdata['Country'] , "and so on"

    }

    public function allHolidays(){
        $db = static::getDb();
        $sql = 'SELECT * FROM keliones';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        //return $stmt->fetchAll(PDO::FETCH_OBJ);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
        1. Deletes relative holiday nums associated with (database: one/kelioniu_skaicius)
        2. Deletes holiday
    */
    public function deleteHolidayById($id) {
        $db = static::getDb();

        // 1. delete holiday nums

        $KelionesM = new KelionesM;
        $holiday = $KelionesM->getHolidayById($id);
        printr($holiday);

        // str for sql
        $kTipas = 'KelionesTipas_' . $holiday['KelionesTipas'];
        $tTipas = 'Transportas_' . $holiday['TransportoTipas'];
        $salis  = 'Valstybe_' . $holiday['Valstybe'];

        // need to change format for datediff & Kaina due to name differences(i.e. $holiday['DateDiff'] returns 9, database Datediff is 'DateDiff_nuo5iki10dienu');
        // date
        if ($holiday['DateDiff'] > 0 && $holiday['DateDiff'] < 5) {
            $dDiff = 'DateDiff_iki5dienu';
        } elseif ($holiday['DateDiff'] >= 5 && $holiday['DateDiff'] < 10) {
            $dDiff = 'DateDiff_nuo5iki10dienu';
        } elseif ($holiday['DateDiff'] >= 10) {
            $dDiff = 'DateDiff_nuo10dienu';
        }

        // price
        if ($holiday['Kaina'] <= 300) {
            $kDiff = 'KainaAsmeniui_nuo0iki300e';
        } elseif ($holiday['Kaina'] > 300 && $holiday['Kaina'] < 701) {
            $kDiff = 'KainaAsmeniui_nuo301iki700e';
        } elseif ($holiday['Kaina'] > 701) {
            $kDiff = 'KainaAsmeniui_nuo701iki10000e';
        }

        // query str
        $sql = 'UPDATE kelioniu_skaicius SET ' .
                $kTipas . ' = ' . $kTipas . '-1' . ', ' .
                $tTipas . ' = ' . $tTipas . '-1' . ', ' .
                $dDiff  . ' = ' . $dDiff  . '-1' . ', ' .
                $kDiff  . ' = ' . $kDiff  . '-1' . ', ' .
                $salis  . ' = ' . $salis  . '-1' . ';';
        // relative holiday nums entries -1 each
        //$db->exec($sql);

        test('1');
        printr($db->exec($sql));

        // 2. delete holiday

        $sql = 'DELETE FROM keliones WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        //$stmt->execute();

        test('2');
        printr($stmt->execute());


        // execute both queries

        return false;
    }

    /**
     *  Get all admins
     */

     // Return list of all admins
     public function allAdmins() {
         $db = static::getDb();
         $sql = 'SELECT * FROM admins';
         $stmt = $db->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     // Return list of all users
     public function allUsers() {
         $db = static::getDb();
         $sql = 'SELECT * FROM users';
         $stmt = $db->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

     }

     // Creates blogPost in db
     public function createBlogPost($postdata) {
         $db = static::getDb();
         $sql = 'INSERT INTO blog (Content, MainImage, Author, Data, Pavadinimas) VALUES (:Content, :MainImage, :Author, :Data, :Pavadinimas)';
         $stmt = $db->prepare($sql);
         $stmt->bindValue(':Content', $postdata['Content'], PDO::PARAM_STR);
         $stmt->bindValue(':MainImage', $postdata['MainImage'], PDO::PARAM_STR);
         $stmt->bindValue(':Author', $postdata['Author'], PDO::PARAM_STR);
         $stmt->bindValue(':Data', date("Y-m-d H:i:s"), PDO::PARAM_STR);
         $stmt->bindValue(':Pavadinimas', $postdata['Pavadinimas'], PDO::PARAM_STR);
         $stmt->execute();
         return true;
     }

     public function allBlogPosts() {
         $db = static::getDb();
         $sql = 'SELECT * FROM blog';
         $stmt = $db->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     // Note for self:
     // Labai kartojasi sitie visi fetch, galima bus sugalvot funkcija, kad paprasciau butu
     public function getBlogPostById($id) {
         $db = static::getDb();
         $sql = 'SELECT * FROM blog WHERE id = :id';
         $stmt = $db->prepare($sql);
         $stmt->bindValue(':id', $id, PDO::PARAM_INT);
         $stmt->execute();
         return $stmt->fetch(PDO::FETCH_ASSOC);
     }


}//end of class
