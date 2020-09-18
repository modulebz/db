<?php


use ModuleBZ\DB;
use ModuleBZ\DB\Query;
use ModuleBZ\DB\Query\Options\CreateTable;
use ModuleBZ\DB\Query\Options\Select;
use ModuleBZ\DB\Query\Options\Update;
use ModuleBZ\DB\Table\Column;

include_once "../vendor/autoload.php";

$db = new DB("postgres","postgres","000000","localhost");

$logs = [];
($table = new DB\Table())
    ->setName('users')
    ->setColumns([
        (new Column())
            ->setName('id')
            ->setType(Column\EColumnTypes::$SERIAL)
        ,
        (new Column())
            ->setName('price')
            ->setType(Column\EColumnTypes::$INTEGER)
    ])
;

$logs[] = (string)$table->createQuery();


$query_insert = new Query(
    ($select_options = new Select())
    ->addFrom($table,'assss')
);
$logs[] = (string) $query_insert;


$query_update = new Query(
    (new Update($table))
);
$logs[] = (string)$query_update;



$logs[] = (string)$table->dropQuery();

echo implode("<br/>",$logs);



$db->execute($table->createQuery());



echo $db->tableLogs();
