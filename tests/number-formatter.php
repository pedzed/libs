<?php

use pedzed\libs\NumberFormatter;

require_once(dirname(__DIR__).'/src/pedzed/libs/NumberFormatter.php');

$numFormatter = new NumberFormatter('en_US');

$num = 17;
echo 'This program says that your number ('.$num.') is the '.$numFormatter->getOrdinal($num).'!<br />';

$nums = range(-5, 235);

foreach($numFormatter->getOrdinals($nums) as $num){
    echo $num.'<br />';
}
