#!/bin/sh

mkdir ../corpus/$1/csv/
php ../php/txt2csv-nodes.php $1 > ../corpus/$1/csv/nodes.csv
php ../php/txt2csv-alphabetic.php $1 > ../corpus/$1/csv/alphabetic.csv
php ../php/txt2csv-digits.php $1 > ../corpus/$1/csv/digits.csv
php ../php/txt2csv-punctuation.php $1 > ../corpus/$1/csv/punctuation.csv
php ../php/txt2csv-spaces.php $1 > ../corpus/$1/csv/spaces.csv
php ../php/txt2csv-words.php $1 > ../corpus/$1/csv/words.csv
php ../php/txt2csv-other.php $1


