<?php

/**
 * Verifica el login del usuario
 */
function login(){
    if (!empty($_POST['uname']) && !empty($_POST['psw'])){

        global $wpdb;
        $query = "SELECT USER_PSEUDONYM FROM USER  WHERE USER_PSEUDONYM = '".$_POST['uname']."' and USER_PASS = ".$_POST['psw'].";";

        $valido = $wpdb->get_var($query);

        if ($valido == $_POST['uname']){
            echo '<script> window.location.href ="'.PATH_PAG_SEARCH_PATIENT.'" </script>';
        } else echo '<script> alert("USUARIO O CONTRASEÑA NO VALIDOS")</script>';

    }
}

?>