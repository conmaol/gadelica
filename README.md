[nouns](grammar/nouns.md)

## The corpus directory

The corpus is contained within the directory /gadelica/corpus/. This directory contains one subdirectory for each corpus text - corpus/1/, corpus/2/, etc. The corpus directory also contains two other csv files –

* texts.csv – contains the UID, title, and author UID for each text
* people.csv – contains the UID, name, birth year and death year for each author

Each corpus subdirectory contains the text itself, as a plain text file named text.utf8, as well as a directory csv/ of associated CSV files. These csv files are created automatically from text.utf8 by running the shell script gadelica/scripts/txt2csv.sh with the argument 1, 2, 3 etc. The following CSV files are created –

* nodes.csv – one line for each interpunct (point between characters) in the text, with UIDs like ip_n_0, ip_n_1, etc.
* alphabetic.csv – one line for each alphabetic transition between pairs of adjacent interpuncts
* punctuation.csv – one line for each punctuation marker transition between pairs of adjacent interpuncts
* spaces.csv – one line for each empty transition between pairs of adjacent interpuncts
* digits.csv – one line for each numeric transition between pairs of adjacent interpuncts (both Arabic and Roman digits)
* words.csv – one line for every 'word'-level transition between pairs of usually non-adjacent interpuncts

The nodes.csv file is used to populate the interpunct nodes in the graph using the following Cypher queries –

create constraint
for (ip:Inter)
require ip.uid is unique

load csv with headers
from 'https://github.com/conmaol/gadelica/blob/master/corpus/1/csv/nodes.csv?raw=true' as nxt
merge (ip:Inter {uid: nxt.uid})

The alphabetic.csv, punctuation.csv, spaces.csv and digits.csv files are used to populate the graph with the appropriate character-level relationships between (already existing) interpunct nodes, using the following Cypher queries –

load csv with headers
from 'https://github.com/conmaol/gadelica/blob/master/corpus/1/csv/alphabetic.csv?raw=true' as nxt
match (ip1:Inter {uid: nxt.from})
match (ip2:Inter {uid: nxt.to})
merge (ip1)-[:ALPHABETIC {value: nxt.value, case: nxt.case, accent: nxt.accent}]->(ip2)

load csv with headers
from 'https://github.com/conmaol/gadelica/blob/master/corpus/1/csv/spaces.csv?raw=true' as nxt
match (ip1:Inter {uid: nxt.from})
match (ip2:Inter {uid: nxt.to})
merge (ip1)-[:SPACE {value: nxt.value}]->(ip2)

load csv with headers
from 'https://github.com/conmaol/gadelica/blob/master/corpus/1/csv/punctuation.csv?raw=true' as nxt
match (ip1:Inter {uid: nxt.from})
match (ip2:Inter {uid: nxt.to})
merge (ip1)-[:PUNCTUATION {value: nxt.value}]->(ip2)

load csv with headers
from 'https://github.com/conmaol/gadelica/blob/master/corpus/1/csv/digits.csv?raw=true' as nxt
match (ip1:Inter {uid: nxt.from})
match (ip2:Inter {uid: nxt.to})
merge (ip1)-[:DIGIT {value: nxt.value}]->(ip2)

Note that Roman numerals will not be picked up automatically in the digits.csv file, so both digits.csv and alphabetic.csv may need to be manually corrected before importing into the graph.

The words.csv file is used to populate the graph with estimated word-level relationships between (usually non-adjacent) interpuncts, using the following Cypher query –

load csv with headers
from 'https://github.com/conmaol/gadelica/blob/master/corpus/1/csv/words.csv?raw=true' as nxt
match (ip1:Inter {uid: nxt.from})
match (ip2:Inter {uid: nxt.to})
merge (ip1)-[:WORD {value: nxt.value}]->(ip2)

Word-level relations are estimated using the algorithm presented in the PHP script gadelica/php/txt2csv-words.php, which contains special rules for recognising orthographic ellipsis and prefixes etc.


Quotations?


