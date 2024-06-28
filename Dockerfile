FROM php:8.2-apache

# installeer npm
RUN apt-get update && apt-get install -y npm

# installeer php extensies
RUN docker-php-ext-install pdo pdo_mysql

# stel de document root in naar public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# update de apache configuratie voor de nieuwe document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# maak een servernaam voor apache
RUN echo "Servername laravel-app.local">> /etc/apache2/apache2.conf

# installeer composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# stel work directroty in
WORKDIR /var/www/html

# kopieer het project naar de container
COPY . /var/www/html

# stelt de juiste permissies in
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && a2enmod rewrite

# stelt allowOverride en require all granted in
RUN echo "<Directory /var/www/html/public>\n\tAllowOverride All\n\tRequire all granted\n</Directory>" >> /etc/apache2/apache2.conf

# exposeerd port 80 voor de webserver
EXPOSE 80

# start apache
CMD ["apache2-foreground"]

