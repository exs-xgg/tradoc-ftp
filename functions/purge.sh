#!/bin/bash
# SHELL SCRIPT WRITTEN BY ROMEO MANUEL E. DAVID
# PURPOSE: TO DELETE TEMP FILES ON /tradoc-ftp/files/temp
#          TO RUN EVERY 12 MN OF THE DAY
# CRONTAB CODE: [0 0 * * *  /var/www/html/tradoc-ftp/functions/purge.sh]

rm -rf /var/www/html/tradoc-ftp/files/temp/
cp /var/www/html/tradoc-ftp/files/index.php /var/www/html/tradoc-ftp/files/index.php
