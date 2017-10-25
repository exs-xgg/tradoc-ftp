#!/bin/bash
# this script is responsible for processing the files within the server
# return status codes:
# 200 - success
# 500 - fail

# trap file name

#create temporary folder
mkdir temp

#move file to temporary folder
cp "$1".zst ./temp/"$1".zst

#change dir to temporary folder
cd ./temp

#zstd kicks in yoooo
zstd "$1" --rm -q -d
mv "$1" ../"$2"


#delete temp folcer
cd ..
rm -rf ./temp 

if [ -e "$2".zst ] 
then 
    echo 200
    exit 1
else 
	echo "$2".zst " file doesnt exist." > errorlog_`date +"%T"`.txt
    echo  500
    exit 0
fi 
