<?php

$chars = mb_str_split(file_get_contents($argv[1]));

echo 'uid,' . PHP_EOL;

foreach ($chars as $key => $val) {
  echo 'ip_1_' . $key . ',' . PHP_EOL;
}

?>

