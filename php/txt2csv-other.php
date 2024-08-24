<?php

/*
This script takes a reference to a directory containing a UTF8 text file as the sole input parameter ($argv[1]) eg. 1, 2, 3, ...
and writes out an error when it comes across a character that is not recognised by the system as a whole.

This script is typically called from the script /scripts/txt2csv.sh

THIS SCRIPT SHOULD ALWAYS AND ONLY BE UPDATED IN TANDEM WITH ONE OF THE OTHER SPECIALISED CSV-PRODUCING PHP SCRIPTS. 
*/

$filename = '../corpus/' . $argv[1] . '/text.utf8'; // construct the path to the text file

$chars = mb_str_split(file_get_contents($filename)); // open and character tokenise the text file

foreach ($chars as $key => $val) {
  if (!(
          ctype_digit($val)
       || ctype_punct($val) || $val=='’' || $val=='‘' || $val=='“' || $val=='”' || $val='…' // punctuation marker
       || $val==' ' || $val==PHP_EOL // whitespace
       || ctype_alpha($val)
       || $val=='à' || $val=='è' || $val=='ì' || $val=='ò' || $val=='ù'
       || $val=='À' || $val=='È' || $val=='Ì' || $val=='Ò' || $val=='Ù' 
      )
) {
    echo 'UNRECOGNISED CHARACTER: ' . $val . ' in text ' . $argv[1] . ' between ' . $key . ' and ' . $key+1 . PHP_EOL;
  }  
}

?>

