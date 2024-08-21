<?php

$chars = mb_str_split(file_get_contents($argv[1]));

foreach ($chars as $key => $val) {
  //if ($key>0) { break; }
  if ($key==0) {
    echo 'merge (x' . $key . ':Inter {uid: \'' . $key . '\'})';
  }
  else {
    echo 'merge (x' . $key . ')';
  }
  if (ctype_digit($val)) {
    echo '-[:DIGIT {value: \'' . $val . '\'}]->';
  }
  else if (ctype_punct($val) || $val=='’' || $val=='‘' || $val=='“' || $val=='”') {
    echo '-[:PUNCTUATION {value: \'' . $val . '\'}]->';
  }
  else if (ctype_lower($val)) {
    echo '-[:ALPHABETIC {value: \'' . strtoupper($val) . '\', case: \'lower\'}]->';
  }
  else if (ctype_upper($val)) {
    echo '-[:ALPHABETIC {value: \'' . $val . '\', case: \'upper\'}]->';
  }
  else if ($val==' ') {
    echo '-[:SPACE]->';
  }
  else if ($val==PHP_EOL) {
    echo '-[:NEWLINE]->';
  }
  else if ($val=='à') {
    echo '-[:ALPHABETIC {value: \'A\', case: \'lower\', accent: \'grave\'}]->';
  }
  else if ($val=='è') {
    echo '-[:ALPHABETIC {value: \'E\', case: \'lower\', accent: \'grave\'}]->';
  }
  else if ($val=='ì') {
    echo '-[:ALPHABETIC {value: \'I\', case: \'lower\', accent: \'grave\'}]->';
  }
  else if ($val=='ò') {
    echo '-[:ALPHABETIC {value: \'O\', case: \'lower\', accent: \'grave\'}]->';
  }
  else if ($val=='ù') {
    echo '-[:ALPHABETIC {value: \'U\', case: \'lower\', accent: \'grave\'}]->';
  }
  else if ($val=='À') {
    echo '-[:ALPHABETIC {value: \'A\', case: \'upper\', accent: \'grave\'}]->';
  }
  else if ($val=='È') {
    echo '-[:ALPHABETIC {value: \'E\', case: \'upper\', accent: \'grave\'}]->';
  }
  else if ($val=='Ì') {
    echo '-[:ALPHABETIC {value: \'I\', case: \'upper\', accent: \'grave\'}]->';
  }
  else if ($val=='Ò') {
    echo '-[:ALPHABETIC {value: \'O\', case: \'upper\', accent: \'grave\'}]->';
  }
  else if ($val=='Ù') {
    echo '-[:ALPHABETIC {value: \'U\', case: \'upper\', accent: \'grave\'}]->';
  }
  else {
    echo '-[:CHARACTER {value: \'' . $val . '\'}]->';
  }
  echo '(x' . $key+1 . ':Inter {uid: \'' . $key+1 . '\'})';
  echo PHP_EOL;
}

//

$wordstart = -1;
$word = '';
foreach ($chars as $key => $val) { 
  //if ($key>6100) { break; }
  if ($wordstart == -1 && (ctype_alpha($val) || $val=='à' || $val=='è' || $val=='ì' || $val=='ò' || $val=='ù')) { 
    // initial letter
    $wordstart = $key; // start of a new word
    $word .= $val;
  }
  else if ($wordstart != -1 && (ctype_alpha($val) || $val=='à' || $val=='è' || $val=='ì' || $val=='ò' || $val=='ù')) { 
    // medial letter
    $word .= $val; // add to existing word
  }
  else if ($wordstart != -1 && $val=='’' && ($word=='A' || $word=='a' || $word=='B' || $word=='b' || $word=='bh') && $chars[$key+1]==' ') { 
    // A’ a’ B’ b’ bh’
    $word .= $val;
  }
  else if ($wordstart == -1 && $val=='’' && ($chars[$key+1]=='S' || $chars[$key+1]=='s') && $chars[$key+2]==' ') { 
    // ’S ’s 
    $wordstart = $key;
    $word .= $val;
  }
  else if ($wordstart != -1 && $val=='’' && ($word=='dh' || $word=='Dh')) { 
    // dh’ Dh’
    $word .= $val;
  }
  else if ($wordstart != -1 && $val=='’' && ctype_alpha($chars[$key+1])) { 
    // a’m etc.
    $word .= $val;
  }
  else if ($wordstart != -1 && $val=='-' && ($word=='neo' || $word=='an' || $word=='An' || $word=='a' || $word=='A' || $word=='h' || $word=='t')) {
    // neo- an- An- a- A- h- t-
    $word .= $val;
  }
  else if ($wordstart != -1 && $val=='-' && $chars[$key+1]=='s' && $chars[$key+2]=='a' && $chars[$key+3]=='n' && !ctype_alpha($chars[$key+4])) {
    // -san 
    $word .= $val;
  }
  else if ($wordstart != -1 && ($word=='Ann' || $word=='ann') && $val==' ' && $chars[$key+1]=='a' && ($chars[$key+2]=='n' || $chars[$key+2]=='m') && $chars[$key+3]==' ') {
    // ann an, Ann an, ann am, Ann am
    $word .= $val;
  }

  else if ($wordstart != -1 && !(ctype_alpha($val) || $val=='è' || $val=='ò' || $val=='ù')) {
    echo 'merge (x' . $wordstart . ')';
    echo '-[:WORD {note: \'' . $word . '\'}]->(x' . $key . ')';
    echo PHP_EOL;
    $wordstart = -1;
    $word = '';
  }
}



?>

