#!/bin/bash
#$1- code from db/server $2-original filename
# this script is responsible for processing the files within the server
# return status codes:
# 200 - success
# 500 - fail

#move file to temporary folder
cp /var/www/html/tradoc-ftp/files/"$1".zst /var/www/html/tradoc-ftp/files/temp/"$1".zst

cd /var/www/html/tradoc-ftp/files/temp
#zstd kicks in yoooo
/usr/local/bin/zstd "$1".zst --rm -q -d
mv "$1" "$2"


#delete temp folcer

if [ -e "$2" ] 
then 
    echo 200
    exit 1
else 
	echo "$2" " file doesnt exist." 
    echo  500
    exit 0
fi 
