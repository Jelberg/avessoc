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
    }

</script>
</head>
<body>

</body>
</html>
<?php




/**
 * Funcion trae la informacion del usurio y lo asigna alas variables de javascript
 */
function cargarDatosUsuario(){
    session_start();

    $query= "SELECT MPERSON_NAME, MPERSON_LAST_NAME, USER_PASS,USER_PSEUDONYM,USER_PRIVILEGE_LEVL,USER_COMPANY, MPERSON_ID FROM USER WHERE MPERSON_ID=".$_SESSION['user_load']['id'];
   // echo '<script>alert("ESTA ES LA VARIABLE DESESION '.$query.'")</script>';
    global $wpdb;
    $id_email ="";
    foreach ($wpdb->get_results($query) as $key => $row){
        echo 'nombre="'.$row->MPERSON_NAME.'"'.";\n";
        echo 'apellido="'.$row->MPERSON_LAST_NAME.'"'.";\n";
        echo 'seudonimo="'.$row->USER_PSEUDONYM.'"'.";\n";
        echo 'pass="'.$row->USER_PASS.'"'.";\n";
        echo 'privilegio="'.$row->USER_PRIVILEGE_LEVL.'"'.";\n";
        echo 'centro="'.$row->USER_COMPANY.'"'.";\n";
        $id_email= $row->MPERSON_ID;
        $des = $wpdb->get_var("SELECT CONTACT_EMAIL FROM CONTACT WHERE CONTACT_USER_MPERSON_ID=".$id_email);
        echo 'email="'.$des.'"'.";\n";

    }
}
?>