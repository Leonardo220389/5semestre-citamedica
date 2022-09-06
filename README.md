# para construir la imagen usamos el siguiente comando
docker build -t leonardo1989/crearcitamedica:1.0 .
# correr el contenedor ejecutamos el siguiente comando
# opciones
# --rm => para elminar automáticamente el contenedor cuando se pare
# -it => para que sea interactivo y se pueda usar la consola
# -v => para poder crear un volumen, compartir un directorio entre la máquina local y el contenedor
# -p => para exponer un puerto maquina-local:contenedor

# docker run --rm -it --name crearcita -v %cd%:/var/www/html -p 8080:80 leonardo1989/crearcita:1.2

# docker run --rm -it --name crearcita -p 8080:80 leonardo1989/crearcita:1.0

docker run --name crearcita -p 8080:80 leonardo1989/crearcitamedica:1.0


 