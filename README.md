# AmazonUTN-Inventario
Proyecto de fin de semestre de las materias:
- Ingeniería de Software II
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

Por último abrir el navegador http:\\localhost:8000 o http:\\127.0.0.1:8000


# Comandos git
Configurar el email y el nombre de usuario de la cuenta GitHub
```
git config user.email "email"
git config user.name  "name"

```
Se utiliza solo para agregar datos de cada uno, sin bajar de otro respitorio de otro compañero
Para agregar todos los archivos
```
git add .
```
Guardar el commit o cambios del proyecto con un mensaje de descripción
```
git commit -m "su mensaje"
```

Subir al repositorio virtual 'AmazonUTN-Inventario'
```
git push origin master
```
# Comandos git frecuentes y recomendados

Para subir los cambios realizados en el proyecto. Primero se debe bajar los cambios del repositorio del GITHUB, con el comando
```
git pull origin master
```

Agregar los archivos creados y cambios personales 
```
git add .
```

Guardar el commit o cambios del proyecto con un mensaje de descripción y se combina con los cambios bajados del repositorio de GITHUB
```
git commit -m "su mensaje"
```

Subir al repositorio virtual 'AmazonUTN-Inventario'
```
git push origin master
```

## Librerías
Instalar la librería de formularios
```
composer require laravelcollective/html
```
Instalar Entrust :                                                                                                        
Primera alternativa:
```
composer require zizaco/entrust
```
segunda alternativa:
```
composer update
```

## Creación de la Base de Datos
Configurar el archivo .env
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=modulo_inventario
DB_USERNAME=postgres
DB_PASSWORD=********
```
Crear la base de datos en PostgreSQL con el nombre "modulo_inventario"

Luego creo las tablas con el siguiente comando
```
php artisan migrate
```

Si la consola regresa el mensaje `Nothing to migrate.` borrar todas las tablas y crear de nuevo con el comando
```
php artisan migrate:fresh
```

## Creación del usuario admin
Para iniciar sesión es necesario crear un nuevo usuario a través de Tinker
```
php artisan tinker
```

En la consola del Tinker crear el nuevo usuario
```
$user = new \App\User();
$user->usu_nombre = 'admin';
$user->usu_apellido = 'cordova';
$user->usu_fechaN = '1999/01/01';
$user->usu_direccion = 'direccion';
$user->usu_telefono = '0912345678';
$user->usu_celular = '0912345678';
$user->usu_email = 'admin@hotmail.com';
$user->usu_password = \Illuminate\Support\Facades\Hash::make('12345678');
$user->save();
```
## Creación de Roles
```
$admin = new \App\Role();
$admin->rol_name         = 'administrador';
$admin->rol_display_name = 'Administrador'; 
$admin->rol_description  = 'Administrador del sistema de inventario'; 
$admin->save();

$bodeguero = new \App\Role();
$bodeguero->rol_name         = 'bodeguero';
$bodeguero->rol_display_name = 'Bodeguero';
$bodeguero->rol_description  = 'Usuario bodeguero del sistema de inventario'; 
$bodeguero->save();

```





