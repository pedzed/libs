<?php

use pedzed\libs\Client;

require_once(dirname(__DIR__).'/src/pedzed/libs/Client.php');

echo 'Is your ip... '.Client::getIP().'? :)<br />';
