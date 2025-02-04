# PracticaUD3
## 1. Descripción del problema 
Una empresa especializada en la organización de eventos desea modernizar su proceso de gestión, centralizando en una única plataforma digital la administración de sus eventos, actividades, inscripciones y recursos. <br>
<br>
<strong>Esta es la solución propuesta:</strong> <br>

La primera solución es implementar un <strong>CRUD</strong>. La aplicación deberá permitir la creación, edición y eliminación de eventos, cada uno de los cuales podrá incluir múltiples actividades o conferencias con horarios y ubicaciones específicas. Además, se gestionarán las inscripciones de los participantes, quienes podrán reservar plazas en distintas actividades mediante un sistema de tickets electrónicos. Cada evento estará asociado a diversos recursos (salas, equipos técnicos, personal) que deberán asignarse de forma óptima.<br>

También se implementarán estas <strong>relaciones entre tablas:</strong> relaciones de tipo 1..N entre eventos y actividades, así como relaciones N..N entre participantes y actividades a través de una tabla intermedia que registre la reserva de tickets y la asistencia. También se implementará una relación 1..1 para la gestión correcta de los detalles de los eventos. Asimismo, se incluirá la funcionalidad para generar reportes estadísticos y análisis de tendencias, lo cual facilitará la planificación y mejora continua de futuros eventos. <br>

Otra solución es la <strong>implementación de una API REST</strong> esto permitirá facilitar la gestión y el acceso a los datos desde distintas aplicaciones o clientes. Centralizar y organizar su información. Reducir errores y datos duplicados. Facilitar la consulta y actualización de la información. Contar con datos confiables para la toma de decisiones. <br>

La solución se desarrollará en Laravel, asegurando una implementación robusta y escalable. <br>

## 2. Modelo E-R
![modelo e-r](1234.png)
## 3. Implementación 
### Estructura y migraciones
Para llevar a cabo el proyecto se han creado las siguientes migraciones:
1. Eventos
2. Actividades
3. Participantes
4. Inscripciones
5. Recursos
6. Evento_recursos
7. Detalle_eventos
### Modelos con Eloquent
Para realizar la práctica se han creado modelos Eloquent. <br>

El modelo de Evento : tiene relación HasMany con Actividad, HasOne con Detalle_evento y belongsToMany con recursos. <br>

El modelo de actividad : tiene relación belongsTo con evento y belongsToMany con Participantes. <br>

El modelo de participante : tiene relación belongsToMany con actividad. <br>

El modelo de recursos : tiene relación belongsToMany con evento. <br>

El modelo de detalle_evento : tiene relación belongsTo con evento. <br>

### Seeders 
Para realizar la carga de datos para hacer pruebas y rellenar así las tablas se han creado archivos como eventoseeder y así para las demás tablas. Con el archivo databaseseeder.php llamas a los demás seeders, asi que al ejecutar en tu terminal <code> php artisan db:seed </code> se te rellenarían las tablas con datos. Para hacer esto primero deben estar creadas las tablas, para ello antes se debe hacer un <code> php artisan migrate </code>.

### Controladores y rutas API 
En el archivo api.php dentro del directorio routes estan establecidas las rutas para manejar un CRUD, para ello también se han tenido que crear controllers que se encuentran en /app/http/controllers. Las rutas disponibles son : (ejemplo con eventos)
1. GET /api/eventos
2. GET /api/eventos/(id)
3. POST /api/eventos
4. PUT /api/eventos/(id)
5. DELETE /api/eventos/(id)

#### Pruebas con Postman
En la raíz del proyecto se encuentra un archivo .json con las pruebas en todos los endpoints del proyecto.
## 4. Way of Working (WoW)
#### Requisitos tecnológicos
1. php >=8.0
2. Composer >=2.0
3. MySql para la base de datos
4. Postman si quieres realizar pruebas
5. Git para el control de versiones
6. Laravel >=10 (Yo he usado una version que es >11.0 pero deberia funcionar a partir del 10.0)

#### Paso a paso para configurar el entorno y la aplicación 

##### 1. Clonar el repositorio de github y navegar al directorio

##### 2. Instalar dependencias
```
composer install
```
##### 3. Copiar y Configurar el archivo .env
```
cp .env.example .env
```
En mi caso al hacer las pruebas de postman me salía un error 500 y lo logré solucionar poniendo una ruta absoluta en DB_DATABASE:
```
DB_DATABASE=C:\Users\Usuario\PracticaUD3\gestion_eventos\database\database.sqlite
```
En tu caso deberás cambiar la ruta si no coincide.
##### 4. Generar la clave de la aplicación
```
php artisan key:generate
```
##### 5. Ejecutar la migración y crear las tablas
```
php artisan migrate
```
##### 6. Rellenar las tablas con los seeders
```
php artisan db:seed
```
##### 7. Iniciar el servidor 
```
php artisan serve
```
Una vez realizado este comando, la aplicacion estará disponible en: http://127.0.0.1:8000



