<?php

namespace ModuleBZ\DB;

use ModuleBZ\DB;
use ModuleBZ\DB\Query\Options\CreateTable;
use ModuleBZ\DB\Query\Options\DropTable;
use ModuleBZ\DB\Table\Column;

/**
 * Класс отвечающий за описание архитектуры таблицы.
 * Class Table
 * @package ModuleBZ\Table
 */
class Table {
    /** @var string $name Название таблицы */
    public string $name = '';

    /** @var Column[] $columns массив столбцов */
    protected array $columns = [];

    /**
     * @param Column[] $columns
     * @return Table
     */
    public function setColumns(array $columns): Table {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string { return $this->name; }


    /**
     * @param string $name
     * @return Table
     */
    public function setName(string $name): Table
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Column[]
     */
    public function getColumns(): array {
        return $this->columns;
    }






    public function dropQuery():Query{
        return new Query(new DropTable($this));
    }
    /*
    public function drop(DB $db){
        $query = $this->dropQuery();
        $db->execute($query);
    }
    /**/
    public function createQuery():Query{
        return new Query(new CreateTable($this));
    }
    /*
    public function create(DB $db){
        $query = $this->createQuery();
        $db->execute($query);
    }
    /**/

}
