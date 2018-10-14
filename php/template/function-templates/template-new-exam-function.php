<?php agregaNuevoExamen(); //Registra un nuevo examen ?>
<html>
<head>
    <script language="JavaScript">

        /**
         * Muestra el tpe input de otro tipo de patologia
         */
        function muestraTextAreaPatologia() {
            if (document.getElementById("tipo-patologia").value == -1) {
                document.getElementById("otra-patologia").style.display = "block";
                document.getElementById("nueva-patologia").required = true;
            } else{
                document.getElementById("otra-patologia").style.display = "none";
                document.getElementById("nueva-patologia").required = false;
            }
        }

        /**
         * Muestra el tpe input de otro tipo de categoria
         */
        function muestraTextAreaCategoria() {
            if (document.getElementById("tipo-categoria").value == -1) {
                document.getElementById("otra-categoria").style.display = "block";
                document.getElementById("nueva-categoria").required = true;
            } else{
                document.getElementById("otra-categoria").style.display = "none";
                document.getElementById("nueva-categoria").required = false;
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
 * Funcion llena el combo de patologias
 */
function muestraPatologias(){
    $combo = ' <label for="name">Patología por la que se realiza dicho examen</label><span class="required">*</span><br>
               <select id="tipo-patologia" name="tipo-patologia" class="select-area-two" onchange="muestraTextAreaPatologia()" required>' ;
    $combo .= '<option value="" selected> >>Seleccione opción<< </option>';
    $query="SELECT DISTINCT `DISIEASE_DESC` FROM DISIEASE";
    global $wpdb;
    foreach ($wpdb->get_results($query) as $key => $row){
        $combo .= '<option value="'.$row->DISIEASE_DESC.'" selected>'.$row->DISIEASE_DESC.'</option>';
    }
    $combo .= '<option value="-1" selected>Otro</option>';
    $combo .= '</select>';

    return $combo;
}

/**
 * Funcion llena el combo de categorias
 */
function muestraCategorias(){
    $combo = ' <label for="name">Categoria del Examen</label><span class="required">*</span><br>
               <select id="tipo-categoria" name="tipo-categoria" class="select-area-two" onchange="muestraTextAreaCategoria()" required>' ;
    $combo .= '<option value="" selected> >>Seleccione opción<< </option>';

    $query="SELECT DISTINCT `EXAM_CATEGORY` FROM `EXAM`";
    global $wpdb;
    foreach ($wpdb->get_results($query) as $key => $row){
        $combo .= '<option value="'.$row->EXAM_CATEGORY.'" selected>'.$row->EXAM_CATEGORY.'</option>';
    }

    $combo .= '<option value="-1" selected>Otro</option>';
    $combo .= '</select>';

    return $combo;
}

function agregaNuevoExamen(){
    $messageIdent = md5($_POST["examen"].$_POST["nueva-categoria"].$_POST["tipo-categoria"]); // Se hace hash sobre los valoes de los parametros

    $sessionMessageIdent = isset($_SESSION['messageIdent'])?$_SESSION['messageIdent']:''; // si la variable de sesion esta definida entonces se asigna a la variable el valor de la sesion si no se asigna ''

    if($messageIdent!=$sessionMessageIdent) {
        $_SESSION['messageIdent'] = $messageIdent; // Se guarda la nueva variable de sesion
        global $wpdb;
        if (!empty($_POST['examen'])) {
            if ($_POST['tipo-categoria'] != '-1' && $_POST['tipo-patologia'] != '-1') {
                $wpdb->insert('EXAM', array(
                    'EXAM_CATEGORY' => $_POST['tipo-categoria'],
                    'EXAM_DISIEASE' => $_POST['tipo-patologia'],
                    'EXAM_DESC' => ucfirst(strtolower($_POST['examen']))
                ));
            } else if ($_POST['tipo-categoria'] == '-1' && $_POST['tipo-patologia'] == '-1') {
                $wpdb->insert('EXAM', array(
                    'EXAM_CATEGORY' => ucfirst(strtolower($_POST['nueva-categoria'])),
                    'EXAM_DISIEASE' => ucfirst(strtolower($_POST['nueva-patologia'])),
                    'EXAM_DESC' => ucfirst(strtolower($_POST['examen']))
                ));

                $wpdb->insert('DISIEASE', array(
                    'DISIEASE_DESC' => ucfirst(strtolower($_POST['nueva-patologia']))
                ));
            } else if ($_POST['tipo-categoria'] == '-1' && $_POST['tipo-patologia'] != '-1') {
                $wpdb->insert('EXAM', array(
                    'EXAM_CATEGORY' => ucfirst(strtolower($_POST['nueva-categoria'])),
                    'EXAM_DISIEASE' => $_POST['tipo-patologia'],
                    'EXAM_DESC' => ucfirst(strtolower($_POST['examen']))
                ));
            } else if ($_POST['tipo-categoria'] != '-1' && $_POST['tipo-patologia'] == '-1') {
                $wpdb->insert('EXAM', array(
                    'EXAM_CATEGORY' => $_POST['tipo-categoria'],
                    'EXAM_DISIEASE' => ucfirst(strtolower($_POST['nueva-patologia'])),
                    'EXAM_DESC' => ucfirst(strtolower($_POST['examen']))
                ));

                $wpdb->insert('DISIEASE', array(
                    'DISIEASE_DESC' => ucfirst(strtolower($_POST['nueva-patologia']))
                ));
            }
        }
    }
}

?>