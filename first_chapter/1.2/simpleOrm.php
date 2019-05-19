<?php

abstract class ActiveRecode
{
    protected static $table;
    protected $fieldvalues;
    public $select;

    static function findById($id)
    {
        $query = "select * from " . static::$table . " where id = $id";
        return self::createDomain($query);
    }

    function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->fieldvalues[$name];
    }

    static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        $field = preg_replace('/^findBy(\w*)$/', '${1}', $name);
        $query = "select * from " . static::$table . " where $field = '$arguments[0]'";
        return self::createDomain($query);
    }

    private static function createDomain($query)
    {
        $klass = get_called_class();
        $domain = new $klass();
        $domain->fieldvalues = [];
        $domain->select = $query;
        foreach ($klass::$fieldvaluse as $field => $type) {
            $domain->fieldvalues[$field] = 'TODO: set from sql result';
        }
        return $domain;
    }
}

class Customer extends ActiveRecode
{
    protected static $table = 'customer';
    protected static $fields = [
        'id' => 'int',
        'email' => 'varchar',
        'lastname' => 'varchar'
    ];
}

class Sales extends ActiveRecode
{
    protected static $table = 'salesdb';
    protected static $fields = [
        'id' => 'int',
        'item' => 'varchar',
        'qty' => 'int'
    ];
}

assert("select * from customer where id = 123" == Customer::findById(123)->select);
assert("TODO: set from sql result" == Customer::findById(123)->email);
assert("select * from salesdb where id = 321" == Sales::findById(321)->select);
assert("select * from customer where Lastname = 'Denoncourt'" == Customer::findByLastname('Denoncourt')->select);


