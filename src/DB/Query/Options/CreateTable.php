<?php

namespace ModuleBZ\DB\Query\Options;

use ModuleBZ\DB\Query\EQueryTypes;
use ModuleBZ\DB\Query\Options;
use ModuleBZ\DB\Query\Prepare;
use ModuleBZ\DB\Table;

/**
 * Функция создания таблицы
 * Class CreateTable
 * @package ModuleBZ\DB\Query\Options
 */
class CreateTable extends Options {

    /** @var Table $table таблица, с которой работает запрос */
    protected Table $table;

    /**
     * CreateTable constructor.
     * @param Table $table
     */
    public function __construct(Table $table) {
        $this->type = EQueryTypes::$CREATE_TABLE;
        $this->table = $table;
    }

    public function prepare():Prepare{
        $query_columns = [];
        foreach ($this->table->getColumns() as $k=>$column) {
            /** @var Table\Column\EColumnTypeValue $type */
            $type = $column->getType()->value;
            $query_columns[] = $column->getName().' '.$type->name;
        }
        $query = 'CREATE TABLE IF NOT EXISTS '.$this->table->getName().' ('.implode(',',$query_columns).')';

        return new Prepare($query);
    }



}
