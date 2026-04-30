#!/bin/bash

echo $1
cd $1

for file in ./*.php; do
ln "$file" "$file.txt"
done
