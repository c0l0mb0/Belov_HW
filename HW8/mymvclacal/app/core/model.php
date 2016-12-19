<?php


class Model
{
    protected $instanceDB = NULL;
    protected $instancePhotos = NULL;
    protected $instanceUsers = NULL;

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

    protected static function getInstancePhotos()
    {
        if (!isset($instancePhotos)) {

            $instancePhotos = new Photos();

        }
        return $instancePhotos;
    }

    protected static function getInstanceUsers()
    {
        if (!isset($instanceUsers)) {


            $instanceUsers = new users();

        }
        return $instanceUsers;
    }
}

