#!/bin/bash
# this script is responsible for processing the files within the server
# return status codes:
# 200 - success
# 500 - fail

# trap file name
"$1"

#create temporary folder
mkdir temp

#move file to temporary folder
mv "$2" ./temp/"$1"

#change dir to temporary folder
cd ./temp

#zstd kicks in yoooo
zstd -q "$1" --rm

#move file out of the temp folder
mv "$1".zst ../"$1".zst

#delete temp folcer
cd ..
rm -rf ./temp 

if [ -e "$1".zst ] 
then 
    echo 200
    exit 1
else 
	echo "$1".zst " file doesnt exist." > errorlog_`date +"%T"`.txt
    echo  500
    exit 0
fi 
