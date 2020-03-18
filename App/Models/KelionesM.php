<?php
namespace App\Models;
use PDO;

class KelionesM extends \App\Core\Model
{
    private $db;
    public function __construct()
    {
        $this->db = static::getDb();
    }

    // Sita reikes perasyt i prepared statements
    public function mainPageHolidays(){
        //$sql = 'SELECT Pavadinimas, Title, MainImage, Kaina, Data FROM keliones WHERE Pavadinimas = ?, Title = AND  MainImage = ? AND Kaina = ? AND Data = ?';
        $sql = 'SELECT id, Pavadinimas, Title, MainImage, Kaina, IsvykimoData FROM keliones ORDER BY KadaIkelta LIMIT 20';
        //$stmt = $this->db->prepare($sql);
        $holidays = [];
        foreach($this->db->query($sql, PDO::FETCH_ASSOC) as $holiday) {
            $holidays[] = $holiday;
        }
        return $holidays;
    }

    // holiday by id
    public function getHolidayById($id)
    {
        $sql = 'SELECT * FROM keliones WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    // Holiday by type (Egzotines, Poilsines, Pazintines)
    public function getHolidayByType($type)
    {
        $sql = 'SELECT * FROM keliones WHERE Kelionestipas = :type';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Holiday by transport type(Lektuvu, Autobusu, etc)
    public function getHolidayByTransportType($type)
    {
        $sql = 'SELECT * FROM keliones WHERE TransportoTipas = :type';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllDestinationsByCountry()
    {
        $sql = 'SELECT Valstybe FROM keliones';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    public function getHolidayNums()
    {
        $sql = 'SELECT * FROM kelioniu_skaicius';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllHolidayByTypeMonth($KelionesTipas)
    {
        $KelionesTipai = ['Poilsine', 'Pazintine', 'Egzotine', 'Savaitgalio', 'Kruizas', 'PoilsisLietuvoje'];
        $sql = 'SELECT id, month(IsvykimoData) FROM keliones WHERE KelionesTipas = :type';

        if (in_array($KelionesTipas, $KelionesTipai)) {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':type', $KelionesTipas, \PDO::PARAM_STR);
            $stmt->execute();

            //return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
            //return $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    //Galima ir ta virsutine perdaryt
    public function getHolidaysByTypeAndMonth($KelionesTipas, $menesis)
    {
        $kelionesTipai = ['Poilsine', 'Pazintine', 'Egzotine', 'Savaitgalio', 'Kruizas', 'PoilsisLietuvoje'];
        $sql = 'SELECT * FROM keliones WHERE KelionesTipas = :type AND MONTH(IsvykimoData) = :menesis';

        if (in_array($KelionesTipas, $kelionesTipai)) {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':type', $KelionesTipas, PDO::PARAM_STR);
            $stmt->bindValue(':menesis', $menesis, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function searchBy($KelionesTipas = '')
    {
        $kelTipai = ['Poilsine', 'Pazintine', 'Egzotine', 'Savaitgalio', 'Kruizas', 'PoilsisLietuvoje'];
        $sql = 'SELECT * FROM keliones WHERE KelionesTipas = :type';

        if(in_array($KelionesTipas, $kelTipai)){
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':type', $KelionesTipas, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }

    public function sidebarSearch($searchArr = []){
        header('Content-Type: application/json');

        $baseSql = 'SELECT * FROM keliones WHERE ';
        $interimStr = '';
        $keysArr = ['KelionesTipas', 'TransportoTipas', 'Kaina', 'DateDiff', 'Valstybe'];
        $valsArr = ["Pazintine", "Kruizas", "Poilsine", "Lektuvu", "Laivu", "Autobusu", "0-4", "5-9", "10-100", "0-300", "301-700", "701-10000"];
        $searchArr2 = [];
        $valuesToBind = [];
        $vtbCount = 0;

        // add countries to valls arr(available_countries const in init.php)
        $valsArr = array_merge($valsArr, AVAILABLE_COUNTRIES);

        // 1st split
        foreach ($searchArr as $key => $value) {
            if ($key === 'KelionesTipas' || $key == 'TransportoTipas'){
                $searchArr2[$key] = [$value];
            } elseif ($key === 'Kaina' || $key === 'DateDiff' || $key === 'Valstybe'){
                $searchArr2[$key] = explode(',', $value);
            } else {
                // dies if values are not as expected
                die('ups, smth went wrong');
            }
        }

        // prevent sql injection. If vals are not as expected stops the script.
        foreach ($searchArr2 as $key => $value) {
            if (array_diff($value, $valsArr)) {
                die('ups, smth went wrong');
            }
        }

        /*
        Constructs sql query.
        $searchArr2 - is an array associtive array constructed few live above that gets all clicked selections

        1. creates string placeholder for each value(':value' + counter(vtbCount))
        2. adds values to be bind to $valuesToBind array( for later i.e. ':value5' bind $valuestobind[i])
        3. Adds/Removes trailing 'AND'/'OR'
        */
        foreach ($searchArr2 as $key => $value){
            if ($key == 'KelionesTipas' || $key == 'TransportoTipas'){
                $interimStr .= $key . ' = ' . ':value' . (string)$vtbCount . ' AND ';
                $vtbCount++;
                $valuesToBind[] = $value[0];
            } elseif ($key == 'Valstybe'){
                $interimStr .= $key . ' IN (';
                foreach ($searchArr2['Valstybe'] as $value) {
                    $interimStr .= ':value'. (string)$vtbCount . ', ';
                    $vtbCount++;
                    $valuesToBind[] = $value;
                }
                $interimStr = rtrim($interimStr, ', ');
                $interimStr .= ') AND ';
            } elseif($key === 'DateDiff' || $key === 'Kaina'){
                $interimStr .='(';
                foreach ($value as $val) {
                    $interimStr .= $key . ' BETWEEN ';
                    $vals = explode('-', $val);
                    $interimStr .= ':value'.  (string)$vtbCount;
                    $valuesToBind[] = $vals[0];
                    $vtbCount++;
                    $interimStr .= ' AND ' . ':value' . (string)$vtbCount . ' OR ';
                    $valuesToBind[] = $vals[1];
                    $vtbCount++;
                }
                $interimStr = rtrim($interimStr, ' OR ');
                $interimStr .= ') AND ';
            }

        }
        $interimStr = rtrim($interimStr, ' AND ');
        $interimStr .= ';';
        $finalSql = $baseSql . $interimStr;

        // Bind params, execute query, return holidays;
        $stmt = $this->db->prepare($finalSql);
        for ($i=0; $i < count($valuesToBind); $i++) {
            if (in_array($valuesToBind[$i], $valsArr)) {
                $stmt->bindValue(':value' . $i, $valuesToBind[$i], PDO::PARAM_STR);
            } else {
                $stmt->bindValue(':value' . $i, $valuesToBind[$i], PDO::PARAM_INT);
            }
        }
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $results = json_encode($results);
        print_r($results);
        //return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } // /sidebarSarch2
}//end of class
