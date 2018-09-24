<html>
<head>

</head>
<body>

<script language="JavaScript">


    /**
     * Funcion que deshabilita la edicion y carga la informacion previa de nuevo
     */
    function deshabilitar($id){
        document.getElementById("legal-name").disabled=true;
        document.getElementById("tipo-documento").disabled=true;
        document.getElementById("numero-doc").disabled=true;
        cargarInformacion(1);

    }

    /**
     * Funcion habilita la edicion
     */
    function editSponsor(){
        document.getElementById("edit").style.display = "none";
        document.getElementById("boton-derecho").style.display = "block";
        document.getElementById("edit-null").style.display = "block";
        document.getElementById("legal-name").disabled=false;
        document.getElementById("tipo-documento").disabled=false;
        document.getElementById("numero-doc").disabled=false;

    }

    /**
     * Carga la informacion del sponsor en el html
     */
    function cargarInformacion(){
        document.getElementById("edit").style.display = "block";
        document.getElementById("boton-derecho").style.display = "none";
        document.getElementById("edit-null").style.display = "none";
        document.getElementById("legal-name").value= "<?php echo obtieneValor(loadSponsor(1),"MPERSON_LEGAL_NAME");?>";
        document.getElementById("numero-doc").value= "<?php echo obtieneValor(loadSponsor(1),"MPERSON_IDENTF");?>";
        document.getElementById("tipo-documento").value= "<?php echo obtieneValor(loadSponsor(1),"MPERSON_TYPE_DOC");?>";
    }

    /**
     * Funcion para establecer un pattern en el campo de número de documento en base al tipo
     * */
    function cambioTipoDocumento() {
        if (document.getElementById("tipo-documento").value == "RIF") {
            document.getElementById("numero-doc").pattern = "([VEJPG]{1})([0-9]{7,9})";
            document.getElementById("numero-doc").placeholder = "Ej.: J3323432";
            document.getElementById("numero-doc").title = "El campo RIF debe contener una letra (V,E,J,P,G) y entre 7 a 9 dígitos"
        } else if(document.getElementById("tipo-documento").value == "E" || document.getElementById("tipo-documento").value == "V"){
            document.getElementById("numero-doc").pattern = "([0-9]{7,9})";
            document.getElementById("numero-doc").placeholder = "Ej.: 1234567";
            document.getElementById("numero-doc").title = "Tipo de documentos V o E deben contener solo digitos. Entre 7 a 9 digitos"
        } else{
            document.getElementById("numero-doc").placeholder = " ";
            document.getElementById("numero-doc").title = " Ingrese número de Pasaporte"
        }

    }

</script>

</body>
</html>

<?php
/**
 * Trae la informacion del spnsor segun la id
 * @param $id_sponsor
 * @return mixed
 */
function loadSponsor($id_sponsor){
    global $wpdb;
    $query = "SELECT MPERSON_ID, MPERSON_LEGAL_NAME, MPERSON_TYPE_DOC ,MPERSON_IDENTF, SPONSOR_LOGO FROM `SPONSOR` WHERE MPERSON_ID = 1";
    $resultado= $wpdb->get_results($query);
    return $resultado;
}

/**
 *
 * Estrae del array obtenido de la consulta el valor de la columna, solo para una fila
 * @param $resultado Array con la informacion
 * @param $columna nombre de la columna en la bd
 * @return string
 */
function obtieneValor($resultado,$columna){
    $valor="";
    foreach( $resultado as $key => $row){
        $valor = $row->$columna;
    }
    return $valor;
}


?>