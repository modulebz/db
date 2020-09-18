<?php

namespace ModuleBZ\DB\Query;

use ModuleBZ\DB\Table;

abstract class Options implements IOptions {
    /** @var EQueryType $type тип запроса к базе данных */
    protected EQueryType $type;

    public function __toString() {
        $prepare = $this->prepare();
        return str_replace(
            array_keys($prepare->params),
            array_values($prepare->params),
            $prepare->query
        );
    }

}
