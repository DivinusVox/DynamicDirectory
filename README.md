DynamicDirectory
================

Dynamic directory parser in PHP

Parses specified directory ( $dir in head ). This parse is not recursive.

In parsing, the program iterates each file in $dir, checking for directories that are not parent or self. 
Given those conditions, it checks that directory for a definition file (define.txt by default).
define.txt allows you to specify a custom name for the listing, or to skip a given directory.
  The lack of a define.txt results in the foldername being listed as the linked text in the resulting HTML.
  The presence of "null" as the only text results in that folder not being listed.
  Any other string will be listed as the linked text in the resulting HTML.
