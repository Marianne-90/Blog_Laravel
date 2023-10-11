# Notas del tutorial 

En este tutorial, aprenderás los conceptos básicos de Laravel y cómo configurar un proyecto. Asegúrate de seguir estos pasos para comenzar con éxito.

## Acceso a la carpeta 'public'
En Laravel, el usuario solo puede acceder a lo que se encuentra en la carpeta 'public'. Asegúrate de alojar tus archivos públicos y recursos aquí.

## Definición de Rutas

En el archivo 'routes/web.php', se definen las rutas globales de tu proyecto. Este es el punto de entrada para definir las rutas de tu aplicación.

## Patrón de Diseño MVC

Laravel utiliza el patrón de diseño Modelo-Vista-Controlador (MVC). Esto significa que la lógica de tu aplicación se separa de la presentación (vistas). Asegúrate de seguir este patrón para mantener tu código organizado.

## Migraciones de Base de Datos
Laravel facilita la administración de bases de datos. Para crear todas las tablas definidas en las migraciones, ejecuta el siguiente comando:

`php artisan migrate`

Eliminar el último lote de migraciones:

`php artisan migrate:rollback`

- Por convención si escribes esto `php artisan make:migration create_$nombreTabla_table` te crea el archivo ya con el Schema y con el down además de tener el nombre de la tabla

- `php artisan migrate:fresh` elimina **todas** las tablas y las vuelve a crear, mucho cuidado porque **ELIMINA TODO**,  si no hay datos puede servir para añadir una columna  

### Modificar valores de las tablas

- En caso ya tengas datos puedes añadir `php artisan make:migration add_$columna_to_$tabla_table` y se crea un nuevo archivo donde puedes añadir la columna, **importante**, recuerda  que sea _nullable_

- para modificar valores en las tablas por ejemplo que una columna x acepte solo 50 valores en vez de 255 primero debemos de poner `composer require doctrine/dbal` 
    * luego creamos una migración por ejemplo `php artisan make:migration cambiar_propiedades_to_user_table` y luego vas a la migración y pones 
    `Schema::table('users', function (Blueprint $table) {
            $table -> string('name', 250)-> nullable(false)-> change();
        });`
    
        _ para regresarlo es misma función pero con la cantidad original `$table -> string('name', 50)-> change();` _ 