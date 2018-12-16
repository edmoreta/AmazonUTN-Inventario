# AmazonUTN-Inventario
Proyecto de fin de semestre de las materias:
- Ingenieria de Software II
- Aplicaciones Informáticas I

# Instalación
Para instalar el proyecto en su máquina, descargue o clone el repositorio.

```
git clone https://github.com/MrSoundMaurix/AmazonUTN-Inventario.git
```

Una vez descargado, a través de consola acceder a la carpeta del proyecto

```
cd AmazonUTN-Inventario
```

Y proceder a instalar todas las dependencias del proyecto
```
composer install
```

Luego generar el archivo de configuración `.env`
```
cp .env.example .env        //GNU / Linux Distributions
copy .env.example .env      //Windows
```

La aplicación necesita una llave de cifrado que se obtiene con el comando
```
php artisan key:generate
```

Por si acaso
```
php artisan cache:clear
php artisan config:cache
```

Para visualizar el proyecto en un navegador, iniciar el servidor web de PHP
```
php artisan serve
```

Por último abrir el navegador [http:\\localhost:8000] o [http:\\127.0.0.1:8000]


# Comandos git

- git add .    -->Agrega todos los archivos

- git commit -m "su mensaje"  -----> guarda el commit o cambios del proyecto con el mensaje

- git push origin master   ----> le sube al repositorio virtual nuestro


- ---Para subir los cambios de tu proyecto debe ----------
- Verificar que los cambios se han subido y evitar conflictos, primero se manda el comando
- git pull origin master

- Para se manda el comando de nuevo para que se agrege los cambios suyos y el del compañero
- git add .    -->Agrega todos los archivos

- git commit -m "su mensaje"  -----> guarda el commit o cambios del proyecto con el mensaje

- git push origin master   ----> le sube al repositorio virtual nuestro


