<?php

namespace crodas\InfluxPHP;

class ResultSet extends ArrayIterator
{
    public function __construct(array $result)
    {
        $resultsets = [];
        foreach ($result as $resultset) {
            $rs = new stdClass();
            $rs->name = $resultset["name"];
            $rs->points = new Cursor($result['points']);
        }
        parent::__construct($resultsets);
    }
}