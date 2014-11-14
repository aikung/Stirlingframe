<?php

namespace system\mvc;

class View {

    public $view_file;
    public $data;
    private static $view = null;

    private function __construct() {
        
    }

    public static function & instance() {
        return self::$view;
    }

    public static function make($view_file, $data = array()) {
        
        $data['css'] = Controller::loadCSS();
        
        if (is_null(self::$view)) {
            self::$view = new View;
        }
        self::$view->view_file = $view_file;
        self::$view->data = $data;
    }
    
    public function launch(){
        extract($this->data);
        $view_file = str_replace(".", DS, $this->view_file);
        require path('app').DS.'view'.DS.$view_file.'.php';
    }
}
