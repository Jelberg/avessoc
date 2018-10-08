<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script language="JavaScript">
        //Variables necesarios para llenar los combos de los examenes
        var centroName = new Array();
        var idcentro= new Array();
        var idexamen = new Array();
        var disponibilidad = new Array();

        //variables para cargar informacion
        var tipodoc = "";
        var numeroident = "";
        var nombrelegal = "";
        var edadpaciente = "";
        var porcentajedescuento = "";
        var id_solicitud = "";
        var id_paciente =""; // AUNQUE se puede hacer por $_POST

        <?php
            preparaComboCentro();
            cargaDatosPaciente($_GET['id_pac']);
        ?>


        /**
         * Funcio carga los datos del paciente en la pagina de la preorden
         * */
        function cargaInfoPaciente() {
            document.getElementById("identificacion").value = tipodoc.concat(" ").concat(numeroident);
            document.getElementById("legal-name").value = nombrelegal;
            document.getElementById("edad").value = edadpaciente;
            document.getElementById("clasificacion").value = porcentajedescuento;
            document.getElementById("paciente-id").value = id_paciente; //Aqui va lo que se obtiene del post al cargar la preorden
            document.getElementById("preordennumero").textContent = "Pre-Orden # <?php echo numeroPreOrden(); ?>";
            document.getElementById("preordennumero").value = <?php echo numeroPreOrden(); ?>;
        }

        /**
         * Carga el combo de centros de slud
         * @param valor el identificador de los componentes del html
         * @param idExam
         * @constructor
         */
        function CargaCentrosSalud(valor,idExam){
            var longitud = idexamen.length;
            console.log(longitud);
            $('#centroReferir'.concat(valor)).empty(); // Limpia el combo
            $('#centroReferir'.concat(valor)).append('<option value="" selected> >>Seleccione opción<< </option>');
            for(i = 0; i < longitud; i++) {

                if (idexamen[i]== idExam) {
                    var disp;
                    if (disponibilidad[i] == "S")
                        disp="DISPONIBLE";
                    else disp="NO DISPONIBLE";

                    $('#centroReferir'.concat(valor)).append('<option value="'.concat(idcentro[i]).concat('" selected>').concat(centroName[i]).concat(' - ').concat(disp).concat('</option>'));
                }
            }
            document.getElementById("centroReferir".concat(valor)).value = "";
        }

    </script>
