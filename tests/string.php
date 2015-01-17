<?php

use pedzed\libs\String;
use pedzed\libs\StringException;

require_once(dirname(__DIR__).'/src/pedzed/libs/String.php');

$str = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nulla, 
rerum ut vitae suscipit odit iure voluptas expedita nemo nihil quis et laborum 
quibusdam deserunt facere placeat quaerat, temporibus molestiae.';

$str = new String($str);
echo $str->limitChars(20, ' [...]'), '<br />';

$str = new String($str);
echo $str->uppercaseWords()->limitChars(80), '<br />';

$str = new String($str);
$str->limitChars(17, null);
$str->uppercaseWords();
echo $str, '<br />';

echo String::limitChars('My String', 6), '<br />';
echo String::limitChars('abcdefghijklmnopqrstuvwxyz', 3, null), '<br />';

echo String::uppercaseFirst('lower'), '<br />';
echo String::uppercaseFirst('FULLCAPS?', true), '<br />';

try {
    echo (new String('My String'))->doX(), '<br />';
} catch(StringException $e){
    echo '<strong>Uh Oh!</strong><br />', $e->getMessage();
}

