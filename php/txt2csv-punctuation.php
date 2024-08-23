<?php

$chars = mb_str_split(file_get_contents($argv[1]));

echo 'from,to,label,value,' . PHP_EOL;

foreach ($chars as $key => $val) {
  
  if (ctype_punct($val) || $val=='’' || $val=='‘' || $val=='“' || $val=='”') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'PUNCTUATION,"' . $val . '",';
    echo PHP_EOL;
  }
  
}

?>

