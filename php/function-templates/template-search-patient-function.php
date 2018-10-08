<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
                      
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>T. Doc</th>
                                <th>Número de identidad</th>
                                <th>Edad</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    $query ="SELECT MPERSON_ID, MPERSON_NAME, MPERSON_LAST_NAME, MPERSON_TYPE_DOC, MPERSON_IDENTF, TIMESTAMPDIFF(YEAR,`MPERSON_BIRTH`,CURDATE()) AS EDAD FROM PATIENT";
    foreach( $wpdb->get_results($query) as $key => $row) {
        $cero =$row->MPERSON_ID;
        $uno = $row->MPERSON_NAME;
        $dos = $row->MPERSON_LAST_NAME;
        $tres = $row->MPERSON_TYPE_DOC;
        $cuatro = $row->MPERSON_IDENTF;

        $lista .= "<tr>\n";
        $lista .= '<td>'.$uno."</td>\n";
        $lista .= '<td>'.$dos."</td>\n";
        $lista .= '<td>'.$tres."</td>\n";
        $lista .= '<td>'.$cuatro."</td>\n";
        $lista .= '<td>'.$row->EDAD."</td>\n
                       <td>
                       <form action='".PATH_PAG_NEW_REQUEST."' name='solicitudes' id='solicitudes' method='post'>
                            <button style=' background-color: #3498DB; padding-left: 10px; padding-top:10px; padding-bottom:10px;
                            padding-right: 10px; color: #006505' type='submit' id='id_pac' name='id_pac' value=".$cero.">Solicitud</button>
                       </form>   
                        </td>\n";
        $lista .= "</tr>\n";

    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                             
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>T. Doc</th>
                                <th>Número de identidad</th>
                                <th>Edad</th>
                                <th>Accion</th>
                            </tr>
                            </tfoot>
                        </table>
    ';
    return $lista;

}

?>