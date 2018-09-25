<?php
include "../notifications.php";
?>
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
        cargarInformacion();

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

        document.getElementById("legal-name").value= "<?php echo obtieneValor(loadSponsor($_GET["sponsor_val"]),"MPERSON_LEGAL_NAME");?>";
        document.getElementById("numero-doc").value= "<?php echo obtieneValor(loadSponsor($_GET["sponsor_val"]),"MPERSON_IDENTF");?>";
        document.getElementById("tipo-documento").value= "<?php echo obtieneValor(loadSponsor($_GET["sponsor_val"]),"MPERSON_TYPE_DOC");?>";
        document.getElementById("edit").style.display = "block";
        document.getElementById("boton-derecho").style.display = "none";
        document.getElementById("edit-null").style.display = "none";
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

    /**
     * Llama a la funcion de eliminacion de sponsor en php, este metodo se usa para que al cargar la pagina php no se desfase de la accion del boton del lado del cliente
     */
    function eliminar(){
            document.cookie= "COOKIE_DEL=1"
            <?php
                if (htmlspecialchars($_COOKIE["COOKIE_DEL"])==1){
                    deleteSponsor();
                }

            ?>
    }

    $("#delete").on('click', function(){
        $.ajax({
            url: 'template-load-sponsor-function.php',
            success: function(data){
                data returned from php }
            });
        )};

</script>

</body>
</html>

<?php

/**
 * Funcion elimina el sponsor de la base de datos
 */
function deleteSponsor(){

        global $wpdb;
        $wpdb->delete('SPONSOR', array('MPERSON_ID' => $_GET["sponsor_val"] ));
        notificationInfo("Informacion!","Patrocinante eliminado corrcectamente.");

}

/**
 * Trae la informacion del spnsor segun la id
 * @param $id_sponsor
 * @return mixed
 */
function loadSponsor($id_sponsor){
    global $wpdb;
    $query = "SELECT MPERSON_ID, MPERSON_LEGAL_NAME, MPERSON_TYPE_DOC ,MPERSON_IDENTF, SPONSOR_LOGO FROM `SPONSOR` WHERE MPERSON_ID =".$id_sponsor;
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