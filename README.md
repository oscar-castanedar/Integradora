# Implementar el proyecto localmente
Los pasos para implementar este proyecto localmente son:

## Pasos
Instalando dependencias:
- Lo primero que debes hacer luego de descargar un proyecto existente a tu maquina local, es instalar las dependencias del proyecto con Composer. `composer install`
- Archivo de configuración de Laravel: Cada nuevo proyecto con Laravel, por defecto tiene un archivo .env con los datos de configuración necesarios para el mismo, cuando utilizamos un sistema de control de versiones como git, este archivo se excluye del repositorio por medidas de seguridad.`cp .env.example .env`
- Creando un nuevo API key. Por medidas de seguridad cada proyecto de Laravel cuenta con una clave única que se crea en el archivo .env al iniciar el proyecto. En caso de que el desarrollador no te haya proporcionado están información, puedes generar una nueva API key desde la consola usando:`php artisan key:generate`

Listo ya puedes iniciar tu proyecto con el comando:  `php artisan serve`
### Importante!!!!!
Tener en cuenta la configuracion de la base de datos y el envio de los email (en el .env).

