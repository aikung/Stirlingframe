<?php
namespace system\mvc;
abstract class Controller{
    public $restful = false;
    
    public function __construct() {
        
    }
    
    public static function loadCSS(){
        $css="";
        $dir = scandir(ROOT.DS.'application'.DS.'publics'.DS.'stylesheets');
        foreach ($dir as $value) {
            if (strpos($value, "css")) {
                $css .= '<link rel="stylesheet" href="'.PUBLICS.'stylesheets/'.$value.'">';
            }
        }
        return $css;
    }
}

