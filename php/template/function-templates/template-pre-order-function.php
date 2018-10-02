<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script language="JavaScript">
        var centroName = new Array();
        var idcentro= new Array();
        var idexamen = new Array();
        var disponibilidad = new Array();

        <?php preparaComboCentro();?>

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

?>