<?php
namespace Skylab170\InstagramPhp\lib;


class UtilImages{

    public static function storeImage($photo):string{

        $target_dir = "public/img/photos/"; //RUTA DONDE SE VA ALMACENAR LA FOTO
        $extarr = explode('.',$photo["name"]);
        $filename = $extarr[sizeof($extarr)-2];//GUARDAR EL NOMBRE DEL ARHICVO SIN LA EXTENSION
        $ext = $extarr[sizeof($extarr)-1];//SE GUARDA LA EXTENSION JPG 
        $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext; //SE CREA UN HASH UNICO GENERADO CON LA FECHA Y EL NOMBRE Y A LO ULTIMO SE AGREGA LA EXTENSUION
        $target_file = $target_dir . $hash; //AQUI SE CONCATENA LA RUTA OBJETIVO Y EL HASH
        $uploadOk = 1; //BANDERA
        $check = getimagesize($photo["tmp_name"]);//PARA OBTENER INFORMACION EN EL ARCHIVO TEMPORAL

        //CONDICION PARA VERIFICAR QUE EXISTE UNA IMAGEN
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            return "";
        } else {
            if (move_uploaded_file($photo["tmp_name"], $target_file)) {//MUEVE LA IMGANE DESDE ARCHIVOS TEMPORALES A LA NUEVA RUTA
                return $hash; //RETORNA EL HASH QUE SE GUARDA EN LA BD
            } else {
                return '';
            }
        }
    }

}


?>