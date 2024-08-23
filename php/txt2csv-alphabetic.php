<?php

$chars = mb_str_split(file_get_contents($argv[1]));

echo 'from,to,label,value,case,accent,' . PHP_EOL;

foreach ($chars as $key => $val) {
  if (ctype_lower($val)) {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,' . strtoupper($val) . ',lower,none,';
    echo PHP_EOL;
  }
  else if (ctype_upper($val)) {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,' . $val . ',upper,none,';
    echo PHP_EOL;
  }
  else if ($val=='à') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,A,lower,grave,';
    echo PHP_EOL;
  }
  else if ($val=='è') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,E,lower,grave,';
    echo PHP_EOL;
  }
  else if ($val=='ì') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,I,lower,grave,';
    echo PHP_EOL;
  }
  else if ($val=='ò') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,O,lower,grave,';
    echo PHP_EOL;
  }
  else if ($val=='ù') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,U,lower,grave,';
    echo PHP_EOL;
  }
  else if ($val=='À') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,A,upper,grave,';
    echo PHP_EOL;
  }
  else if ($val=='È') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,E,upper,grave,';
    echo PHP_EOL;
  }
  else if ($val=='Ì') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,I,upper,grave,';
    echo PHP_EOL;
  }
  else if ($val=='Ò') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,O,upper,grave,';
    echo PHP_EOL;
  }
  else if ($val=='Ù') {
    echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
    echo 'ALPHABETIC,U,upper,grave,';
    echo PHP_EOL;
  }
}

?>

