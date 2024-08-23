<?php

$chars = mb_str_split(file_get_contents($argv[1]));

echo 'from,to,value,' . PHP_EOL;

foreach ($chars as $key => $val) {
  if ($val==' ' || $val==PHP_EOL) {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    if ($val==PHP_EOL) {
      echo 'vertical,';
    }
    else {
      echo 'horizontal,';
    }
    echo PHP_EOL;
  }
}

?>

