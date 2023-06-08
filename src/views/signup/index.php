<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/Assets/css/styleLogin.css">
    <title>Document</title>
</head>
<body>


    <div class="container">
        <div class="center">
            <div class="header">
                <img src="src/assets/img/logo.PNG" alt="instagramLogo" class="instaLogo" />
            </div>
            <form action="register" method="POST" enctype="multipart/form-data">
                <div class="inputElement">
                    
                        <input type="text" placeholder="Username" name="username" class="inputText" />
                        <input type="password" placeholder="Password"  name="password" class="inputText" />
                        <input type="file" name="profile">
                        <input type="submit" value="Log in" class="inputButton" />
                 
                    <div class="line">
                        <span class="arrow"></span>
                        <span class="content">OR</span>
                        <span class="arrow"></span>
                    </div>
                    <div class="social__icon">
                        <i class="fab fa-facebook-square"></i><span>Sign Up with facebook</span>
                    </div>
            
                </div>
            </form>
        </div>
        <div class="footer">
            <p>Do you have a accout?<a href="/InstagramPhp/login">Log In</a></p>
        </div>
    </div>
    
</body>
</html>