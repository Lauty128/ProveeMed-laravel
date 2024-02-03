# Configuración

Para poder configurar correctamente el repositorio y comenzar a trabajar en local con el mismo debes seguir los pasos descritos a continuación:   

#### Instalar dependencias
Primero debes abrir la terminal en la carpeta del repositorio e instalar las dependencias de composer con el siguiente comando:
```powershell
composer install
```

#### Configurar archivo .env
Debes crear un archivo .env y pegar lo siguiente
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:GnJkwzyfiH6eOml7zr9d//l4exZ6NC1YCvgFxZyqJls=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={db-name}
DB_USERNAME={db-user}
DB_PASSWORD={db-password}

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=d299ebe2366ef1
MAIL_PASSWORD=e5577873fd012a
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
Debes cambiar los siguientes campos con los datos correspondientes:
* {db-name}: Nombre de la base de datos
* {db-user}: Usuario que tiene acceso a la base de datos
* {db-password}: Contraseña de usuario

> [!NOTE]
> La base de datos debe estar creada, en mysql o el sistema de bases de datos que utilices, para que las migraciones funcionen correctamente


#### Agregar las tablas a la base de datos
Para estructurar la base de datos debes abrir nuevamente la terminal en la carpeta del repositorio y ejecutar el siguiente comando:
```powershell
php artisan migrate
```
Con esto ya tendrás la base de datos configurada y lista para trabajar.   

Si quieres cargar datos de prueba, los cuales ya están configurados para cargar, debes ejecutar lo siguiente:
```powershell
php artisan db:seed
```