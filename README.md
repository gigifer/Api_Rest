# API de tareas

Esta prueba técnica permite evaluar la aplicación de lo siguiente:
* Creación de API para crear tareas, actualizarlas y listarlas
* Autenticación de usuario
* Token de seguridad de usuario
* Integración con Front-End
* Documentación con Swagger

**Técnologías usadas
*PHP
*Laravel
*Mysql
*Swagger

## Como usar la API:
1. Correr el proyecto iniciando el servidor con
```
php artisan serve
```
2. Iniciar Postman (o algún cliente para probar APIs)
3. La ruta GET para listar las tareas es http://localhost:8000/api/Tareas, en el parámetro Authorization colocar el Bearer token
4. La ruta POST para crear una tarea es http://localhost:8000/api/Tareas, colocar en Authorization el Bearer token y en Body
```json
{
    "nombre": "nombre de la tarea",
    "descripcion": "descripcion de la tarea"
    }
```
5. La ruta PUT para modificar una tarea es http://localhost:8000/api/Tareas/id, colocar en Authorization el Bearer token, el número de id de la tarea a modificar luego de api/Tareas/ en la ruta y en Body solo el campo a modificar ej:
```json
  {
    "nombre": "nombre nuevo de la tarea",
  }
```
6. La ruta POST para registrarse es http://localhost:8000/api/register, colocar en Body
```json
  {
    "name": "nombre",
    "email": "email",
    "password": "contraseña"
  }
  ```
7. La ruta POST para loguearse es http://localhost:8000/api/login, colocar en body
```json
  {
    "email": "email",
    "password": "contraseña"
  }
  ```
  Al enviar los datos retorna el token para utilizar en las anteriores consultas.
