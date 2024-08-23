<?php

$chars = mb_str_split(file_get_contents($argv[1]));

echo 'from,to,value,' . PHP_EOL;

foreach ($chars as $key => $val) {
  if (ctype_digit($val)) {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo $val . ',';
    echo PHP_EOL;
  } 
}

?>

