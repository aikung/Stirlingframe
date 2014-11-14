<?php
error_reporting(E_ALL);
use stirlingframe\libs\Utilities\Generator;

include_once dirname(__FILE__).'/definitions/systems.php';
require_once dirname(__FILE__).'/definitions/outtext.php';

function __autoload($class) {
    $output = str_replace('\\', DS, $class);
    require_once $output.'.php';
}


//print_r($argv);
//
//$arguments = getopt("a:b:c");
//print_r($arguments);

if (function_exists($argv[1])) {
    call_user_func_array($argv[1], $argv);
} else {
    echo 'NONE';
}

function create(){
    $instance_of = $_SERVER['argv'][2];
    $instance_name = $_SERVER['argv'][3];
    $instance = array('project','app','model','view','controller');
    
    if(!in_array($instance_of, $instance)){
        echo ERROR_INVALID_PARAMS;
        return;
    }
    
    if($instance_of == $instance[0]){
        Generator::CreateProject($instance_name);
    }
    if($instance_of == $instance[1]){
        
    }
    if($instance_of == $instance[2]){
        
    }
    if($instance_of == $instance[3]){
        
    }
    if($instance_of == $instance[4]){
        
    }
    
    echo SUCCESS_HEADER." ".ucfirst($instance_of)." ".$instance_name." has been created.";
}

