<?php

namespace system;
class Config{
    public static $application = array();
    public static $database = array();
    
    public static function load(){
        self::$application = require path('app').DS.'config'.DS.'application.php';
        self::$database = require path('app').DS.'config'.DS.'database.php';
        
    }
}