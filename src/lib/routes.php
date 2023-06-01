<?php


use Skylab170\InstagramPhp\controllers\Login;
use Skylab170\InstagramPhp\controllers\Signup;
use Skylab170\InstagramPhp\controllers\Home;

use Skylab170\InstagramPhp\lib\Database;

$router=new \Bramus\Router\Router();//permite utilizar las funcionalidades de enrutamiento proporcionadas 
session_start();//inicia sesion
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config/');
//$dotenv->load();

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
    $controller=new Login;
    $controller->render('login/index');
});
$router->post('/auth', function(){
    $controller=new Login;
    $controller->auth();
    
});
$router->get('/signup', function(){
    $controller=new Signup;
    $controller->render('signup/index');

});
$router->post('/register', function(){
   $controller=new Signup;
    $controller->register();
});
$router->get('/home', function(){
    $user=unserialize($_SESSION['user']);
    $controller=new Home($user);
    $controller->index();
});
$router->post('/publish', function(){
    $user=unserialize($_SESSION['user']);
    $controller=new Home($user);
    $controller->store();
});
$router->get('/profile', function(){
    echo "Mi segunda ruta";
});
$router->post('/addLike', function(){
    echo "Mi segunda ruta";
});
$router->get('/signout', function(){
    echo "Mi segunda ruta";
});
$router->get('/profile/{username}', function($username){
    echo "Mi segunda ruta";
});

$router->run();//activar el enrutador

?>