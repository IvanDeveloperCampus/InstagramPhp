<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="src/Assets/css/styleProfile.css">
</head>

<body>


    <?php
    $user = $this->data['user'];

    require_once("src/views/Layouts/navbar.php");
    ?>

    <header class="mt-5">
        <div class="perfil-container">
            <img class="img-perfil" src="public/img/photos/<?php echo $user->getProfile() ?>" alt="logo-perfil" width="10%">
            <div class="contenedor-cabezera">
                <div class="cabezera1">
                    <h1><?php echo $user->getUsername() ?></h1>
                    <button>Editar perfil</button>
                    <svg aria-label="Opciones" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                        <path clip-rule="evenodd" d="M46.7 20.6l-2.1-1.1c-.4-.2-.7-.5-.8-1-.5-1.6-1.1-3.2-1.9-4.7-.2-.4-.3-.8-.1-1.2l.8-2.3c.2-.5 0-1.1-.4-1.5l-2.9-2.9c-.4-.4-1-.5-1.5-.4l-2.3.8c-.4.1-.8.1-1.2-.1-1.4-.8-3-1.5-4.6-1.9-.4-.1-.8-.4-1-.8l-1.1-2.2c-.3-.5-.8-.8-1.3-.8h-4.1c-.6 0-1.1.3-1.3.8l-1.1 2.2c-.2.4-.5.7-1 .8-1.6.5-3.2 1.1-4.6 1.9-.4.2-.8.3-1.2.1l-2.3-.8c-.5-.2-1.1 0-1.5.4L5.9 8.8c-.4.4-.5 1-.4 1.5l.8 2.3c.1.4.1.8-.1 1.2-.8 1.5-1.5 3-1.9 4.7-.1.4-.4.8-.8 1l-2.1 1.1c-.5.3-.8.8-.8 1.3V26c0 .6.3 1.1.8 1.3l2.1 1.1c.4.2.7.5.8 1 .5 1.6 1.1 3.2 1.9 4.7.2.4.3.8.1 1.2l-.8 2.3c-.2.5 0 1.1.4 1.5L8.8 42c.4.4 1 .5 1.5.4l2.3-.8c.4-.1.8-.1 1.2.1 1.4.8 3 1.5 4.6 1.9.4.1.8.4 1 .8l1.1 2.2c.3.5.8.8 1.3.8h4.1c.6 0 1.1-.3 1.3-.8l1.1-2.2c.2-.4.5-.7 1-.8 1.6-.5 3.2-1.1 4.6-1.9.4-.2.8-.3 1.2-.1l2.3.8c.5.2 1.1 0 1.5-.4l2.9-2.9c.4-.4.5-1 .4-1.5l-.8-2.3c-.1-.4-.1-.8.1-1.2.8-1.5 1.5-3 1.9-4.7.1-.4.4-.8.8-1l2.1-1.1c.5-.3.8-.8.8-1.3v-4.1c.4-.5.1-1.1-.4-1.3zM24 41.5c-9.7 0-17.5-7.8-17.5-17.5S14.3 6.5 24 6.5 41.5 14.3 41.5 24 33.7 41.5 24 41.5z" fill-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="cabezera2">
                    <p><b>16</b> publicaciones</p>
                    <p><b>395</b> seguidores</p>
                    <p><b>619</b> seguidos</p>
                </div>
                <div class="cabezera3">
                    <!--informacion del perfil-->
                </div>
            </div>
        </div>

        <div class="historias">

        </div>
    </header>
    <main>
        <div class="linea"></div>
        <div class="main-nav">
            <a href="#">
                PUBLICACIONES
            </a>
            <a href="#">
                IGTV
            </a>
            <a href="#">
                GUARDADAS
            </a>
            <a href="#">
                ETIQUETADAS
            </a>
        </div>
        <div class="mainCont__grid">
            <?php
            foreach ($user->getPosts() as $p) { ?>
                <img src="public/img/photos/<?php echo $p->getImage() ?>" width="100%" />
            <?php } ?>
        </div>
    </main>



</body>

</html>