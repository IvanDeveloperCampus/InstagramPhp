<footer>
    <div class="footer">
        <img src="src/Assets/img/home.PNG" class="icon" alt="">
        <img src="src/Assets/img/explore.PNG" class="icon" alt="">
        <img src="src/Assets/img/add.PNG" class="icon" alt="">
        <a class="link-dark" href="/instagramPhp/<?php echo $user->getUsername() ?>">
                    <img class="rounded-circle" src="public/img/photos/<?php echo $user->getProfile() ?>" width="22" />
        </a>
    </div>
</footer>

<style>
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #fff;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px 0;
        border-top: 1px solid #dfdfdf;
    }

    .footer {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }



    .footer img {
        width: 30px;

    }





    @media only screen and (min-width: 768px) {

        footer {
            display: none;
        }
    }
</style>