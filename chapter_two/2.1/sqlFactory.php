<?php

class sqlFactory
{
    public static function factory($type)
    {
        if (include_once './db_adapter_' . $type . '.php') {
            $classname = 'Db_Adapter_' . $type;
            return new $classname;
        } else {
            throw new Exception('Driver not found');
        }
    }
}

$db = sqlFactory::factory('mysql');
$db = sqlFactory::factory('sqlite');