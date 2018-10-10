<!DOCTYPE html>
<html>
<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script language="JavaScript">

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

        <?php
            add_sponsor();
            unset($_POST);
        ?>

        jQuery(document).ready(function($){

                /**
                 * Valida la extension del documento y hace el submit
                 * @param formulario
                 * @param archivo
                 * @returns {number}
                 */
                $('#registrar').on('click',function () {

                    extensiones_permitidas = new Array(".png", ".jpeg");
                    mierror = "";
                    archivo = document.getElementById("logo").value;
                    if (archivo) { // Si existe el archivo
                        //recupero la extensión de este nombre de archivo
                        extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
                        //compruebo si la extensión está entre las permitidas
                        permitida = false;

                        for (var i = 0; i < extensiones_permitidas.length; i++) {
                            if (extensiones_permitidas[i] == extension) {
                                permitida = true;
                                break;
                            }
                        }
                        if (!permitida) {
                            mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join();
                        }else
                        if(permitida) {
                            $('#formSponsor').submit();
                            return 1;
                        }

                        alert (mierror);
                    }

                    return 0;
                });

        });

    </script>




</head>
<body>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*  if (empty($_POST["numero-doc"]) or empty($_POST["tipo-documento"])) {
      } elseif (sizeof(search_sponsor_id($_POST["numero-doc"], $_POST["tipo-documento"])) != 0) {
          $msjNumero = "Tipo de documento con número de identificaion ya existen";
      }*/
}

/**
 *
 * Inserta el Sponsor a la base de datos
 */
function add_sponsor(){
    if (!empty($_POST['legal-name'])) {
        global $wpdb;

        $wpdb->insert('SPONSOR', array(
            'MPERSON_LEGAL_NAME' => ucfirst(strtolower($_POST["legal-name"])),
            'MPERSON_TYPE_DOC' => $_POST["tipo-documento"],
            'MPERSON_IDENTF' => $_POST["numero-doc"],
            'SPONSOR_LOGO' => $_POST["logo"]
        ));

        if (!empty($_POST["aporte"])) {
            $id_sponsor = $wpdb->get_var("SELECT MAX(MPERSON_ID) AS id FROM SPONSOR"); //< Devuelve el ultimo id registrado
            add_cntribution_init($_POST["aporte"], $id_sponsor);
        }
    }
}

/**
 * Buscar el numero de identificacion del sponsor
 * @return mixed
 */
/* function search_sponsor_id(){
     global $wpdb;
     $query ="SELECT MPERSON_ID FROM `SPONSOR` WHERE MPERSON_IDENTF = ".$_POST["numero-doc"]." AND MPERSON_TYPE_DOC ='".$_POST["tipo-documento"]."'";
     $id_sponsor= $wpdb->get_var( $query );
     return $id_sponsor;
 }
*/

/**
 * Este insert es solo para cuando se agrega por primera vez al sponsor
 * @param $montoinicial
 * @param $userid
 */
function add_cntribution_init($montoinicial,$userid){
    if (!empty($_POST['legal-name'])) {
        global $wpdb;

        $wpdb->insert('CNTBTION', array(
            'CNTBTION_CANT' => $montoinicial,
            'CNTBTION_BALANCE' => $montoinicial,
            'CNTBTION_SPONSOR_ID' => $userid
        ));
    }
}

?>
