<?php
function customError($error, $error_message, $error_file, $error_line)
{
    // 自定义错误处理时,手动抛出异常
    throw new Exception($error . '|' . $error_message);
}

set_error_handler('customError', E_ALL | E_STRICT);

try {
    $a = 5 / 0;
} catch (Exception $exception) {
    echo '错误信息:', $exception->getMessage(), PHP_EOL;
}