<?php

namespace Skylab170\InstagramPhp\models;


use Skylab170\InstagramPhp\lib\Model;
use Skylab170\InstagramPhp\lib\Database;
use PDO;
use PDOException;


class User extends Model{

    private int $id;
    private array $posts;
    private string $profile;

    public function __construct(private string $username, private string $password){
        parent::__construct();
        $this->posts=[];
        $this->profile="";
    }

    public function setProfile($profile){
        $this->profile=$profile;
    }

    public function getprofile(){
        return $this->profile;
    }


    public function save(){
        
        try {
            //TODO: validar si exite usurio
            $hash=$this->getHashedPassword($this->password);
            $query=$this->prepare('INSERT INTO users (username, password, profile) VALUES (:username, :password, :profile)');
            $query->execute([
                'username'=>$this->username,
                'password'=>$hash,
                'profile'=>$this->profile
            ]);
            echo "Se guardo User";
        } catch (PDOException $e) {
            //error_log($e->getMessage());
            echo "Error al guadrar" . $e->getMessage();
        }
    }

    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    //VERIFICAR SI EXISTE EL USUARIO
    public static function exits($username){
        try {
            $db=new Database();
            $query=$db->connect()->prepare('SELECT username FROM users WHERE username= :username');
            $query->execute(['username'=>$username]);
            //SI LA CONSULTA OBTIENE UN RESULTADO
            if ($query->rowCount()>0) {
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

  

    public function comparePasswords($current){
        try{
            return password_verify($current, $this->password);
        }catch(PDOException $e){
            return NULL;
        }
    }

    //traer usuario por username
    public static function get ($username){
        try{
            $db=new Database();
            $query=$db->connect()->prepare('SELECT * FROM users WHERE username=:username');
            //se ejecuta la query y le pasamos el parametro
            $query->execute(['username'=>$username]);
            //guardar la informacion en una variable
            $data=$query->fetch(PDO::FETCH_ASSOC);
            $user=new User($data['username'], $data['password']);
            $user->setId($data['user_id']);
            $user->setProfile($data['profile']);
            return $user;

        }catch(PDOException $e){
            error_log($e->getMessage());
            return NULL;
        }
    }

    public function getId():string{
        return $this->id;
    }

    public function setId(string $value){
        $this->id = $value;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPosts(){
        return $this->posts;
    }

    public function setPosts($value){
        $this->posts = $value;
    }

   

}

?>