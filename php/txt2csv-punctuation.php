<?php

/*
This script takes a reference to a directory containing a UTF8 text file as the sole input parameter ($argv[1]) eg. 1, 2, 3, ...
and writes out a CSV file containing information about the punctuation characters in that file.

eg.
from, to, value,
ip_23_456, ip_23_457, "!",

= "In text 23, there is an exclamation mark between positions/locations ('interpuncts') 456 and 457."

This script is typically called from the script /scripts/txt2csv.sh
*/

$filename = '../corpus/' . $argv[1] . '/text.utf8'; // construct the path to the text file

$chars = mb_str_split(file_get_contents($filename)); // open and character tokenise the text file

echo 'from,to,value,' . PHP_EOL; // write CSV headers to STDOUT

foreach ($chars as $key => $val) {
  if (ctype_punct($val) || $val=='’' || $val=='‘' || $val=='“' || $val=='”' || $val=='…') { // ignore non-punctuation characters
    echo 'ip_' . $argv[1] . '_' . $key . ',' . 'ip_' . $argv[1] . '_' . $key+1 . ','; // write 'from' and 'to' field values
    echo '"' . $val . '",'; // write 'value' field value ie. the punctuation character itself (inside double quotes for sanitisation)
    echo PHP_EOL;
  }
}

?>

