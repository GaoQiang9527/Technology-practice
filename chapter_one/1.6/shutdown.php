<?php

class Shutdown
{
    public function stop()
    {
        if (error_get_last()) {
            print_r(error_get_last());
        }
        die('Stop.' . PHP_EOL);
    }
}

register_shutdown_function([new Shutdown(), 'stop']);
$a = new a(); // 将因致命错误而失败
echo '必须终止';