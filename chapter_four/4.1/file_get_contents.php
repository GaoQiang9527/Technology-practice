<?php
$html = file_get_contents('https://www.baidu.com');
print_r($http_response_header);
$fp = fopen('https://www.baidu.com', 'r');
print_r($fp);
fclose($fp);
echo PHP_EOL;