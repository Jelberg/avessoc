<?php
/*
$a = wp_mail("elbergjessica@gmail.com", "Ejemplo de la función mail en WP", "Este es un ejemplo del contenido de del mensaje de la funcion wp_mail() de WordPress");

if ($a == true){
    $a= 'SI ES TRUE';
}

if($a == false){
    $a='ES FALSE';
}

echo '<script language="JavaScript"> alert("Se supone que mando correo y devuelve: '.$a.'")</script>';
*/
/**
 * Verifica el login del usuario
 */
function login(){
    if (!empty($_POST['uname']) && !empty($_POST['psw'])){

        global $wpdb;
        $query = "SELECT USER_PSEUDONYM,USER_PRIVILEGE_LEVL, MPERSON_ID FROM USER  WHERE USER_PSEUDONYM = '".$_POST['uname']."' and USER_PASS = '".$_POST['psw']."';";
        //echo '<script>alert("ESTE  ES EL SCRIPT :'.$query.'")</script>';

        $valido = "";
        $privilegio="";
        $id_user="";
        foreach ($wpdb->get_results($query) as $key =>$row){
            $valido =$row->USER_PSEUDONYM;
            $privilegio =$row->USER_PRIVILEGE_LEVL;
            $id_user =$row->MPERSON_ID;
        }

        if ($valido == $_POST['uname']){ //comprueba si el nombre de usuario registrado es el mismo que se ingresa
            $usuario = array(  //Crea un array para la variable de sesion
                'seudonimo'=> $valido,
                'level' => $privilegio,
                'id' => $id_user
            );
            session_start();
            $_SESSION['user_load']= $usuario;
            echo '<script> window.location.href ="'.PATH_PAG_SEARCH_PATIENT.'" </script>';

        } else echo '<script> alert("USUARIO O CONTRASEÑA NO VALIDOS")</script>';

    }
}

?>