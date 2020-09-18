<?php

namespace ModuleBZ\DB\Table\Column;

use ModuleBZ\Framework\Helpers\ENum;

/**
 * Enumerator для типов столбцов
 * Class EColumnTypes
 * @package ModuleBZ\DB\Table\Column
 * @link https://www.postgresql.org/docs/12/datatype.html
 */
class EColumnTypes extends ENum {
    // NUMERIC
    /** @see https://www.postgresql.org/docs/12/datatype-numeric.html */
    static EColumnType $SMALLINT;
    static EColumnType $INTEGER;
    static EColumnType $BIGINT;
    static EColumnType $DECIMAL;
    static EColumnType $NUMERIC;
    static EColumnType $REAL;
    static EColumnType $DOUBLE_PRECISION;
    static EColumnType $SMALL_SERIAL;
    static EColumnType $SERIAL;
    static EColumnType $BIG_SERIAL;


    private static function init(){
        self::$SMALLINT          = new EColumnType("SMALLINT",          new EColumnTypeValue("smallint"));
        self::$INTEGER           = new EColumnType("INTEGER",           new EColumnTypeValue("integer"));
        self::$BIGINT            = new EColumnType("BIGINT",            new EColumnTypeValue("bigint"));
        self::$DECIMAL           = new EColumnType("DECIMAL",           new EColumnTypeValue("decimal"));
        self::$NUMERIC           = new EColumnType("NUMERIC",           new EColumnTypeValue("numeric"));
        self::$REAL              = new EColumnType("REAL",              new EColumnTypeValue("real"));
        self::$DOUBLE_PRECISION  = new EColumnType("DOUBLE_PRECISION",  new EColumnTypeValue("double precision"));
        self::$SMALL_SERIAL      = new EColumnType("SMALL_SERIAL",      new EColumnTypeValue("smallserial"));
        self::$SERIAL            = new EColumnType("SERIAL",            new EColumnTypeValue("serial"));
        self::$BIG_SERIAL        = new EColumnType("BIG_SERIAL",        new EColumnTypeValue("bigserial"));
    }
}
(static function(){ static::init(EColumnType::class); })->bindTo(null,EColumnTypes::class)();
