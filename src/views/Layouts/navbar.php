<nav class="navbar">
        <div class="nav-wrapper">
            <img src="src/assets/img/logo.PNG" class="ins-img" alt="">
            <input type="text" class="search-box" placeholder="search">
            <div class="nav-items">
                <img src="src/assets/img/home.PNG" class="icon" alt="">
                <img src="src/assets/img/messenger.PNG" class="icon" alt="">
                <img data-bs-toggle="modal" data-bs-target="#post-add-modal" src="src/assets/img/add.PNG" class="icon" alt="">
                <img src="src/assets/img/explore.PNG" class="icon" alt="">
                <img src="src/assets/img/like.PNG" class="icon" alt="">
                <a class="link-dark" href="/instagramPhp/profile/<?php echo $user->getUsername() ?>">
                    <img class="rounded-circle" src="public/img/photos/<?php echo $user->getProfile() ?>" width="22" />
                </a>

            </div>
        </div>
</nav>