<?php

use pedzed\libs\Text;
use pedzed\libs\TextException;

require_once(dirname(__DIR__).'/src/pedzed/libs/Text.php');

$str = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nulla, 
rerum ut vitae suscipit odit iure voluptas expedita nemo nihil quis et laborum 
quibusdam deserunt facere placeat quaerat, temporibus molestiae.';

$text = new Text($str);
echo $text->limitChars(20, ' [...]'), '<br />';

$text = new Text($str);
echo $text->uppercaseWords()->limitChars(80), '<br />';

$text = new Text($str);
$text->limitChars(17, null);
$text->uppercaseWords();
echo $text, '<br />';

echo Text::limitChars('My String', 6), '<br />';
echo Text::limitChars('abcdefghijklmnopqrstuvwxyz', 3, null), '<br />';

try {
    echo (new Text('My String'))->doX(), '<br />';
} catch(TextException $e){
    echo '<strong>Uh Oh!</strong><br />', $e->getMessage();
}

