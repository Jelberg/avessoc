<html>

<head>
<script language="JavaScript">
    var nombre ="";
    var apellido ="";
    var seudonimo ="";
    var  pass ="";
    var privilegio="";
    var centro ="";
    var email ="";
    <?php
    guardaCambios();
    cargarDatosUsuario();
    ?>

    /**
     * Funcion se encarga de cargar la informacion del usuario en el perfil
     */
    function muestraData(){
        document.getElementById("nombre").value = nombre;
        document.getElementById("apellido").value = apellido;
        document.getElementById("seudonimo").value = seudonimo;
        document.getElementById("pass").value = pass;
        document.getElementById("email").value = email;
        document.getElementById("privilegio").value = privilegio;
        document.getElementById("centro").value = centro;
       // document.getElementById("").value = ;
        document.getElementById("nombre").disabled = true;
        document.getElementById("apellido").disabled = true;
        document.getElementById("seudonimo").disabled = true;
        document.getElementById("pass").disabled = true;
        document.getElementById("email").disabled = true;
        document.getElementById("privilegio").disabled = true;
        document.getElementById("centro").disabled = true;

        document.getElementById("edit").style.display = "none";
        document.getElementById("habilitar").style.display = "block";
    }

    /**
     * Funcion habilita os campos para la edicions
     */
    function habilitaCampos(){
        document.getElementById("nombre").disabled = false;
        document.getElementById("apellido").disabled = false;
        document.getElementById("seudonimo").disabled = true;
        document.getElementById("pass").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("privilegio").disabled = true;
        document.getElementById("centro").disabled = true;

        document.getElementById("edit").style.display = "block";
        document.getElementById("habilitar").style.display = "none";
    }

    function submitCambios(){
        var text1 = document.getElementById("nombre").disabled.value;
        var text2 = document.getElementById("apellido").disabled.value;
        var text3 = document.getElementById("pass").disabled.value;
        var text4 = document.getElementById("email").disabled.value;

        if (text1 != "" && text2 != "" && text3 != "" && text4 != "" ){
            document.getElementById("FormProfile").submit();
        } else{
            alert("Debe llenar los campos: nombre, apellido, correo y password;\n Ninguno debe estar vacio");
        }
    }

</script>
</head>
<body>

</body>
</html>
<?php

session_start();

/**
 * Funcion trae la informacion del usurio y lo asigna alas variables de javascript
 */
function cargarDatosUsuario(){
    session_start();

    $query= "SELECT MPERSON_NAME, MPERSON_LAST_NAME, USER_PASS,USER_PSEUDONYM,USER_PRIVILEGE_LEVL,USER_COMPANY, MPERSON_ID FROM USER WHERE MPERSON_ID=".$_SESSION['user_load']['id'];
   // echo '<script>alert("ESTA ES LA VARIABLE DESESION '.$query.'")</script>';
    global $wpdb;
    $id_email ="";
    $id_centro ="";
    foreach ($wpdb->get_results($query) as $key => $row){
        echo 'nombre="'.$row->MPERSON_NAME.'"'.";\n";
        echo 'apellido="'.$row->MPERSON_LAST_NAME.'"'.";\n";
        echo 'seudonimo="'.$row->USER_PSEUDONYM.'"'.";\n";
        echo 'pass="'.$row->USER_PASS.'"'.";\n";
        echo 'privilegio="'.$row->USER_PRIVILEGE_LEVL.'"'.";\n";

        $id_centro =$row->USER_COMPANY;
        $nombreCentro = $wpdb->get_var("SELECT MPERSON_LEGAL_NAME FROM MDCENTER WHERE MPERSON_ID=".$id_centro);
        echo 'centro="'.$nombreCentro.'"'.";\n";

        $id_email= $row->MPERSON_ID;
        $des = $wpdb->get_var("SELECT CONTACT_EMAIL FROM CONTACT WHERE CONTACT_USER_MPERSON_ID=".$id_email);
        echo 'email="'.$des.'"'.";\n";

    }
}


/**
 * Funcionguarda los cambios realizaos en el perfil
 */
function guardaCambios(){
    $messageIdent = md5($_POST["nombre"].$_POST["pass"].$_POST["apellido"]); // Se hace hash sobre los valoes de los parametros

    $sessionMessageIdent = isset($_SESSION['messageIdent'])?$_SESSION['messageIdent']:''; // si la variable de sesion esta definida entonces se asigna a la variable el valor de la sesion si no se asigna ''

    if($messageIdent!=$sessionMessageIdent) {
        $_SESSION['messageIdent'] = $messageIdent; // Se guarda la nueva variable de sesion
        global $wpdb;
        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['pass'])){
            $wpdb->update('USER',array(
                'MPERSON_NAME' =>  $_POST['nombre'],
                'MPERSON_LAST_NAME' =>  $_POST['apellido'],
                'USER_PASS' => $_POST['pass'],

            ),
                array(
                    'MPERSON_ID' => $_SESSION['user_load']['id']
                ));

            $wpdb->update('CONTACT',array(
                'CONTACT_EMAIL' => $_POST['email']
            ),

                array(
                    'CONTACT_USER_MPERSON_ID' => $_SESSION['user_load']['id']
                ));
        }
    }
}
?>