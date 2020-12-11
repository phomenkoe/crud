FROM php:7.4-fpm
MAINTAINER fei

RUN apt-get update && apt-get upgrade -y \ 
	&& apt-get install libz-dev \
		libzip-dev \
		libpq-dev \
		wget \
		unzip \
		mc \
		procps \
		systemd -y
		
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY infrastructure/php-fpm/php.conf $PHP_INI_DIR/conf.d/
COPY infrastructure/php-fpm/custom.ini $PHP_INI_DIR/conf.d/

RUN docker-php-ext-install -j$(nproc) zip \
   && docker-php-ext-install -j$(nproc) pdo_mysql \
   && docker-php-ext-install -j$(nproc) pgsql \
   && docker-php-ext-install -j$(nproc) pdo_pgsql \
   && docker-php-ext-install calendar

WORKDIR /home
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"; php composer-setup.php; php -r "unlink('composer-setup.php');"
   
WORKDIR /var/www/html

CMD /home/composer.phar install; /home/composer.phar dump-autoload; php artisan up; php-fpm
