
<!DOCTYPE html>
<html lang="es">
    <head>

        <!--link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
        <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <link rel = "stylesheet" href = "http://jqueryui.com/resources/demos/style.css"-->



        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" >
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css" >



        <script language="JavaScript">

            $(document).ready(function() {
                var table = $('#listaSponsor').DataTable( {
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
                    "columnDefs": [
                        {
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": false
                        }
                    ]
                } );

                $('#verporden').on('click',function () {
                    //$.get, {sponsor_val: "uno"});
                    $('#ViewSponsor').submit();
                });


            });


        </script>

</head>

<body>

</body>
</html>


<?php

/**
 * funcion elimina sponsor
 * @param $id_sponsor
 */
function deleteSponsor($id_sponsor){
    global $wpdb;
    $wpdb->delete('SPONSOR',array('MPERSON_ID'=>$id_sponsor));
}

function path($clave){
    if ($clave == "DELETE_IC"){
        return PATH_IC_DELETE;
    }
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
                       <td>
                           <form action='".PATH_PAG_LOAD_SPONSOR."' name='ViewSponsor' id='ViewSponsor'>

                                <input type='text' id='sponsor_val' name='sponsor_val' value='".$id."' style='display:none'>
                                <a id='verporden' name='verporden'><i style='background: dodgerblue; width: 35px; height: 30px; color: white; text-align: center' class='fa fa-eye fa-2x'></i></a>             
                           </form>
                 
                           <a id='sponsor_del' name='sponsor_del' value=".$id." href='javascript: eliminarxid(".$id.")'>
                                   <i style='background: red; width: 35px; height: 30px; color: white; text-align: center' class='fa fa-trash fa-2x'></i></a>
             
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


if (!empty($_POST['sponsor_del'])){
    deleteSponsor($_POST['sponsor_del']);
    $_POST['sponsor_del']= array();
}

?>
