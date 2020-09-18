<?php

namespace ModuleBZ\DB;

use ModuleBZ\DB\Query\Options;
use ModuleBZ\DB\Query\Prepare;

/**
 * Класс отвечающий за генерацию запросов
 * Class Query
 * @package ModuleBZ\DB
 */
class Query {

    protected Options $options;
    public function __construct( Options $options ) {
        $this->options = $options;
    }
    public function __toString() {
        return (string)$this->options;
    }
    public function prepare():Prepare {
        return $this->options->prepare();
    }

}
