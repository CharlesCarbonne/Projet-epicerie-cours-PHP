<?php
namespace Service;

class Configuration
{

    private static $instance = null;
    private $iniArray;

    private function __construct(){
        $this->iniArray = parse_ini_file("configuration.ini", true);
    }

    public static function  getInstance(){
        if(empty(self::$instance)){
            self::$instance = new Configuration();
        }
        return self::$instance;
    }

    public function  __call($name, $args){
        $name = substr($name, 3);
        $name = strtolower($name);
        switch ($name){
            case 'host':
                return $this->iniArray['MYSQL']['host'];
            case 'username':
                return $this->iniArray['MYSQL']['user'];
            case 'password':
                return $this->iniArray['MYSQL']['password'];
            case 'dbname':
                return $this->iniArray['MYSQL']['database'];
            case 'imagepath':
                return $this->iniArray['IMAGE']['defaultpath'];
            default:
                throw new \Exception('Information inconnue dans config.ini');
        }

    }
}