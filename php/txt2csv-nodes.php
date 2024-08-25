<?php

/*
This script takes a reference to a directory containing a UTF8 text file as the sole input parameter ($argv[1]) eg. 1, 2, 3, ...
and writes out a CSV file containing information (ie. node ids) about the locations/positions/interpuncts in that file.

eg.
uid,
ip_23_0,
ip_23_1,
. . .

This script is typically called from the script /scripts/txt2csv.sh
*/

$filename = '../corpus/' . $argv[1] . '/text.utf8'; // construct the path to the text file

$chars = mb_str_split(file_get_contents($filename)); // open and character tokenise the text file

echo 'uid,' . PHP_EOL; // write CSV headers to STDOUT

foreach ($chars as $key => $val) {
  echo 'ip_' . $argv[1] . '_' . $key . ',' . PHP_EOL;
}

?>

