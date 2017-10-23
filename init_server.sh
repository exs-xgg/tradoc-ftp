#SCRIPT TO AUTOMATE SERVER SETUP

#init packages
sudo yum install httpd -y
sudo yum install mysql-server -y 
sudo yum install php-mysql php-ftp php -y

mkdir files
chown apache:apache /var/www/html
chmod 775 /var/www/html/tradoc-ftp
mysql -u root -p < tradoc_server.sql

echo "======DONE SETUP======="