<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" >
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script language="JavaScript">

        $(document).ready(function() {
            $('#examenes').DataTable( {
                "jQueryUI": true,
                "language": {
                    "loadingRecords": "Cargando...",
                    "decimal": ",",
                    "thousands": ".",
                    "processing":     "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ entradas ",
                    "zeroRecords": "No se encontró ningún registro disponible",
                    "search":         "Buscar:",
                    "info": "pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Ultima",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                },
            });


            $('#example tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );

            $('#button').click( function () {
                table.row('.selected').remove().draw( false );
            } );

        } );

        /**
         * Hace submit el form load patient
         * @param nombreForm
         */
        function submitForm(nombreForm){
            var ir = "LoadPatient"+nombreForm;
            document.getElementById(ir).submit();
        }

        /**
         * Hace submit al form para generar solicitudes
         * @param nombreForm
         */
        function submitFormSolicitudes(nombreForm){
            var ir = "solicitudes"+nombreForm;
            document.getElementById(ir).submit();
        }

    </script>
</head>
<body>
</body>
</html>

<?php

/**
 * Funcion retorna un string con la lista de los examenes
 * @return string
 */
function llenaListaExamenes(){
    global $wpdb;
    $lista="";

    $lista .= '
    <table id="examenes" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Nombre del Examen</th>
                                <th>Centro</th>
                                <th>Categoria</th>
                                <th>Causas</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    $query ="SELECT EXAM_DESC, MDC.MPERSON_LEGAL_NAME, EXAM_CATEGORY, EXAM_DISIEASE FROM EXAM INNER JOIN RCENTEREXAM AS RC ON RC.RCENTEREXAM_EXAM_ID = EXAM_ID INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID = RC.RCENTEREXAM_MDCENTER_PERSON_ID";
    foreach( $wpdb->get_results($query) as $key => $row) {

        $lista .= "<tr>\n";
        $lista .= '<td>'.$row->EXAM_DESC."</td>\n";
        $lista .= '<td>'.$row->MPERSON_LEGAL_NAME."</td>\n";
        $lista .= '<td>'.$row->EXAM_CATEGORY."</td>\n";
        $lista .= '<td>'.$row->EXAM_DISIEASE."</td>\n";
        $lista .= "</tr>\n";

    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>     
                                <th>Nombre del Examen</th>
                                <th>Centro</th>
                                <th>Categoria</th>
                                <th>Causas</th>
                            </tr>
                            </tfoot>
                        </table>
    ';
    return $lista;

}

?>