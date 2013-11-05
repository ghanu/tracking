#!/bin/bash
FILES=../src/js/*.js
for f in $FILES
do
  echo "Processing $f file..."
  # take action on each file. $f store current file name
  java -jar yuicompressor-2.4.2.jar $f -o $f

  
done
