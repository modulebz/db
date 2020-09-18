<?php

namespace ModuleBZ\DB\Query\Options\Select;

use ModuleBZ\DB\Table;

/**
 * Класс FROM для запроса
 * @package ModuleBZ\DB\Query\SelectOptions
 */
class From {
    /** @var Table $table таблица для запроса */
    public Table $table;
    /** @var string $alias псевдоним */
    public string $alias;
    public function __construct(Table $table,string $alias = '') {
        $this->table = $table;
        $this->alias = $alias;
    }

    public function __toString() {
        return $this->table->name.($this->alias?' as '.$this->alias:'');
    }
}
