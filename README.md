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
Installing Scribbl in a development environment is simple.
<br/>
⚠️ **Please make sure you have `PHP =< 8.1` installed.**
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

## License
This software is licensed under the [MIT license](https://opensource.org/licenses/MIT).
