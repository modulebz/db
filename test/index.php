<?php

use ModuleBZ\DB;

include_once "../vendor/autoload.php";

$db = new DB("postgres","postgres","000000","localhost");

echo $db->tableLogs();
