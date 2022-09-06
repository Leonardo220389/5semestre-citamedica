FROM php:8.0-apache
COPY . /var/www/html/
#instalando y habilitando el driver de conexion mysql para php 
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
#Actualizando y subiendo la version del sistema operativo
RUN apt-get update && apt-get upgrade -y
