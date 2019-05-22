<?php

class Account
{
    private $user = 1;
    private $pwd = 2;

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        echo "Setting $name to $value \r\n";
        $this->$name = $value;
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (!isset($this->$name)) {
            echo '未设置' . "\r\n";
            $this->$name = '正在为你设置默认值';
        }

        return $this->$name;
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        switch (count($arguments)) {
            case 2:
                echo $arguments[0] * $arguments[1], PHP_EOL;
                break;
            case 3:
                echo array_sum($arguments), PHP_EOL;
                break;
            default:
                echo '参数不对', PHP_EOL;
                break;
        }
    }
}

$a = new Account();
echo $a->user . "\r\n";
$a->name = 5;
echo $a->name . "\r\n";
echo $a->big . "\r\n";
$a->make(5);
$a->make(5, 6);