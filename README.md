# Archivos proporcionados en el examen

- `autoloader.php`
- `.htaccess`
- Función `dispatch`
- `Dockerfile` y `docker-compose.yml`

## Temas a evaluar

- #1 Crear la estructura de carpetas MVC
- #2 Configurar el metodo dispatch que nos proporcionan

- #3 cramos el controlador dentro del controlador creamos la clase y dentro una funcion de vista, luego empezamos a crear funciones para que nos dirija nuestras vistas.

- #4 Agregamos a public agregamos los archivos de autoloader y web.

- #5 configuramos las posibles rutas en el archivo web.php

Nota #2: Agregamos el namespace lib, Definimos la clase Route,  creamos un arreglo de rutas "routes" y definivos la URL base privadas y estaticas. y luego definimos funciones para controlar las rutas get y post usamos self para que no dependa de un objeto si no de la clase en si misma

Nota #3 creamos el controlador le colocamos su name space y creamos la clase del controlador y le agregamos una funcion de vista que recibe dos parametros el nombre del archivo dentro de la carpeta view, y otro arreglo de datos que se le pasa a view. 

    ### Funcionamiento de la función `view`

    La función `view` recibe dos parámetros: el nombre de la vista y un arreglo de datos. Su funcionamiento es el siguiente:

    1. Utiliza la función `extract()` para convertir cada elemento del arreglo de datos en una variable (la clave se convierte en el nombre de la variable y el valor en su contenido).
    2. Verifica si el archivo de la vista existe en el directorio correspondiente usando `file_exists()`.
    3. Si el archivo existe:
        - Inicia el almacenamiento en búfer de salida con `ob_start()`.
        - Incluye el archivo de la vista.
        - Retorna el contenido generado usando `ob_get_clean()`.
    Este proceso permite renderizar la vista y pasarle datos de manera dinámica.

creamos una funciona con para que nos retorne la vista qeu tenemso en la carpeta de view.


Nota #4: Usamos el metodo require_once para cargar estos dos archivos y hacerlos de acceso publico al navegador es lo primero que se va a cargar.


Nota #5: Usamos las dos clases creadas previamente qu eserian: Route, Index controller con (use) name space agregado y la clase, luego usando la clase Route creo las rutas con sus metodos respectivos Route::get() get o post reciben dos parametros la $uri seria la ruta del navegador, y el metodo o funcion del controlador que usariamos callback = [IndexControlelr::class,"Index"], finalmente agregamos el metodo dispatch al final

