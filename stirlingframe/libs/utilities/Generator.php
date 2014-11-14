<?php

namespace stirlingframe\libs\Utilities;

class Generator {

    //CORE
    public static function CreateProject($name) {
        if (!is_dir($name)) {
            mkdir($name);
            self::CreateHTACCESS($name);
            self::CreateIndex($name);
            self::CopyNeccessaryFiles($name);
        }


        self::CreateHTACCESS($name);
        self::CreateIndex($name);
        self::CopyNeccessaryFiles($name);
    }

    public static function CreateModel($name) {
        
    }

    public static function CreateView($name) {
        
    }

    public static function CreateController($name) {
        
    }

    //MISC
    private static function CreateHTACCESS($projectName) {
        $htaccess = "RewriteEngine On
Options +FollowSymLinks

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !\.(css|png|jpg|html|pdf|js|zip|rar|txt)$
RewriteRule ^(.*)$ index.php/$1 [L]";

        $file = fopen($projectName . '/.htaccess', 'w');
        fwrite($file, $htaccess);
        fclose($file);
    }

    private static function CreateIndex($projectName) {
        $file = fopen(dirname(dirname(__FILE__)) . "/bundles/index.tphp", "r");

        $text = fread($file, 10000);


        $output = str_replace("{HOME}", "/" . $projectName . '/', $text);
        fclose($file);
        $file2 = fopen($projectName . '/index.php', 'w');
        fwrite($file2, $output);
        fclose($file2);
    }

    private static function CopyNeccessaryFiles($name) {
        $dir = dirname(dirname(__FILE__)) . DS . "bundles" . DS . "neccessaries" . DS;
        Utils::recurse_copy($dir, $name);
    }

}
