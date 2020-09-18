<?php

namespace ModuleBZ\DB\Query\Options;

use ModuleBZ\DB\Query\EQueryTypes;
use ModuleBZ\DB\Query\Options;
use ModuleBZ\DB\Query\Prepare;
use ModuleBZ\DB\Table;

/**
 * Функция обновления данных в таблице
 * Class Update
 * @package ModuleBZ\DB\Query\Options
 */
class Update extends Options {

    /** @var Table $table таблица, с которой работает запрос */
    protected Table $table;

    public function __construct(Table $table) {
        $this->type = EQueryTypes::$UPDATE;
        $this->table = $table;
    }

    public function prepare():Prepare{
        $query = 'UPDATE '.$this->table->name
            .' SET '
            .' WHERE ';
        $params = [
            ':tablename'=>$this->table->getName(),
        ];
        return new Prepare($query,$params);
    }

}
