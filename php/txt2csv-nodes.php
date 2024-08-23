<?php

$filename = '../corpus/' . $argv[1] . '/text.utf8';

$chars = mb_str_split(file_get_contents($filename));

echo 'uid,' . PHP_EOL;

foreach ($chars as $key => $val) {
  echo 'ip_' . $argv[1] . '_' . $key . ',' . PHP_EOL;
}

?>

