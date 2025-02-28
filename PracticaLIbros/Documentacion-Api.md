# Documentación API Libros

## LIBROS
### obtenerLibros
- Ruta: **api/libros**
- Método: **get**
- Parámetros: ninguno
- Respuesta: **JSON con todos los libros almacenados con sus autores y genero**
### libroId
- Ruta: **api/libros/{id}**
- Método: **get**
- Parámetros: **ID del libro que queremos consumir**
- Respuesta: **JSON con todos los libros almacenados con sus autores y genero**
### crearLibro
- Ruta: **api/libros**
- Método: **post**
- Parámetros: **Un JSON con los datos del libro**
    ```json
    {
    "titulo": "Required|string",
    "descripcion": "string",
    "imagen": "Opcional",
    "autor_id": "Required|numeric",
    "genero_id": "Required|numeric"
    }
    ```
- Respuesta: **JSON con un mensaje de éxito y el libro creado**
### actualizarLibro
- Ruta: **api/libros/{id}**
- Método: **put**
- Parámetros: **ID del libro que queremos consumir y un JSON con los datos del libro**
- Respuesta: **JSON con un mensaje de éxito**
### eliminarLibro
- Ruta: **api/libros/{id}**
- Método: **delete**
- Parámetros: **ID del libro que queremos eliminar**
- Respuesta: **JSON con el mensaje de ok**
 
## AUTORES
### obtenerAutores
- Ruta: **api/autores**
- Método: **get**
- Parámetros: ninguno
- Respuesta: **JSON con todos los autores almacenados**
### obtenerAutor
- Ruta: **api/autores/{id}**
- Método: **get**
- Parámetros: **ID del autor que queremos consumir**
- Respuesta: **JSON del autor con todos los libros almacenados**
### crearAutor
- Ruta: **api/autores**
- Método: **post**
- Parámetros: **Un JSON con los datos del autor**
    ```json
    {
    "nombre": "Required"
    }
    ```
- Respuesta: **JSON con un mensaje de éxito y el autor creado**
### actualizarAutor
- Ruta: **api/autores/{id}**
- Método: **put**
- Parámetros: **ID del autor que queremos consumir y un JSON con los datos del autor**
- Respuesta: **JSON con un mensaje de éxito**
### eliminarAutor
- Ruta: **api/autores/{id}**
- Método: **delete**
- Parámetros: **ID del autor que queremos eliminar**
- Respuesta: **JSON con el mensaje de ok**

## GENEROS
### obtenerGeneros
- Ruta: **api/generos**
- Método: **get**
- Parámetros: ninguno
- Respuesta: **JSON con todos los generos almacenados**
### obtenerGenero
- Ruta: **api/generos/{id}**
- Método: **get**
- Parámetros: **ID del genero que queremos consumir**
- Respuesta: **JSON del autor con todos los libros almacenados**
### crearGenero
- Ruta: **api/generos**
- Método: **post**
- Parámetros: **Un JSON con los datos del genero**
    ```json
    {
    "genero": "Required"
    }
    ```
- Respuesta: **JSON con un mensaje de éxito y el generos creado**
### actualizarGenero
- Ruta: **api/generos/{id}**
- Método: **put**
- Parámetros: **ID del genero que queremos consumir y un JSON con los datos del genero**
- Respuesta: **JSON con un mensaje de éxito**
### eliminarGenero
- Ruta: **api/generos/{id}**
- Método: **delete**
- Parámetros: **ID del genero que queremos eliminar**
- Respuesta: **JSON con el mensaje de ok**