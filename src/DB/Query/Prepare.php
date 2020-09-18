<?php

namespace ModuleBZ\DB\Query;
class Prepare{
    public string $query;
    public array $params;
    public function __construct(string $query,array $params=[]) {
        $this->query = $query;
        $this->params = $params;
    }
}
