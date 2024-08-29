#!/bin/sh

# This script takes a reference to a directory containing a UTF8 text file as the sole input paramater ($1) eg. 1, 2, 3, ...
# It then runs a series of PHP scripts that run over the text files and each creates a CSV file representing nodes or edges for importing into a graph database representation of that text.

mkdir ../corpus/$1/csv/
php ../php/txt2csv-nodes.php $1 > ../corpus/$1/csv/nodes.csv               # node ids
php ../php/txt2csv-alphabetic.php $1 > ../corpus/$1/csv/alphabetic.csv    # labelled edges representing alphabetic characters
php ../php/txt2csv-digits.php $1 > ../corpus/$1/csv/digits.csv             # labelled edges representing digits
php ../php/txt2csv-punctuation.php $1 > ../corpus/$1/csv/punctuation.csv  # labelled edges representing punctuation markers
php ../php/txt2csv-spaces.php $1 > ../corpus/$1/csv/spaces.csv             # labelled edges representing horizontal and vertical whitespace
php ../php/txt2csv-words.php $1 > ../corpus/$1/csv/words.csv               # labelled edges representing orthographic words
php ../php/txt2csv-other.php $1                                            # identifies any characters missed or overlooked in the above scripts


