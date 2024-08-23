<?php

$chars = mb_str_split(file_get_contents($argv[1]));
echo 'from,to,value,' . PHP_EOL;


$wordstart = -1;
$word = '';
foreach ($chars as $key => $val) { 
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
  else if ($wordstart != -1 && !(ctype_alpha($val) || $val=='à'|| $val=='è' || $val=='ì' || $val=='ò' || $val=='ù')) {
    echo 'ip_1_' . $wordstart . ',';
    echo 'ip_1_' . $key . ',';
    echo $word . ',';
    echo PHP_EOL;
    $wordstart = -1;
    $word = '';
  }
}



?>

