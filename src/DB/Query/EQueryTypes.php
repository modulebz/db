<?php

namespace ModuleBZ\DB\Query;
use ModuleBZ\Framework\Helpers\ENum;

class EQueryTypes extends ENum {
    static EQueryType $SELECT;
    static EQueryType $UPDATE;
    static EQueryType $CREATE_TABLE;
}
(static function(){ static::lazyInit(EQueryType::class); })->bindTo(null,EQueryTypes::class)();
