<?php
$GLOBALS['sys'] = __DIR__.DS.'system';
$GLOBALS['app'] = __DIR__.DS.'application';

function path($path){
    return $GLOBALS[$path];
}

