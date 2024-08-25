<?php

/*
This script takes a reference to a directory containing a UTF8 text file as the sole input parameter ($argv[1]) eg. 1, 2, 3, ...
and writes out a CSV file containing information about the alphabetic characters in that file.

eg.
from, to, value, case, accent,
ip_23_456, ip_23_457, A, lower, grave

= "In text 23, there is an à between positions/locations ('interpuncts') 456 and 457."

This script is typically called from the script /scripts/txt2csv.sh
*/

$filename = '../corpus/' . $argv[1] . '/text.utf8'; // construct the path to the text file

$chars = mb_str_split(file_get_contents($filename)); // open and character tokenise the text file

echo 'from,to,value,case,accent,' . PHP_EOL; // write CSV headers to STDOUT


foreach ($chars as $key => $val) {
  if (ctype_lower($val)) { // LOWERCASE ASCII
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo strtoupper($val) . ',lower,none,';
    echo PHP_EOL;
  }
  else if (ctype_upper($val)) { // UPPERCASE ASCII
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ',';
    echo $val . ',upper,none,';
    echo PHP_EOL;
  }
  else if ($val=='à') { // LOWERCASE GRAVES
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
  else if ($val=='À') { // UPPERCASE GRAVES
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

