<?php

namespace ModuleBZ\DB\Query\Options;

use ModuleBZ\DB\Query\EQueryTypes;
use ModuleBZ\DB\Query\Options;
use ModuleBZ\DB\Query\Options\Select\From;
use ModuleBZ\DB\Query\Prepare;
use ModuleBZ\DB\Table;

/**
 * Функция для запроса в базу данных
 * Class Select
 * @package ModuleBZ\DB\Query\Options
 */
class Select extends Options {

    /** @var From[] $from таблицы, с которыми работает запрос */
    protected array $from = [];

    public function __construct() {
        $this->type = EQueryTypes::$SELECT;
    }

    /**
     * Функция для добавления таблицы в FROM
     * @param Table $table - таблица
     * @param string $alias - псевдоним
     * @return Select
     */
    public function addFrom(Table $table, string $alias = '') {
        $this->from[] = new From($table,$alias);
        return $this;
    }


    public function prepare():Prepare{
        $query = 'SELECT * '.
            'FROM '.join(",",$this->from);
        $params = [
        ];
        return new Prepare($query,$params);
    }

}
