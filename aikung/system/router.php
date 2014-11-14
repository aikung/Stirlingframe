<?php

namespace system;

class Router{
    public $controller;
    public $method;
    public $args = array();
    
    public function __construct() {
        
    }
    
    public function defaultRoute(){
        $this->controller = Config::$application['default_route']['controller'];
        $this->method = Config::$application['default_route']['method'];
    }
    
    public function pathRoute($uri = ''){
        $parts = trim($uri,'/');
        $parts = explode('/', $parts);
        $this->controller = array_shift($parts);
        
        if(isset($parts[0])){
            $this->method = array_shift($parts);
        }else{
            $this->method = 'index';
        }
        $this->args = $parts;
    }
    
    public function launch(){
        $controller = ucfirst($this->controller).'Controller';
        if(class_exists($controller))
            $controller = new $controller;
        else{
            $controller = new Error_Controller();//$controller;//\Error_Controller;
            return $controller->index("404: ".$this->controller." not found.");
        }
        
        if(!$controller->restful){
            $method = 'action_'.$this->method;
        }else{
            $method = strtolower($_SERVER['REQUEST_METHOD'])."_".$this->method;
        }
        
        if(method_exists($controller, $method)){
            return call_user_func_array(array($controller, $method),  $this->args);
        }else{
            $controller = new Error_Controller();
            return $controller->index("404: Method ".  str_replace("get_",'',$method)." not exists.");
        }
    }
}

use system\mvc\Controller;
use system\mvc\View;
class Error_Controller extends Controller {

    public function index($value) {
        $data['error'] = $value;
        View::make('error.index', $data);
    }

}
