<?php

use pedzed\libs\number_tools\NumberFormatter;

require_once(dirname(dirname(__DIR__)).'/src/pedzed/libs/number_tools/NumberFormatter.php');

$numFormatter = new NumberFormatter();

$num = 17;
echo 'This program says that your number ('.$num.') is the '.$numFormatter->getOrdinal($num).'!<br />';

$nums = range(-5, 235);

foreach($numFormatter->getOrdinals($nums) as $num){
    echo $num.'<br />';
}
