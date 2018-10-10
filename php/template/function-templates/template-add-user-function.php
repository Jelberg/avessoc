<html>
<head>
<script language="JavaScript">
    var seudonimos = Array();
<?php
    llenaArraySeudonimos();
?>

    $('#RegistrarUsuario').on('click',function()){
        var logitud = seudonimos.length;
        var pass = ""; // variable para saber si encontro el seudoimo
        var pse  = document.getElementById("seudonimo").value;
        for(i=0; i < logitud; i++){
            if (seudonimos[i] == pse){
                $('#FormAddUser').submit();
                pass = "SI";
            }
        }
        if (pass == 'SI'){
            alert("El seudónimo ingresado ya existe\n Por favor ingrese otro.");
        }
    }


</script>
</head>
<body>

</body>
</html>

<?php


/**
 * Llena el combo con los centros de Salud
 */
function llenaListaMDC(){
    global $wpdb;
    $combo = "";
    $query = "SELECT MPERSON_ID, MPERSON_LEGAL_NAME FROM MDCENTER ORDER BY MPERSON_LEGAL_NAME ASC";

    foreach ($wpdb->get_results($query) as $key => $row){
        $combo .= '<option value="'.$row->MPERSON_ID.'">'.$row->MPERSON_LEGAL_NAME.'</option>';
    }

    return $combo;
}


/**
 * Inserta el usuario en la base de datos
 */
function agregarUsuario(){
    global $wpdb;
    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['pass']) && !empty($_POST['seudonimo']) &&
        !empty($_POST['email']) && !empty($_POST['privilegio']) && !empty($_POST['centro']) ) {
        $wpdb->insert('USER', array(
            'MPERSON_NAME' => $_POST['nombre'],
            'MPERSON_LAST_NAME' => $_POST['apellido'],
            'USER_PASS' => $_POST['pass'],
            'USER_PSEUDONYM ' => $_POST['seudonimo'],
            'USER_PRIVILEGE_LEVL' => $_POST['privilegio'],
            'USER_COMPANY ' => $_POST['centro']
        ));

        $id = $wpdb->get_var("SELECT MPERSON_ID FROM USER ORDER BY MPERSON_ID DESC");
        //Agrega el correo en contacto
        $wpdb->insert('CONTACT', array(
            'CONTACT_EMAIL' => $_POST['email'],
            'CONTACT_USER_MPERSON_ID'=> $id
        ));
    }
}


/**
 * Funcion llena el array de seudonimos para compararlos con el de que ingresa el usuario el cual debe de ser unico
 */
function llenaArraySeudonimos(){
    global  $wpdb;
    $query="SELECT USER_PSEUDONYM FROM USER";
    $i =0;
    foreach ($wpdb->get_results($query) as $key => $row){
        echo 'seudonimos['.$i.']="'.$row->USER_PSEUDONYM.'"'.";\n";
        $i = $i +1;
    }

}

?>