</head>
<body>
<script language="JavaScript">

    $(document).ready(function() {
        var table = $('#examenes').DataTable({
            "language": {
                "loadingRecords": "Cargando...",
                "decimal": ",",
                "thousands": ".",
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ entradas ",
                "zeroRecords": "La lista esta vacía",
                "search": "Buscar:",
                "info": "pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first": "Primera",
                    "last": "Ultima",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "searching": false,
            "paging":   false,
            "ordering": false,
            "info":     false
        });
        var count=0; //Variable para tener id y nombre único

        /**
         * Se serializan los datos para mandarlos por ajax
         * */
        $('#submit-porden').click( function() {
            var data = table.$('select').serialize();
            $.post(" http://dev.avessoc.org.ve/avessoc-nueva-preorden/" ,
                {
                    datos:data,
                });
            return true;
        });

        /**
         * Añade otra fila a la tabla
         * */
        $('#addRow').on( 'click', function () {
            if (count < 25) { // Arbitrariamente se limito a 25 filas, contando con las que se eliminan
                count++;
                table.row.add([
                    '<select id="examenNombre'.concat(count).concat('"').concat('" name="examenNombre').concat(count).concat('"').concat('" class="select-area"  onchange="CargaCentrosSalud(').concat(count).concat(',this.value)" required> <option value="" selected> >>Seleccione opción<< </option> <?php echo llenaListaExamenes(); ?>').concat('</select>'),
                    '<select id="centroReferir'.concat(count).concat('"').concat('" name="centroReferir').concat(count).concat('"').concat('" class="select-area-two" required> <option value="" selected> >>Seleccione opción<< </option> <?php  ?>').concat('</select>')
                ]).draw(false);
                document.getElementById("examenNombre".concat(count)).value = "";
            } else alert("Ya no puede seguir agregando mas datos");
        } );

        // Llena automaticamente la 1era fila
        $('#addRow').click();

        /**
         * Selecciona un elemento de la fila
         */
        $('#examenes tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );

        /**
         *
         * Elimina una fila del sistema
         */
        $('#eliminafila').click( function () {
            table.row('.selected').remove().draw( false );
        } );

    });


</script>
</body>
</html>

<?php

/**
 * Funcion dibuja la tabla del datatable de los examenes
 * @return string
 */
function llenaTablaExamenes(){

    $lista="";

    $lista .= '
    <table id="examenes" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Nombre del Examen</th>
                                <th>Centro donde se realizará el examen</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre del Examen</th>
                                <th>Centro donde se realizará el examen</th>
                            </tr>
                            </tfoot>
                        </table>
    ';
    return $lista;

}

/**
 * llena las opciones del option del combo de la lista de los examenes
 * @return string
 */
function llenaListaExamenes(){
    global $wpdb;
    $combo="";

    $query="SELECT EXAM_ID, EXAM_DESC FROM EXAM ORDER BY EXAM_DESC ASC";
    foreach( $wpdb->get_results($query) as $key => $row) {
        $combo .= '<option value="'.$row->EXAM_ID.'" selected>'.$row->EXAM_DESC.'</option>';
    }

    return $combo;
}

/**
 * Funcion llena el combo de enfermedades
 */
function llenaListaEnfermedades(){
    global $wpdb;
    $option ="";
    $query = 'SELECT `DISIEASE_ID`, `DISIEASE_DESC` FROM `DISIEASE` order by DISIEASE_DESC ASC;';
        foreach( $wpdb->get_results($query) as $key => $row){
            $option .= '<option value="'.$row->DISIEASE_ID.'" selected>'.$row->DISIEASE_DESC.'</option>';
        }
    return $option;
}

/*
 * Funcion prepara el combo de centro, trayecdo toda la consulta para que sea mas facil saber los centros disponibles
 */
function preparaComboCentro(){
    global $wpdb;
    $i=0;
    $query = 'SELECT MPERSON_LEGAL_NAME, `RCENTEREXAM_MDCENTER_PERSON_ID`, `RCENTEREXAM_EXAM_ID`, `RCENTEREXAM_AVAILABILITY` FROM `RCENTEREXAM`, MDCENTER WHERE `RCENTEREXAM_MDCENTER_PERSON_ID`= MPERSON_ID order by MPERSON_LEGAL_NAME asc';
    foreach($wpdb->get_results($query) as $key => $row){
        echo 'centroName['.$i.']="'.$row->MPERSON_LEGAL_NAME.'"'.";\n";
        echo 'idcentro['.$i.']='.$row->RCENTEREXAM_MDCENTER_PERSON_ID.";\n";
        echo 'idexamen['.$i.']='.$row->RCENTEREXAM_EXAM_ID.";\n";
        echo 'disponibilidad['.$i.']="'.$row->RCENTEREXAM_AVAILABILITY.'"'.";\n";
        $i = $i +1;
    }
}

/**
 * Carga los datos del paciente en la ventana de la pre-orden
 */
function cargaDatosPaciente($id_pacient){
    if (!empty($id_pacient)) {
        global $wpdb;
        $query = 'SELECT `MPERSON_LEGAL_NAME`, TIMESTAMPDIFF(YEAR,`MPERSON_BIRTH`,CURDATE()) AS EDAD, MPERSON_TYPE_DOC, `MPERSON_IDENTF`, `REQUEST_GRAFFAR_PORCTG`, REQUEST_ID, MPERSON_ID FROM `PATIENT`, REQUEST WHERE MPERSON_ID = REQUEST_PATIENT_PERSON_ID AND MPERSON_ID =' . $id_pacient;
        foreach ($wpdb->get_results($query) as $key => $row) {
            echo 'nombrelegal ="' . $row->MPERSON_LEGAL_NAME . '"' . ";\n";
            echo 'tipodoc ="' . $row->MPERSON_TYPE_DOC . '"' . ";\n";
            echo 'numeroident ="' . $row->MPERSON_IDENTF . '"' . ";\n";
            echo 'edadpaciente =' . $row->EDAD . ";\n";
            echo 'porcentajedescuento =' . $row->REQUEST_GRAFFAR_PORCTG . ";\n";
            echo 'id_solicitud=' . $row->REQUEST_ID . ";\n";
            echo 'id_paciente=' . $row->MPERSON_ID . ";\n";
        }
    }
}

/**
 * Devuelve el id del request
 * @param $id_paciente
 * @return string
 */
function request($id_paciente){
    if (!empty($id_paciente)) {
        global $wpdb;
        $query = 'SELECT REQUEST_ID FROM `PATIENT`, REQUEST WHERE MPERSON_ID = REQUEST_PATIENT_PERSON_ID AND MPERSON_ID =' . $id_paciente.'ORDER BY REQUEST_ID DESC LIMIT 1';
        $id_sol = "";
        foreach ($wpdb->get_var($query) as $key => $row) {
            $id_sol = $row->REQUEST_ID;
        }
        return $id_sol;
    } else return null;
}

/**
 * Funcion devuelve el ultimo numero de pre-orden para colocar en el formulario
 * @return int|string
 */
function numeroPreOrden(){
    global $wpdb;
    $last_id= $wpdb->get_var("SELECT `RPORDER_NUMERO_SOL`+1 AS SOL FROM `RPORDER` ORDER BY `RPORDER_NUMERO_SOL` DESC LIMIT 1");
    if (empty($last_id)){
        return 1;
    }else return  $last_id;
}

/**
 * Registra la preorden con los examenes solicitados por el usuario
 * @param $id_solicitud
 */
function registraPOrden($id_solicitud){
    if (!empty($_POST['procedencia']) && !empty($_POST['peso']) && !empty($_POST['causa'])) { //Si no estan vacios hacen el update
        global $wpdb;
        $wpdb->update('REQUEST',
            // Datos que se remplazarán
            array(
                'REQUEST_ORIGIN' => $_POST['procedencia'],
                'REQUEST_WEIGHT' => $_POST['peso'],
                'REQUEST_CAUSE_EXAM' => $_POST['causa']
            ),
            // Cuando el ID del campo es igual al número 1
            array('REQUEST_ID' => $id_solicitud)
        );

        //Se obtiene el ultimo id de la tabla
        $nuevonum =numeroPreOrden();

        // Para hacer el insert de los examenes
        for($i=1; $i < 25 ;$i++){
            if (!empty($_POST["centroReferir$i"]) && !empty($_POST["centroReferir$i"]) && !empty($_POST["examenNombre$i"])) {
                //Obtengo el id del centro que posee el examen
                $id_rcentroexamen = $wpdb->get_var('SELECT `RCENTEREXAM_ID` FROM `RCENTEREXAM`, MDCENTER, EXAM WHERE `RCENTEREXAM_MDCENTER_PERSON_ID`= MPERSON_ID AND `RCENTEREXAM_EXAM_ID`=EXAM_ID AND RCENTEREXAM_MDCENTER_PERSON_ID = ' . $_POST["centroReferir$i"] . ' AND RCENTEREXAM_EXAM_ID=' . $_POST["examenNombre$i"]);
                $wpdb->insert("RPORDER", array(
                    'REQUEST_PATIENT_PERSON_ID' => $_POST['paciente-id'], //
                    'RPORDER_REQUEST_ID' => $id_solicitud,
                    'RPORDER_CE_ID' => $id_rcentroexamen,
                    'RPORDER_NUMERO_SOL' => $nuevonum
                ));
            }
        }
    }
}

/**
 * Carga el combo de los centros solicitantes
 */
function cargaCentrosSolicitantes(){
    global $wpdb;
    $query ="SELECT MPERSON_ID, MPERSON_LEGAL_NAME FROM MDCENTER";
    $option="";
    foreach($wpdb->get_results($query) as $key =>$row){
        $option .= '<option value="'.$row->MPERSON_ID.'" selected>'.$row->MPERSON_LEGAL_NAME.'</option>';
    }
    return $option;
}

?>