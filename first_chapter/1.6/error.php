<?php
function customError($errno, $errstr, $errfile, $errline)
{
    echo "<b>错误代码:<b> [{$errno}] ${errstr}\r\n";
    echo "错误所在的代码行: {$errline} 文件{$errfile}\r\n";
    echo "PHP版本:", PHP_VERSION, "(", PHP_OS, ")\r\n";
}

set_error_handler('customError', E_ALL | E_STRICT);

$a = ['o'=>2,3,4,5];
echo $a[o];


