<?php

namespace crodas\InfluxPHP;

use ArrayIterator;
use stdClass;

class ResultSet extends ArrayIterator
{
    public function __construct(array $result)
    {
        $resultsets = [];
        foreach ($result as $resultset) {
            $rs = new stdClass();
            $rs->name = $resultset["name"];
            $rs->columns = $resultset["columns"];
            $rs->points = new Cursor($rs, $resultset['points']);
            $resultsets[] = $rs;
        }
        parent::__construct($resultsets);
    }
}
