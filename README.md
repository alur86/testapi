The Laravel base test json api

Installation issue:

1. create the folder at the web server path at Linux/Unix and copy files of project there.

2. create new file at the Apache2 testlocal.conf  and save at the folder etc/apache2/sites-available


<VirtualHost *:80>
        ServerName test.local
        ServerAlias test.local
    DocumentRoot /var/www/test/public/
    <Directory /var/www/test/public/>
        Options All
        AllowOverride All
        Order Allow,Deny
        Allow From All
    </Directory>
</VirtualHost>


2.   Edit file  etc/hosts


127.0.0.1	localhost
127.0.1.1   test.local            



3. launch command sudo a2ensite test.conf

4. then use: sudo /etc/init.d/apache2 reload

5. enter to the folder of project and launch:

    sudo chmod -R 777 storage 

6. then started at the application folder: sudo composer install

7. sudo php artisan key:generate

8. configure database connection at the file .env


That's all folks.

