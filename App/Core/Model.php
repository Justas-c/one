<?php
namespace App\Core;
use App\Core\Config;
use PDO;

abstract class Model
{
    protected static function getDb()
    {
        static $db = null;

        if ($db === null) {
            $db = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME, Config::DB_USER, Config::DB_PASSWORD);
            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }
}
