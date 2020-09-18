<?php


namespace ModuleBZ\DB\Table\Column;

class EColumnTypeValue {
    public string $name;
    public function __construct(string $name) {
        $this->name = $name;
    }
}
