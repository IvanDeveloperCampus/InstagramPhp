<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Document</title>
    <link rel="stylesheet" href="src/Assets/css/styleProfile.css">
</head>

<body>


    <?php
    $user = $this->data['user'];
    $loggedInUser = unserialize($_SESSION['user']);

    require_once("src/views/Layouts/navbar.php");
    ?>

    <header class="mt-5">
        <div class="container perfil-container">
            <img class="img-perfil" src="public/img/photos/<?php echo $user->getProfile() ?>" alt="logo-perfil" width="10%">
            <div class="contenedor-cabezera">
                <div class="cabezera1">
                    <form action="follow" method="post">
                        <h1><?php echo $user->getUsername() ?></h1>
                        <input type="hidden" name="followed_id" value="<?php echo $user->getId() ?>">
                        <input type="hidden" name="origin" value="<?php echo $user->getUsername() ?>">
                        <?php
                        // Verificar si el perfil es igual al usuario logeado
                        if ($user->getUsername() !== $loggedInUser->getUsername()) {
                        ?>
                            <button class="btn btn-primary seguir">Seguir</button>
                            <button class="sendMessage">Enviar Mensaje</button>
                        <?php
                        }else{?>
                            <button class="sendMessage">Editar perfil</button>
                       <?php }
                        ?>
                        
                        <svg aria-label="Opciones ml-3" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                            <path clip-rule="evenodd" d="M46.7 20.6l-2.1-1.1c-.4-.2-.7-.5-.8-1-.5-1.6-1.1-3.2-1.9-4.7-.2-.4-.3-.8-.1-1.2l.8-2.3c.2-.5 0-1.1-.4-1.5l-2.9-2.9c-.4-.4-1-.5-1.5-.4l-2.3.8c-.4.1-.8.1-1.2-.1-1.4-.8-3-1.5-4.6-1.9-.4-.1-.8-.4-1-.8l-1.1-2.2c-.3-.5-.8-.8-1.3-.8h-4.1c-.6 0-1.1.3-1.3.8l-1.1 2.2c-.2.4-.5.7-1 .8-1.6.5-3.2 1.1-4.6 1.9-.4.2-.8.3-1.2.1l-2.3-.8c-.5-.2-1.1 0-1.5.4L5.9 8.8c-.4.4-.5 1-.4 1.5l.8 2.3c.1.4.1.8-.1 1.2-.8 1.5-1.5 3-1.9 4.7-.1.4-.4.8-.8 1l-2.1 1.1c-.5.3-.8.8-.8 1.3V26c0 .6.3 1.1.8 1.3l2.1 1.1c.4.2.7.5.8 1 .5 1.6 1.1 3.2 1.9 4.7.2.4.3.8.1 1.2l-.8 2.3c-.2.5 0 1.1.4 1.5L8.8 42c.4.4 1 .5 1.5.4l2.3-.8c.4-.1.8-.1 1.2.1 1.4.8 3 1.5 4.6 1.9.4.1.8.4 1 .8l1.1 2.2c.3.5.8.8 1.3.8h4.1c.6 0 1.1-.3 1.3-.8l1.1-2.2c.2-.4.5-.7 1-.8 1.6-.5 3.2-1.1 4.6-1.9.4-.2.8-.3 1.2-.1l2.3.8c.5.2 1.1 0 1.5-.4l2.9-2.9c.4-.4.5-1 .4-1.5l-.8-2.3c-.1-.4-.1-.8.1-1.2.8-1.5 1.5-3 1.9-4.7.1-.4.4-.8.8-1l2.1-1.1c.5-.3.8-.8.8-1.3v-4.1c.4-.5.1-1.1-.4-1.3zM24 41.5c-9.7 0-17.5-7.8-17.5-17.5S14.3 6.5 24 6.5 41.5 14.3 41.5 24 33.7 41.5 24 41.5z" fill-rule="evenodd"></path>
                        </svg>
                    </form>
                </div>
                <div class="cabezera2">
                    <p><b><?php echo $user->countGetPosts() ?></b> publicaciones</p>
                    <a data-bs-toggle="modal" data-bs-target="#myModalFollowers">
                        <p class="seguidores"><b><?php echo $user->countGetFollowers() ?></b> seguidores</p>
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#myModalFollowed">
                        <p class="seguidos"><b><?php echo $user->countGetFollowed() ?></b> seguidos</p>
                    </a>
                </div>
                <div class="cabezera3">
                    <!--informacion del perfil-->
                </div>
            </div>
        </div>

    </header>
    <main class="container">
        <div class="linea"></div>
        <div class="main-nav">
            <a href="#">
                PUBLICACIONES
            </a>
            <a href="#">
                GUARDADAS
            </a>
            <a href="#">
                ETIQUETADAS
            </a>
        </div>
        <div class="container mainCont__grid">
            <?php
            foreach ($user->getPosts() as $p) { ?>
                <img src="public/img/photos/<?php echo $p->getImage() ?>" width="100%" />
            <?php } ?>
        </div>
    </main>


    <!--MODALL-->
    <div class="modal fade" id="myModalFollowers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Followers</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    foreach ($user->getFollowers() as $seguidores) { ?>
                        <p><?php echo $seguidores ?></p>
                    <?php  }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalFollowed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Followers</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    foreach ($user->getFollowed() as $seguidos) { ?>
                        <p><?php echo $seguidos ?></p>
                    <?php  }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("src/views/Layouts/footer.php") ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>