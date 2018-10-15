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
            $('#usuarios').DataTable( {
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

   
    </script>
</head>
<body>
</body>
</html>

<?php
function llenaListaUsuarios(){
    global $wpdb;
    $lista="";

    $lista .= '
    <table id="usuarios" class="display" style="width:100%" >
                            <thead>
                            <tr>                     
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Seudonimo</th>
                                <th>Privilegio</th>
                                <th>Centro de Salud</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    $query ="SELECT MPERSON_NAME, MPERSON_LAST_NAME, USER_PSEUDONYM, USER_COMPANY, USER_PRIVILEGE_LEVL FROM USER;";
    foreach( $wpdb->get_results($query) as $key => $row) {

        $lista .= "<tr>\n";
        $lista .= '<td>'.$row->MPERSON_NAME."</td>\n";
        $lista .= '<td>'.$row->MPERSON_LAST_NAME."</td>\n";
        $lista .= '<td>'.$row->USER_PSEUDONYM."</td>\n";
        $lista .= '<td>'.$row->USER_PRIVILEGE_LEVL."</td>\n";

        $nombreCentro= $wpdb->get_var("SELECT MPERSON_LEGAL_NAME FROM MDCENTER WHERE MPERSON_ID=".$row->USER_COMPANY);

        $lista .= '<td>'.$nombreCentro."</td>\n";

        $lista .= "</tr>\n";

    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Seudonimo</th>
                                <th>Privilegio</th>
                                <th>Centro de Salu</th>
                            </tr>
                            </tfoot>
                        </table>
    ';
    return $lista;

}

?>