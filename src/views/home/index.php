<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">


        <h2>Home <?php echo $this->data['user']->getUsername(); ?></h2>

        <?php require_once("src/components/create.php") ?>


        <?php
        $user = $this->data['user'];
        $posts = $this->data['posts'];

        foreach ($posts as $p) {
            /* 
            echo $p->getUser()->getUsername() . "<br>";
            echo $p->getUser()->getProfile() . "<br>";
            echo $p->getImage() . "<br>";*/
        ?>

            <div class="card mt-2">
                <div class="card-body">
                    <img class="rounded-circle" src="public/img/photos/<?php echo $p->getUser()->getProfile() ?>" width="32" />
                    <a class="link-dark" href="/instagramPhp/profile/<?php echo $p->getUser()->getUsername() ?>">
                         <?php echo $p->getUser()->getUsername() ?>
                     </a>
                </div>
                <img src="public/img/photos/<?php echo $p->getImage() ?>" width="100%" />
                <div class="card-body">

                    <div class="card-title">
                        <form action="addLike" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $p->getId() ?>">
                            <input type="hidden" name="origin" value="home">
                            <button type="submit" class="btn btn-danger"><?php echo $p->getLikes(); ?> Likes</button>
                        </form>
                    </div>
                    <p class="card-text"><?php echo $p->getTitle() ?></p>
                </div>
            </div>

        <?php } ?>


    </div>

</body>

</html>