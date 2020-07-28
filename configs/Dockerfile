FROM php:7.3.3-apache

## Install extra dependencies
RUN apt-get update \
	&& apt-get install -y \
	    vim \
	    zlib1g-dev \
	    libzip-dev \
	    libpng-dev \
		git \
		unzip \
		apache2-utils \
		wget \
		libpcre3 \
		libpcre3-dev \
		libxml++2.6-dev \
		apt-utils \
	&& apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN a2enmod rewrite expires

RUN docker-php-ext-install zip

RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-install gd

RUN docker-php-ext-install dom

RUN docker-php-ext-install json

RUN docker-php-ext-install xmlwriter

RUN pecl install xdebug

RUN echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20180731/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.show_exception_trace=0" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.max_nesting_level=256" >> /usr/local/etc/php/conf.d/xdebug.ini
    
# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN adduser --disabled-password --gecos '' appuser

# create project
# RUN cd /var/www/html && composer create-project --prefer-dist laravel/lumen .

# Unlink symbolic link from default vhost
RUN unlink /etc/apache2/sites-enabled/000-default.conf

# Remove dafault vhos file configuration
RUN rm -rf /etc/apache2/sites-available/000-default.conf

COPY conf.d/001-site.conf /etc/apache2/sites-available/

RUN ln -s /etc/apache2/sites-available/001-site.conf /etc/apache2/sites-enabled/001-site.conf
