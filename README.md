# Api Smart
Esta api Rest esta desarrollada en la Version 10 de laravel permite desde el registro de usuario y autenticacion hasta registro de categorias y Productos

## Requisitos para ejecutar de forma correcta 
- Php 8.1 >
- composer
- laravel 10
- MySQL, Postgres, SQLite en mi caso use postgres

## Instalaciones

- Clonar el proyecto desde GitHub `git clone https://github.com/edercabezas/api-smart.git`
- Ingresar a la carpeta del proyecto `cd api-smart`
- Composer es el manejador de paquetes de php para instalar als dependencias `composer install`
- Cambiar el nombre  de `env.example a .env` el punto siempre debe estar es donde estan las variables de entorno y configuracion de la base de datos 
- este comando es apra generar una nueva llave `php artisan key:generate`
- Este comando es para generar todas las migracios primero asegurate de crear la base de datos sea en `Mysql, postgres etc`,  y configura las credenciales en el .env y por ultimo corre el comando este te generara las tablas `php artisan migrate`
- Correr el proyecto en local `php artisan serve`

## Funcionalidades Usuario
- registo de usuarios. POST `http://localhost:8000/api/register`
{
  "name": "Admin Cortes",
  "email": "admin@example.com",
  "password": "password123",
  "password_confirmation": "password123",
  "admin": "admin"
}
{
  "name": "User Cortes",
  "email": "user@example.com",
  "password": "password123",
  "password_confirmation": "password123",
  "admin": "user"
}

- Autenticacion de usuarios y obtencion de token del usuario. POST `http://localhost:8000/api/login`
{
  "email": "pedro@example.com",
  "password": "password123"
}
- Cierre de Sesión. POST `http://localhost:8000/api/logout`

{
    Authorization: Bearer 3|3uFZ0VxTa4cWYZHE9vMSLWdtbooEzYP6hhMuP1loa6901f2d `Token de usuario autenticado cada vez que se autentique kenera nuevo token`
} 

## Funcionalidad de categoria
- Registro de nueva categoria (Admin). POST `http://localhost:8000/api/categories`
 header {
        Authorization: Bearer 9|FXCcYCjRdGORD8ZPcFy9uEZeMToME8VMQ6nDbSlR6db6883f
    }

    body {
        "name": "Harinas",
        "description": "Productos cereales"
    }

- Listado de caetgorias. GET `http://localhost:8000/api/categories`
    header{
    Authorization: Bearer 9|FXCcYCjRdGORD8ZPcFy9uEZeMToME8VMQ6nDbSlR6db6883f
    }

- Listar unica categoria. GET `http://localhost:8000/api/categories/1`
   header{
    Authorization: Bearer 9|FXCcYCjRdGORD8ZPcFy9uEZeMToME8VMQ6nDbSlR6db6883f
    }

- Actualizar Categoria (Admin). PUT `http://localhost:8000/api/categories/1`
  header{
    Authorization: Bearer 9|FXCcYCjRdGORD8ZPcFy9uEZeMToME8VMQ6nDbSlR6db6883f
    }

body {
    "name": "Lacteos",
    "description": "Yogur, Leche"
}
- Eliminar Categoria  (Admin). DELTE `http://localhost:8000/api/categories/1`

  header{
    Authorization: Bearer 9|FXCcYCjRdGORD8ZPcFy9uEZeMToME8VMQ6nDbSlR6db6883f
    }

## Funcionalidad de productos
- Rehgistro de nuevo producto asociando la categoria (Admin). POST `http://localhost:8000/api/products`
  header{
    Authorization: Bearer 9|FXCcYCjRdGORD8ZPcFy9uEZeMToME8VMQ6nDbSlR6db6883f
    }

    body {
    "category_id": 3,
    "name": "Arroz",
    "description": "Arroz y granos",
    "price": 2500,
    "stock": 300
}

- Listado de Productos. GET `http://localhost:8000/api/products`
  header{
    Authorization: Bearer 9|FXCcYCjRdGORD8ZPcFy9uEZeMToME8VMQ6nDbSlR6db6883f
    }

- Listadod e un unico producto. GET `http://localhost:8000/api/products/3`
  header{
    Authorization: Bearer 9|FXCcYCjRdGORD8ZPcFy9uEZeMToME8VMQ6nDbSlR6db6883f
    }

- Actualizar producto (Admin). PUT `http://localhost:8000/api/products/3`
  header{
    Authorization: Bearer 9|FXCcYCjRdGORD8ZPcFy9uEZeMToME8VMQ6nDbSlR6db6883f
    }
    body {
    "category_id": 3,
    "name": "Frutas",
    "description": "Arroz y granos",
    "price": 2500,
    "stock": 300
}
- Eliminar producto (Admin). DELTE `http://localhost:8000/api/products/3`
  header{
    Authorization: Bearer 9|FXCcYCjRdGORD8ZPcFy9uEZeMToME8VMQ6nDbSlR6db6883f
    }
    
## Nota 
- Debe tener en cuenta que se debe enviar el token de el usuario autenticado en cada peticion igualmente le adjuntare la colección de cada una de las apis desde postman

## Controladores HTTP/Controller/Api/V1/
- CategoryController `Todo relacionado con categorias`
- ProductController `Todo relacionado con productos`
- UsersController `Todo relacionado con el Usuario`

## Modelos Models/
- Category `Modelo y atributos de solod e categorias`
- Product `Modelo relacionado a producto y sus atributos`
- User `Relacionado con usuario`

## Tablas database/migrations
- Estan todas las tablas relacionada con el proyecto es necesario ejecutar `php artisan migrate` para que se creen las tablas automaticamente

## apis routes/api_v1.php
- En este archivo estan las apis las cuales podemos comunicarnos desde el exterior para realizar alguna peticion tenga encuenta que para crear, editar o eliminar debe tener rol de administrador

##  Colección de Postman local
- se encuentra en la raiz del proyecto `Smart Apis.postman_collection.json`
http://localhost:8000/api/register

http://localhost:8000/api/->endpoint
ejemplo
http://localhost:8000/api/register





##  Colección de Postman Servidor
- se encuentra en la raiz del proyecto `Smart Apis_Servidor.postman_collection.json`

api.divideya.com/public/api/->endpoint
ejemplo
api.divideya.com/public/api/register



## Importacion de la colección d eApis
- abres postman 
- la izquierda hay un boton que se llama Importar selecciona
- se abre una nueva ventana seleccionas file 
- buscas el archivo de las apis 
- seleccionar y te carga los endpoint


