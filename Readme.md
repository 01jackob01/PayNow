# Instalacja composer

1. ``php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"``
2. ``php composer-setup.php``
3. ``php -r "unlink('composer-setup.php');"``
4. ``mv composer.phar /usr/local/bin/composer``

# Instalacja PayNow

1. Wykonać ``composer install`` w folderze w którym znajduje się plik ``composer.json``
2. Następnie jeżeli nadal nie działa wykonać``composer require pay-now/paynow-php-sdk`` 
