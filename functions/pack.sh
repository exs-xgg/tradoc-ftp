#! /bin/bash
# this script is responsible for processing the files within the server
# return status codes:
# 200 - success
# 500 - fail

# trap file name
$FILE_NAME = $1

#create temporary folder
mkdir temp

#move file to temporary folder
mv $FILE_NAME ./temp/$FILE_NAME

#change dir to temporary folder
cd ./temp

#zstd kicks in yoooo
zstd $FILE_NAME --rm

#move file out of the temp folder
mv $FILE_NAME.zst ../$FILE_NAME.zst

#delete temp folcer
cd ..
rm -rf ./temp 

if [ -e $FILE_NAME.zst ] 
then 
    echo 200
    exit 1
else 
	echo $FILE_NAME.zst " file doesnt exist." > errorlog_`date +"%T"`.txt
    echo  500
    exit 0
fi 
