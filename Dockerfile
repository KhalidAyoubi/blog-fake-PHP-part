FROM php:apache

# Instala la extensión mysqli
RUN docker-php-ext-install mysqli

# Copia el contenido del directorio actual al contenedor
COPY . /var/www/html/
