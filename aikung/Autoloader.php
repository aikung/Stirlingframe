<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Autoloader
 *
 * @author Ai
 */
class Autoloader {

    public static $directories = array('controllers', 'libraries', 'models');

    /**
     * load class file by it's full name
     * 
     * @param string $class
     * @return void
     */
    public static function load($class) {
        $filename = __DIR__ . DS . strtolower($class) . '.php';
        if(!self::isWindows())
        {
            $filename = str_replace("\\", "/", $filename);
        }
        if (file_exists($filename))
            require $filename;
    }

    public static function loadGlobal() {

        if (!empty(self::$directories)) {
            foreach (self::$directories as $directory) {
                $handle = opendir(path('app') . DS . $directory.DS);
                
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != ".."&& $entry != ".php") {
                        require path('app') . DS . $directory . DS . $entry;
                        
                    }
                }
            }
            self::$directories = array();
        }
    }

    private static function isWindows() {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
