FROM php:7.3-apache

RUN docker-php-ext-install mysqli

COPY ./vhost1 /var/www/vhost1
COPY ./vhost2 /var/www/vhost2
COPY ./httpd.conf /etc/apache2/sites-available/000-default.conf

RUN a2ensite 000-default.conf

