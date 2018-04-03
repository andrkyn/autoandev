Описание файла /etc/apache2/sites-available$/config.conf
------------------------
<VirtualHost *:80>

    ServerName autoandev.loc
    ServerAlias www.autoandev.loc
    DocumentRoot /var/www/autoandev

    ErrorLog ${APACHE_LOG_DIR}/autoandev_loc_error.log
    CustomLog ${APACHE_LOG_DIR}/autoandev_loc_access.log combined

    <Directory "/var/www/autoandev">
        Options Indexes FollowSymlinks
        AllowOverride All
        Require all granted
    </Directory>

</VirtualHost>

------------------------

> Создан новый пользователь в MySql с именем useryii и база данных с именем autodb2. <
> Юзеру предоставлены права доступа только к этой базе. <

mysql> SHOW GRANTS FOR useryii@localhost;
+--------------------------------------------------------------+
| Grants for useryii@localhost                                 |
+--------------------------------------------------------------+
| GRANT USAGE ON *.* TO 'useryii'@'localhost'                  |
| GRANT ALL PRIVILEGES ON `autodb2`.* TO 'useryii'@'localhost' |
+--------------------------------------------------------------+
2 rows in set (0,02 sec)

mysql> 


> Настроен prettyUrl <

-------------------------