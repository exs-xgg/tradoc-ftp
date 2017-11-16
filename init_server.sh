#!/bin/bash
# SCRIPT TO AUTOMATE SERVER SETUP

# init packages
# sudo yum install httpd -y
# sudo yum install mysql-server -y 
# sudo yum install php-mysql php-ftp php -y
# yum groupinstall "Development tools" -y
# sudo yum install git -y


chown apache:apache /var/www/html
chown apache:apache /var/www/html/tradoc-ftp
chmod 777 /var/www/html/tradoc-ftp
chown apache:apache /var/www/html/tradoc-ftp/files
chown apache:apache /var/www/html/tradoc-ftp/files/temp
chmod 777 /var/www/html/tradoc-ftp/files
chmod 777 /var/www/html/tradoc-ftp/files/temp
chmod 777 /var/www/html/tradoc-ftp/files/*.sh

echo "======DONE SETUP======="