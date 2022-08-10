FROM php:7.1.2-apache
MAINTAINER jakob.juenger@uni-muenster.de

# Add intl extension to PHP
RUN apt-get update && apt-get install -y libicu-dev 
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl

# Add git, zip and unzip
RUN apt-get update && apt-get -y --no-install-recommends install zip unzip git
RUN apt-get update && apt-get install -y zlib1g-dev && rm -rf /var/lib/apt/lists/* && docker-php-ext-install zip 

# Add mySQL client
RUN apt-get update && apt-get install -y mysql-client && rm -rf /var/lib/apt
RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html