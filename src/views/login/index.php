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
            <form action="auth" method="POST">
                <div class="inputElement">
                    
                        <input type="text" placeholder="Username" name="username" class="inputText" />
                        <input type="password" placeholder="Password"  name="password" class="inputText" />
                        <input type="submit" value="Log in" class="inputButton" />
                 
                    <div class="line">
                        <span class="arrow"></span>
                        <span class="content">OR</span>
                        <span class="arrow"></span>
                    </div>
                    <div class="social__icon">
                        <i class="fab fa-facebook-square"></i><span>Log in with facebook</span>
                    </div>
                    <div class="forgetPassword">Forget Password?</div>
                </div>
            </form>
        </div>
        <div class="footer">
            <p>Don't have a accout?<a href="/InstagramPhp/signup">Sign Up</a></p>
        </div>
    </div>

</body>

</html>