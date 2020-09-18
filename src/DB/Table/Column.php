<?php

namespace ModuleBZ\DB\Table;

use ModuleBZ\DB\Table\Column\EColumnType;

/**
 * Класс столбца в таблице
 * Class Column
 * @package ModuleBZ\DB\Table
 */
class Column {
    /**
     * Тип столбца
     * @var EColumnType $type
     * @link https://www.postgresql.org/docs/12/datatype.html
     */
    public EColumnType $type;

    /** @var string $name название столбца в базе данных */
    public string $name;

    /**
     * @param EColumnType $type
     * @return Column
     */
    public function setType(EColumnType $type): Column
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return EColumnType
     */
    public function getType(): EColumnType     {
        return $this->type;
    }


    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }



    /**
     * @param string $name
     * @return Column
     */
    public function setName(string $name): Column
    {
        $this->name = $name;
        return $this;
    }




}
