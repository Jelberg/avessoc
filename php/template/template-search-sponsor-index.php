<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

        <script language="JavaScript">

            $(document).ready(function() {
                $('#example').DataTable( {
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
                    }
                } );
            } );

        </script>

</head>

<body>


<?php

function llenaListaSponsor(){
    global $wpdb;
    $lista="";
    $query_sponsor ="SELECT MPERSON_ID ,MPERSON_LEGAL_NAME, MPERSON_TYPE_DOC, MPERSON_IDENTF FROM SPONSOR;";

    $lista .= '
                            <table id="example" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Nombre Legal</th>
                                <th>Tipo de Documento</th>
                                <th>Número de documento</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    foreach( $wpdb->get_results($query_sponsor) as $key => $row){
        $id = $row->MPERSON_ID;
        $uno =$row->MPERSON_LEGAL_NAME;
        $dos=$row->MPERSON_TYPE_DOC;
        $tres=$row->MPERSON_IDENTF;
        $lista .= "<tr>\n";
            $lista .= '<td>'.$uno."</td>\n";
            $lista .= '<td>'.$dos."</td>\n";
            $lista .= '<td>'.$tres."</td>\n";
        $lista .= "</tr>\n";
    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre Legal</th>
                                <th>Tipo de Documento</th>
                                <th>Número de documento</th>
                            </tr>
                            </tfoot>
                        </table>
    ';


    return $lista;
}

?>

</body>
</html>