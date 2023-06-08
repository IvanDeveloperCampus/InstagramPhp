<?php


use Skylab170\InstagramPhp\controllers\Login;
use Skylab170\InstagramPhp\controllers\Signup;
use Skylab170\InstagramPhp\controllers\Home;
use Skylab170\InstagramPhp\controllers\Actions;
use Skylab170\InstagramPhp\controllers\Profile;
use Skylab170\InstagramPhp\lib\Database;

$router=new \Bramus\Router\Router();//permite utilizar las funcionalidades de enrutamiento proporcionadas 
session_start();//inicia sesion
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config/');
//$dotenv->load();

function notAuth(){
    if (!isset($_SESSION['user'])) {
        header('location: /instagramPhp/login');
        exit();
    }
}

function auth(){
    if (isset($_SESSION['user'])) {
        header('location: /instagramPhp/home');
        exit();
    }
}

$router->get('/', function(){
    $database = new Database();
    
    try {
        $pdo = $database->connect();
        $stmt = $pdo->query("SELECT DATABASE()");
        $databaseName = $stmt->fetchColumn();
        var_dump($databaseName);
        if ($databaseName === false) {
            echo "No se pudo obtener el nombre de la base de datos.";
        } else {
            echo "Conexión exitosa a la base de datos: " . $databaseName;
        }
        //echo "Conexión exitosa a la base de datos: " . $databaseName;
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
        var_dump($e);
    }
});

$router->get('/login', function(){
    auth();
    $controller=new Login;
    $controller->render('login/index');
});
$router->post('/auth', function(){
    auth();
    $controller=new Login;
    $controller->auth();
    
});
$router->get('/signup', function(){
    auth();
    $controller=new Signup;
    $controller->render('signup/index');

});
$router->post('/register', function(){
    auth();
   $controller=new Signup;
    $controller->register();
});
$router->get('/home', function(){
    notAuth();
    $user=unserialize($_SESSION['user']);
    $controller=new Home($user);
    $controller->index();
});
$router->post('/publish', function(){
    notAuth();
    $user=unserialize($_SESSION['user']);
    $controller=new Home($user);
    $controller->store();
});

$router->post('/addLike', function(){
    notAuth();
    $user=unserialize($_SESSION['user']);
    $controller=new Actions($user);
    $controller->like();
});

$router->post('/addComment', function(){
    notAuth();
    $user=unserialize($_SESSION['user']);
    $controller=new Actions($user);
    $controller->comment();
});

$router->post('/follow', function(){
    notAuth();
    $user=unserialize($_SESSION['user']);
    $controller=new Actions($user);
    $controller->follow();
});

$router->get('/signout', function(){
    notAuth();
    unset($_SESSION['user']);
    header('location: /InstagramPhp/login');
});
$router->get('/{username}', function($username){
    notAuth();
    $controller=new Profile();
    $controller->getUsernameProfile($username);
});



$router->run();//activar el enrutador

?>