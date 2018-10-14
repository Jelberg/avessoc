<html>
<head>
<script language="JavaScript">
var nombre1 = "";
var nombre2 = "";
var apellido1 = "";
var apellido2 = "";
var sexo  = "";
var tipoDoc = "";
var numeroDoc = "";
var profesion = "";
var nacionalidad = "";
var titularDoc  = "";
var fechaNac = "";
var estadoCivil="";

    <?php
    loadPatient();
    ?>

/**
 * Cara los datos del paciente en el form
 */
    function llenaDatosPaciente(){
        document.getElementById("tipo-documento").value = tipoDoc;
        document.getElementById("titular").value = titularDoc;
        document.getElementById("numero-doc").value =numeroDoc ;
        document.getElementById("name-uno").value = nombre1;
        document.getElementById("name-dos").value = nombre2;
        document.getElementById("apellido-uno").value = apellido1;
        document.getElementById("apellido-dos").value = apellido2;
        document.getElementById("birth-date").value =fechaNac ;
        document.getElementById("sexo").value =sexo ;
        document.getElementById("estao-civil").value = estadoCivil;
        document.getElementById("oficio").value = profesion;
        document.getElementById("nacionalidad").value =nacionalidad ;
    }

</script>
</head>
<body>

</body>
</html>

<?php

/**
 * Consulta la base de datos para traer los datos del paciente y asignarlos a las variables de javascript
 */
function loadPatient(){
    $query = "SELECT `MPERSON_NAME`,  `MPERSON_LAST_NAME`,`MPERSON_SECOND_NAME`, `MPERSON_SECOND_LNAME` , `MPERSON_SEX`, `MPERSON_PROFETION`, `MPERSON_TYPE_DOC`, `MPERSON_NACIONALITY`,
 `MPERSON_BIRTH`, `MPERSON_IDENTF`, `MPERSON_HOLDER_CARD`, D.DIRECTION_ID, C.CONTACT_ID, MPERSON_CIVIL_STATS
FROM PATIENT 
INNER JOIN DIRECTION AS D ON D.DIRECTION_MPERSON_ID = MPERSON_ID
INNER JOIN CONTACT AS C ON C.CONTACT_MPERSON_ID = MPERSON_ID
WHERE MPERSON_ID = ".$_POST['patient'];

    $direccion="";
    $contacto ="";
    global $wpdb;
    foreach ($wpdb->get_results($query) as $key => $row){
        echo 'nombre1="'.$row->MPERSON_NAME.'";'."\n";
        echo 'nombre2="'.$row->MPERSON_SECOND_NAME.'";'."\n";
        echo 'apellido1="'.$row->MPERSON_LAST_NAME.'";'."\n";
        echo 'apellido2="'.$row->MPERSON_SECOND_LNAME.'";'."\n";
        echo 'fechaNac="'.$row->MPERSON_BIRTH.'";'."\n";
        echo 'nacionalidad="'.$row->MPERSON_NACIONALITY.'";'."\n";
        echo 'titularDoc="'.$row->MPERSON_HOLDER_CARD.'";'."\n";
        echo 'profesion="'.$row->MPERSON_PROFETION.'";'."\n";
        echo 'sexo="'.$row->MPERSON_SEX.'";'."\n";
        echo 'numeroDoc="'.$row->MPERSON_IDENTF.'";'."\n";
        echo 'tipoDoc="'.$row->MPERSON_TYPE_DOC.'";'."\n";
        echo 'estadoCivil="'.$row->MPERSON_CIVIL_STATS.'";'."\n";
        $direccion=$row->DIRECTION_ID;
        $contacto=$row->CONTACT_ID;
    }

}

?>