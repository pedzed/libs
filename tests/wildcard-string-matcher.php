<?php

use pedzed\libs\WildcardStringMatcher;

spl_autoload_register(function($class){
    $dirs = [
        dirname(__DIR__).'/src/'
    ];
    
    foreach($dirs as $dir){
        $file = str_replace('\\', '/', rtrim($dir, '/').'/'.$class.'.php');
        
        if(is_readable($file)){
            require_once($file);
            break;
        }
    }
});

$strList = [
    '*',
    '*.ipsum',
    'lorem.ipsum.dolor',
    'lorem.ipsum.sit.amet',
    'lorem.*.amet',
    'lorem.*'
];

$match = 'lorem.ipsum.sit.amet';

echo '<h2>'.$match.'</h2>';

foreach($strList as $str){
    echo 'String: <b>'.$str.':</b><br />';
    
    var_dump(WildcardStringMatcher::match($str, $match));
}
