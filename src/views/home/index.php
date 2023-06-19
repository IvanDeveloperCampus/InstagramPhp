<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/Assets/css/styleHome.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>

    <?php
    $user = $this->data['user'];
    //$posts = $this->data['posts'];

     ?>

    <?php require_once("src/views/Layouts/navbar.php") ?>

    <div class="modal fade" id="post-add-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Create Post</h2>
                    <hr>
                    <div class="msg"></div>
                    <form action="publish" method="POST" enctype="multipart/form-data">
                        <textarea name="title" rows="3" placeholder="escribe un pie de foto o video"></textarea>
                        <div>
                            <input type="file" name="image">
                            <button type="submit" class="subirPost">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="container main">
        <?php
        foreach ($user->getPosts() as $p) {

        ?>

            <div class="post">
                <div class="info">
                    <div class="user">
                        <div class="profile-pic">
                            <img src="public/img/photos/<?php echo $p->getUser()->getProfile() ?>" alt="imgPerfil" width="50%">
                        </div>
                        <a class="username" href="/instagramPhp/<?php echo $p->getUser()->getUsername() ?>">
                            <?php echo $p->getUser()->getUsername() ?>
                        </a>
                    </div>
                </div>
                <img src="public/img/photos/<?php echo $p->getImage() ?>" class="post-image" alt="">
                <div class="post-content">
                    <div class="reaction-wrapper">
                        <form action="addLike" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $p->getId() ?>">
                            <input type="hidden" name="origin" value="home">
                            <button type="submit" class="icon-button"><img src="src/assets/img/like.PNG" id="icon-Like" class="icon" alt=""></button>
                            <img src="src/assets/img/comment.PNG" class="icon" alt="">
                            <img src="src/assets/img/send.PNG" class="icon" alt="">
                            <img src="src/assets/img/save.PNG" class="save icon" alt="">
                        </form>
                    </div>
                    <p class="likes"><?php echo $p->getLikes(); ?></p>
                    <p class="description"><span><?php echo $p->getUser()->getUsername() ?></span><?php echo $p->getTitle() ?></p>

                    <?php foreach ($p->getComments() as $c) { ?>
                        <a class="referencia" href="/instagramPhp/<?php echo $c->usernameComment ?>">
                            <p class="comentario"><span><?php echo $c->usernameComment ?></span><?php echo $c->comment ?></p>
                        <?php } ?>
                        </a>
                        <p class="post-time">03/06/2023</p>
                </div>

                <div class="comment-wrapper">
                    <form action="addComment" method="POST">
                        <img src="src/assets/img/smile.PNG" class="icon" alt="">
                        <input type="hidden" name="post_id" value="<?php echo $p->getId() ?>">
                        <input type="hidden" name="origin" value="home">
                        <input type="text" class="comment-box" name="comment" placeholder="Add a comment">
                        <button type="submit" class="comment-btn">Post</button>
                    </form>
                </div>
            </div>


        <?php } ?>
    </section>

    <?php require_once("src/views/Layouts/footer.php") ?>




    <script src="src/Assets/js/Eventos.js"></script>
</body>

</html>