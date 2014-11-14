<?php
define("DS", DIRECTORY_SEPARATOR);

define("ROOT", __DIR__);
define("CP", "&COPY;2014, by Chaowarit Ongkun. All Right Reserved.");


require __DIR__.DS.'paths.php';
require __DIR__.DS.'autoloader.php';

spl_autoload_register(array('Autoloader','load'));

Autoloader::loadGlobal();

system\Config::load();

//---------------- SET HOME URL --------------//
define("HOME", "/aikung/");
define("PUBLICS", HOME.'application/publics/');

$router = new system\Router();
if (isset($_SERVER['PATH_INFO'])) {
    $router->pathRoute($_SERVER['PATH_INFO']);
}else{
    $router->defaultRoute();
}
$router->launch();

if(!is_null($view = system\mvc\View::instance()))
        $view->launch();