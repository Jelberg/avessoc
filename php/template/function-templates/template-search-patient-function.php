<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script language="JavaScript">

        $(document).ready(function() {
            $('#paciente').DataTable( {
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

    </script>
</head>
<body>
</body>
</html>

<?php
function llenaListaPacientes(){
    global $wpdb;
    $lista="";

    $lista .= '
    <table id="paciente" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>T. Doc</th>
                                <th>Número de identidad</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    $query ="SELECT MPERSON_ID, MPERSON_NAME, MPERSON_LAST_NAME, MPERSON_TYPE_DOC, MPERSON_IDENTF FROM PATIENT";
    foreach( $wpdb->get_results($query) as $key => $row) {
        $cero =$row->MPERSON_ID;
        $uno = $row->MPERSON_NAME;
        $dos = $row->MPERSON_LAST_NAME;
        $tres = $row->MPERSON_TYPE_DOC;
        $cuatro = $row->MPERSON_IDENTF;

        $lista .= "<tr>\n";
        $lista .= '<th>'.$cero."</th>\n";
        $lista .= '<td>'.$uno."</td>\n";
        $lista .= '<td>'.$dos."</td>\n";
        $lista .= '<td>'.$tres."</td>\n";
        $lista .= '<td>'.$cuatro."</td>\n";
        $lista .= "</tr>\n";

    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>T. Doc</th>
                                <th>Número de identidad</th>
                            </tr>
                            </tfoot>
                        </table>
    ';
    return $lista;

}

?>