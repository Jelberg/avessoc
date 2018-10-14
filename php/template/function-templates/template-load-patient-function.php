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
var direccion ="";
var nombreEstado="";
var nombreMunicipio="";
var nombreParroquia="";
var uno;
var dos;
var email="";

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
        document.getElementById("muestraEstado").value = nombreEstado;
        document.getElementById("muestraMunicipio").value = nombreMunicipio;
        document.getElementById("muestraParroquia").value = nombreParroquia;
        document.getElementById("direccion").value = direccion;
        document.getElementById("local").value = uno;
        document.getElementById("movil").value = dos;
        document.getElementById("correo").value = email;

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
    cargaDireccion($direccion);
    cargaDatoscontacto($contacto);

}

/**
 * Funcion carga la direccion en la pagina
 * @param $id_direccion
 */
function cargaDireccion($id_direccion){
    global $wpdb;
    $query ="SELECT `DIRECTION_DESC`, PARISH_ID, PARISH_DESC, MUNICIPALT_ID, MUNICIPALT_DESC, STATE_ID, STATE_DESC FROM 
`DIRECTION`, PARISH, MUNICIPALT, STATE WHERE `DIRECTION_PARISH_ID`= PARISH_ID AND `DIRECTION_PAR_MUN_ID`= 
MUNICIPALT_ID AND MUNICIPALT_STATE_ID=STATE_ID AND DIRECTION_ID=".$id_direccion;
    foreach ($wpdb->get_results($query) as $key => $row) {
        echo 'direccion="'.$row->DIRECTION_DESC.'"'.";\n";
        echo 'nombreEstado="'.$row->STATE_DESC.'"'.";\n";
        echo 'nombreMunicipio="'.$row->MUNICIPALT_DESC.'"'.";\n";
        echo 'nombreParroquia="'.$row->PARISH_DESC.'"'.";\n";
    }
}

/**
 *
 * Funcion carga los datos de contacto en la pagina
 * @param $id_contactoss
 */
function cargaDatoscontacto($id_contacto){
    global $wpdb;
    $query_contacto="SELECT CONTACT_LOCAL_PHON, CONTACT_MOVIL_PHON, CONTACT_EMAIL FROM CONTACT WHERE CONTACT_MPERSON_ID=".$id_contacto;
    foreach ($wpdb->get_results($query_contacto) as $key => $row) {
        if ($row->CONTACT_LOCAL_PHON==0){
            echo 'uno=""'. ";\n";
        }else echo 'uno=' . $row->CONTACT_LOCAL_PHON  . ";\n";
        if ($row->CONTACT_MOVIL_PHON ==0){
            echo 'dos=""'. ";\n";
        }else echo 'dos=' . $row->CONTACT_MOVIL_PHON   . ";\n";

        echo 'email="' . $row->CONTACT_EMAIL . '"' . ";\n";
    }

}

?>