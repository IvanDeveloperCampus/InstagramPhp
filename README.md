# Proyecto Clon de Instagram



Este proyecto es un clon de Instagram que cuenta con diversas funcionalidades para registrar y autenticar usuarios, subir publicaciones, interactuar con publicaciones de otros usuarios (dar like y comentar), ver perfiles, seguir y ser seguido por otros usuarios. El proyecto ha sido desarrollado utilizando PHP 8 con enfoque en programación orientada a objetos y ha hecho uso del paquete "Bramus Router" para manejar las rutas de la aplicación. Además, se ha utilizado MySQL como base de datos para almacenar la información relevante de los usuarios y las publicaciones.



### Características Clave

- **Registro y Autenticación**: Los usuarios pueden registrarse en la plataforma utilizando un correo electrónico y una contraseña. Asimismo, pueden iniciar sesión con sus credenciales registradas para acceder a sus cuentas.

- **Subir Publicaciones**: Los usuarios pueden compartir imágenes y texto en sus perfiles, permitiéndoles compartir sus momentos con otros.

- **Interacción Social**: Los usuarios pueden dar "like" y comentar las publicaciones de otros usuarios, lo que fomenta la interacción y la comunidad en la plataforma.

- **Perfiles de Usuarios**: Cada usuario tiene su propio perfil, donde se muestran sus publicaciones, seguidores y a quiénes sigue.

- **Explorar Perfiles**: Los usuarios pueden visitar los perfiles de otros usuarios para ver sus publicaciones y obtener más información sobre ellos.

  

### Tecnologías Utilizadas

- **PHP 8**: El lenguaje de programación principal utilizado para el desarrollo del proyecto.

- **Composer**: Se ha utilizado Composer para gestionar las dependencias del proyecto, en particular, el paquete "Bramus Router" para manejar las rutas de la aplicación.

- **Bramus Router**: Una librería que simplifica el enrutamiento en aplicaciones PHP, utilizada para definir y manejar las diferentes rutas del proyecto.

- **MySQL**: La base de datos utilizada para almacenar la información de los usuarios y las publicaciones.

- **Programación Orientada a Objetos (POO)**: El proyecto ha sido diseñado siguiendo los principios de la POO para crear código modular, reutilizable y fácil de mantener.

  

### Instalación

1. Clona este repositorio en tu máquina local utilizando el siguiente comando:

```
git clone https://github.com/IvanDeveloperCampus/InstagramPhp.git
```

2. Navega hacia el directorio del proyecto:

```
cd InstagramPhp
```

3. Utiliza Composer para instalar las dependencias:

```
composer install
```

4. Configura los datos de conexión a la base de datos en el archivo `config/Constants.php`.

5. Importa el archivo `database.sql` en tu servidor MySQL para crear la base de datos y las tablas necesarias.

6. Abre tu navegador y visita [http://localhost:8000](http://localhost:8000/) para acceder al clon de Instagram.
