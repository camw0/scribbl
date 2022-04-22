![Main Language](https://img.shields.io/github/languages/top/cmrxnn/scribbl?style=for-the-badge)
![Code Size](https://img.shields.io/github/languages/code-size/cmrxnn/scribbl?style=for-the-badge)
![Open Issues](https://img.shields.io/github/issues/cmrxnn/scribbl?style=for-the-badge)
![License](https://img.shields.io/github/license/cmrxnn/scribbl?style=for-the-badge)
![Version](https://img.shields.io/github/v/tag/cmrxnn/scribbl?include_prereleases&style=for-the-badge)

![Scribbl Logo](https://cdn.discordapp.com/attachments/877638903039934574/951996055589900358/scribbl.png)
# Scribbl Software
Scribbl is an all-in-one minimalist note-taking application, built with Laravel.
Designed to be fast, secure and easy to use while maintaining a beautiful UI experience.

## Install (Development)
### These guides are temporary while a documentation site is in the works.
```bash
LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
apt -y install php8.1 php8.1-{cli,gd,mysql,pdo,mbstring,tokenizer,bcmath,xml,fpm,curl,zip}
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

cd /srv # Make this directory wherever you want to download and edit Scribbl in development.
git clone https://github.com/cmrxnn/scribbl && cd scribbl

cp -R .env.example .env
php artisan key:generate

composer install

# From here, you'll need to venture out on your own for now and set up the database yourself.
# New-to-SQL people, don't worry! Documentation is coming for this soon.

php artisan serve # Starts a webserver on localhost:8000.
```

## Install (Production)
### These guides are temporary while a documentation site is in the works.
```bash
LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
apt -y install php8.1 php8.1-{cli,gd,mysql,pdo,mbstring,tokenizer,bcmath,xml,fpm,curl,zip} nginx
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

mkdir /var/www/scribbl
cd /var/www/scribbl
curl -Lo scribbl.tar.gz https://github.com/cmrxnn/scribbl/releases/latest/download/scribbl.tar.gz
tar -xzvf scribbl.tar.gz
chmod -R 755 storage/* bootstrap/cache/

cp -R .env.example .env
php artisan key:generate --force

composer install --no-dev --optimize-autoloader

chown -R www-data:www-data /var/www/scribbl/*

mysql> CREATE USER 'scribbluser'@'127.0.0.1' IDENTIFIED BY 'yourPassword';
mysql> CREATE DATABASE scribbl;
mysql> GRANT ALL PRIVILEGES ON scribbl.* TO 'scribbluser'@'127.0.0.1' WITH GRANT OPTION;
# After configuring the database, open your .env file and fill out the database fields.

# Make sure to SSL your domain using Let's Encrypt.
# Follow this guide in case you get stuck: https://pterodactyl.io/tutorials/creating_ssl_certificates.html

nano /etc/nginx/sites-available/scribbl.conf
# From here, create a nginx configuration to point Scribbl to your domain.
# An example of this is available here: https://pterodactyl.io/panel/1.0/webserver_configuration.html
systemctl restart nginx
```

## License
This software is licensed under the [MIT license](https://opensource.org/licenses/MIT).
