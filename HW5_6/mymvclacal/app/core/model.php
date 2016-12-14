<?php

class Model
{
    protected $instanceDB = NULL;

    public function get_data()
    {
    }

    protected static function getInstance()
    {
        if (!isset($instanceDB)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $instanceDB = new PDO("mysql:host=test-application.local;dbname=colombo_bd",
                'colombo', '132', $pdo_options);
            $instanceDB->exec("set names utf8");

        }
        return $instanceDB;
    }
}

