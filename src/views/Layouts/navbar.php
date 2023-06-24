<nav class="navbar">
    <div class="nav-wrapper">
        <img src="src/assets/img/logo.PNG" class="ins-img" alt="">
        <form  action="search" method="POST">
            <input type="text" name="username" class="search-box" placeholder="search">
        </form>
        <div class="nav-items">
            <img src="src/assets/img/home.PNG" class="icon" alt="">
            <img src="src/assets/img/messenger.PNG" class="icon" alt="">
            <img data-bs-toggle="modal" data-bs-target="#post-add-modal" src="src/assets/img/add.PNG" class="icon" alt="">
            <img src="src/assets/img/explore.PNG" class="icon" alt="">
            <img src="src/assets/img/like.PNG" class="icon" alt="">
            <a class="link-dark" href="/instagramPhp/<?php echo $user->getUsername() ?>">
                <img class="rounded-circle" src="public/img/photos/<?php echo $user->getProfile() ?>" width="22" />
            </a>

        </div>
    </div>
</nav>

<style>
    /* Navbar Start */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 50px;
        background: #fff;
        border-bottom: 1px solid #dfdfdf;
        display: flex;
        justify-content: center;
        padding: 5px 0;
    }

    .nav-wrapper {
        width: 70%;
        max-width: 1344px;
        height: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .ins-img {
        height: 100%;
        margin-top: 7px;
        margin-left: 200px;
    }

    .search-box {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        height: 25px;
        background: #fafafa;
        border: 1px solid #dfdfdf;
        border-radius: 2px;
        color: rgba(0, 0, 0, 0.5);
        text-align: center;
        text-transform: capitalize;
        margin-top: -5px;
    }

    .search-box::placeholder {
        color: rgba(0, 0, 0, 0.5);
    }

    .nav-items {
        height: 22px;
        position: relative;
        margin-right: -65px;
    }

    .icon {
        height: 100%;
        cursor: pointer;
        margin: -7px 10px;
        display: inline-block;
    }

    @media screen and (max-width: 576px) {

        .nav-items {
            display: none;
        }

        .search-box {
            display: none;
        }

        .ins-img {
            margin-left: -50px;
        }
    }

    /* Navbar End */
</style>