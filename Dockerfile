FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite
