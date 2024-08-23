<?php

$filename = '../corpus/' . $argv[1] . '/text.utf8';

$chars = mb_str_split(file_get_contents($filename));

echo 'from,to,value,' . PHP_EOL;

foreach ($chars as $key => $val) {
  if (ctype_punct($val) || $val=='’' || $val=='‘' || $val=='“' || $val=='”') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo '"' . $val . '",';
    echo PHP_EOL;
  }
}

?>

