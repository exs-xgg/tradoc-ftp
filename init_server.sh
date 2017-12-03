#!/bin/bash
# SCRIPT TO AUTOMATE SERVER SETUP

# init packages
# sudo yum install httpd -y
# sudo yum install mysql-server -y 
# sudo yum install php-mysql php-ftp php -y
# yum groupinstall "Development tools" -y
# sudo yum install git -y
chown apache:apache tradoc-ftp/files
chown apache:apache tradoc-ftp/files/temp
chmod 777 tradoc-ftp/files
chmod 777 tradoc-ftp/files/temp
chmod 777 tradoc-ftp/files/*.sh
service iptables stop

cd /var
wget https://github.com/facebook/zstd/archive/v1.3.2.zip
cd zstd-1.0.0
make install
zstd--version

service networking restart
service httpd restart
service mysqld restart
mysql -u root < sql.sql
echo "0 0 * * *  /var/www/html/tradoc-ftp/functions/purge.sh" >> /var/spoo/cron/root

echo "======DONE SETUP======="