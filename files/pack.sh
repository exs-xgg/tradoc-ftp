#!/bin/bash
# this script is responsible for processing the files within the server
# return status codes:
# 200 - success
# 500 - fail


/usr/local/bin/zstd -q "$1" --rm


if [ -e "$1".zst ] 
then 
    echo 200
    exit 1
else 
	echo "$1".zst " file doesnt exist." > errorlog_`date +"%T"`.txt
    echo  500
    exit 0
fi 
