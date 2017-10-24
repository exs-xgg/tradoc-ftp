#! /bin/bash
# this script is responsible for processing the files within the server
# return status codes:
# 200 - success
# 500 - fail, see logs on /var/www/html/tradoc-ftp/logs/pack_logs

# flowchart
#
#
# pack.sh filename
# mv filename
#CHECK IF LOG FILE EXISTS
if [ -e /var/www/html/tradoc-ftp/logs/pack_logs ]
then
    
else
   touch /var/www/html/tradoc-ftp/logs/pack_logs
fi

$FILE_NAME = $1
$N
