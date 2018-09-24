<?php
//include "../notifications.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.19/api/fnReloadAjax.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <script language="JavaScript">

            $(document).ready(function() {
                var table = $('#listaSponsor').DataTable( {
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
                    "columnDefs": [
                        {
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": false
                        }
                    ]
                } );


           /*     $('#listaSponsor tbody').on( 'click', 'tr', function () {
                    if ( $(this).hasClass('selected') ) {
                        $(this).removeClass('selected');
                    }
                    else {
                        table.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
                    }
                } );*/


            } );

           /* function muestraid(id){
                alert('Este es el id: '.concat(id));
            }*/




        </script>

</head>

<body>

</body>
</html>


<?php

/**
 * Funcion que elimina sponsor de la base de datos
 * @param $id
 */
function deleteSponsor($id){
    global $wpdb;
    $wpdb->delete('SPONSOR', array('MPERSON_ID' => $id ));
}

/**
 * Llena la lista del datatable del sponsor
 * @return string
 */
function llenaListaSponsor(){
    global $wpdb;
    $lista="";
    $query_sponsor ="SELECT MPERSON_ID ,MPERSON_LEGAL_NAME, MPERSON_TYPE_DOC, MPERSON_IDENTF FROM SPONSOR;";

    $lista .= '
                            <table id="listaSponsor" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Legal</th>
                                <th>Tipo de Documento</th>
                                <th>Número de documento</th>
                                <th>Accion</th>
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
            $lista .= '<td>'.$id."</td>\n";
            $lista .= '<td>'.$uno."</td>\n";
            $lista .= '<td>'.$dos."</td>\n";
            $lista .= '<td>'.$tres."</td>\n
                       <td><button type='button' onclick='muestraid(".$id.")'>
                        <span >Ver</span>
                        </button>
                        <span id='deleteS' name='deleteS' onclick='eliminar(".$id.")'><img src='http://dev.avessoc.org.ve/wp-content/themes/hestia-child/page-templates/icons/ic-borrar.png'></span>
                        </td>\n";
        $lista .= "</tr>\n";
    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Legal</th>
                                <th>Tipo de Documento</th>
                                <th>Número de documento</th>
                                <th>Accion</th>
                            </tr>
                            </tfoot>
                        </table>
    ';


    return $lista;
}

?>
