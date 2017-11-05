#!/bin/bash
# this script is responsible for processing the files within the server
# return status codes:
# 200 - success
# 500 - fail
 
mv "$1" /var/www/html/tradoc-ftp/files/temp/"$1"
cd /var/www/html/tradoc-ftp/files/temp

/usr/local/bin/zstd -q "$1" --rm

mv /var/www/html/tradoc-ftp/files/temp/"$1".zst /var/www/html/tradoc-ftp/files/"$1".zst

cd ..
rm -rf /var/www/html/tradoc-ftp/files/temp/*.zst

if [ -e /var/www/html/tradoc-ftp/files/"$1".zst ] 
then 
    echo 200
    exit 1
else 
	echo "$1".zst " file doesnt exist." 
    echo  500
    exit 0
fi 
