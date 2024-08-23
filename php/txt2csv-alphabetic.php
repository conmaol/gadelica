<?php

$filename = '../corpus/' . $argv[1] . '/text.utf8';

$chars = mb_str_split(file_get_contents($filename));

echo 'from,to,value,case,accent,' . PHP_EOL;

foreach ($chars as $key => $val) {
  if (ctype_lower($val)) {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo strtoupper($val) . ',lower,none,';
    echo PHP_EOL;
  }
  else if (ctype_upper($val)) {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo $val . ',upper,none,';
    echo PHP_EOL;
  }
  else if ($val=='à') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo 'A,lower,grave,';
    echo PHP_EOL;
  }
  else if ($val=='è') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo 'E,lower,grave,';
    echo PHP_EOL;
  }
  else if ($val=='ì') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo 'I,lower,grave,';
    echo PHP_EOL;
  }
  else if ($val=='ò') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo 'O,lower,grave,';
    echo PHP_EOL;
  }
  else if ($val=='ù') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo 'U,lower,grave,';
    echo PHP_EOL;
  }
  else if ($val=='À') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo 'A,upper,grave,';
    echo PHP_EOL;
  }
  else if ($val=='È') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo 'E,upper,grave,';
    echo PHP_EOL;
  }
  else if ($val=='Ì') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo 'I,upper,grave,';
    echo PHP_EOL;
  }
  else if ($val=='Ò') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo 'O,upper,grave,';
    echo PHP_EOL;
  }
  else if ($val=='Ù') {
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo 'U,upper,grave,';
    echo PHP_EOL;
  }
}

?>

