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

- `php artisan migrate:reset` elimina todas las bases de datos creadas hasta ahora

### Modificar valores de las tablas

- En caso ya tengas datos puedes añadir `php artisan make:migration add_$columna_to_$tabla_table` y se crea un nuevo archivo donde puedes añadir la columna, **importante**, recuerda  que sea _nullable_

- El archivo de migración quedaría algo así: 
    - `Schema::table('users', function (Blueprint $table) {`
`$table->string('avatar')->nullable()->after('email'); });`
- Para aplicar down sería algo así:
    - `Schema::table('users', function (Blueprint $table) {`
      `$table->dropColumn('avatar');`
       ` });`

- para modificar valores en las tablas por ejemplo que una columna x acepte solo 50 valores en vez de 255 primero debemos de poner `composer require doctrine/dbal` 
    * luego creamos una migración por ejemplo `php artisan make:migration cambiar_propiedades_to_user_table` y luego vas a la migración y pones 
    `Schema::table('users', function (Blueprint $table) {
            $table -> string('name', 250)-> nullable(false)-> change();
        });`
    
        *para regresarlo es misma función pero con la cantidad original* `$table -> string('name', 50)-> change();` 
## Modelos
- utilizan *eloquent* lo que trata a las consultas mysql como objetos y para ello crea modelos que son los administradores `php artisan make model` 
    - _Si creas un modelo llamado User lo que entiene es que administra la tabla users_

### Tinker
- para iniciar `php artisan tinker`
- para salir `exit`

#### Uso
- El objetivo es añadir algo en la base de datos sin usas instancias sql este es un ejemplo 
`use  App\Models\Curso;` _poner el name space_           
`$curso = new Curso;` _instanciar el modelo_    
**añadimos las características**    
`$curso -> name = 'Laravel';` _añadir todas_           
`$curso` _con esto se ven sus características_                                       
`$curso->save();` _se manda a base de datos_               
- **Nota** como estamos trabajando como sifueran objetos si quieres cambiar un valor por ejemplo de curso lo haces igual  `$curso -> name = 'Laravel'` y luego lo guardas, si quieres crear otra entrada debes instanciar otra vez la clase 

#### Consultas 
- Para hacer una consulta es necesario poner por ejemplo `use App\Models\Curso;`
    - y luego `$curso = Curso::all();` para recuperar todos
    - o `$curso = Curso::where('categoria', 'Diseño Web')-> get();` para filtrar por un valor
    - para ordenar  `$curso = Curso::where('categoria', 'Diseño Web')-> orderBy('id', 'desc') -> get();` 
    - para obtener el primero `$curso = Curso::where('categoria', 'Diseño Web')-> orderBy('id', 'desc') -> first();` 
    - para solo obtener ciertos valores `$curso = Curso::select('name', 'description')->get();` 
        - para cambiar el nombre de un valor en el resultado de la consulta `$curso = Curso::select('name as title', 'description')->get();`
    -Para controlar la cantidad de registros que devuelve `$curso = Curso::select('name', 'description')->take(3)-> get();`
    - **Para encontrar por id específico hay una forma PRESTABLECIDA** `$curso = Curso::find(5);`

##### Consultas Complejas
    -Para por ejemplo hacer una consulta donde el id sea mayor a 45 sería:

    $curso = Curso::where('id', '>', 45)->get(); 

    - Para ver si contiene una palabra en específico sería:

    $curso = Curso::where('name', 'like', '%voluptate%')->get(); 

## Seeder 
- para probarlo es igual que thinker pero en la carpeta DataBaseSeeder y para ejecutarlo es `php artisan db:seed` pero es poco práctico entonces los hacemos en arhivos separaros por ejemplo
    - `php artisan make:seeder Curso_Seeder`
- Para limpiar todo y ejecutar las seeds poner `php artisan migrate:fresh --seed` o `php artisan migrate --seed`

## Factory
- te llena por lote con valores falsos, para crear un factory es por ejemplo `php artisan make:factory CursoFactory --model=Curso` 

## Rutas
- si usas paginate tienes que poner `?page=2` para cargar los siguientes registros 