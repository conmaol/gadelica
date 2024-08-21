<?php

$chars = mb_str_split(file_get_contents($argv[1]));

echo 'from,to,label,value,case,accent' . PHP_EOL;

foreach ($chars as $key => $val) {
  echo 'ip_1_' . $key . ',' . 'ip_1_' . $key+1 . ',';
  
  if (ctype_digit($val)) {
    echo 'DIGIT,' . $val . ',,';
  }
  else if (ctype_punct($val) || $val=='’' || $val=='‘' || $val=='“' || $val=='”') {
    echo 'PUNCTUATION,"' . $val . '",,';
  }
  else if ($val==' ' || $val==PHP_EOL) {
    echo 'SPACE,';
    if ($val==PHP_EOL) {
      echo 'vertical,,';
    }
    else {
      echo 'horizontal,,';
    }
  }
  else if (ctype_lower($val)) {
    echo 'ALPHABETIC,' . strtoupper($val) . ',lower,none';
  }
  else if (ctype_upper($val)) {
    echo 'ALPHABETIC,' . $val . ',upper,none';
  }
  else if ($val=='à') {
    echo 'ALPHABETIC,A,lower,grave';
  }
  else if ($val=='è') {
    echo 'ALPHABETIC,E,lower,grave';
  }
  else if ($val=='ì') {
    echo 'ALPHABETIC,I,lower,grave';
  }
  else if ($val=='ò') {
    echo 'ALPHABETIC,O,lower,grave';
  }
  else if ($val=='ù') {
    echo 'ALPHABETIC,U,lower,grave';
  }
  else if ($val=='À') {
    echo 'ALPHABETIC,A,upper,grave';
  }
  else if ($val=='È') {
    echo 'ALPHABETIC,E,upper,grave';
  }
  else if ($val=='Ì') {
    echo 'ALPHABETIC,I,upper,grave';
  }
  else if ($val=='Ò') {
    echo 'ALPHABETIC,O,upper,grave';
  }
  else if ($val=='Ù') {
    echo 'ALPHABETIC,U,upper,grave';
  }
  else {
    echo 'CHARACTER,' . $val . ',,';
  }
  echo PHP_EOL;
}

?>

