<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" >
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css" >

    <script language="JavaScript">
        $(document).ready(function() {
            var table = $('#listaMdcenter').DataTable( {
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
                }
            })
        });

    </script>
</head>
<body>

</body>
</html>

<?php
/**
 * Funcin dibuja la tabla de los centros de salud
 * @return string
 */
function muestraListaMdcenter(){
    global $wpdb;
    $lista="";
    $query ="SELECT MPERSON_ID ,MPERSON_LEGAL_NAME FROM MDCENTER;";

    $lista .= '
                            <table id="listaMdcenter" class="display" style="width:100%" >
                            <thead>
                            <tr>
                             
                                <th>Nombre del Centro de Salud</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    foreach( $wpdb->get_results($query) as $key => $row){
        $id = $row->MPERSON_ID;
        $uno =$row->MPERSON_LEGAL_NAME;

        $lista .= "<tr>\n";

        $lista .= '<td>'.$uno."</td>\n             
                    <td>
                       <form action='' name='ViewMDcenter' id='VieMDcenter'>
                            <button style=' background-color: #3498DB; padding-left: 10px; padding-top:10px; padding-bottom:10px;
                            padding-right: 10px; color: #006505s' type='submit' id='sponsor_val' name='sponsor_val' value=".$id.">VER</button>
                       </form>
                       
                       <a id='mdcenter_del' name='mdcenter_del' value=".$id." href='javascript: eliminarxid(".$id.")'>
                       <img src='".PATH_IC_DELETE."'></a>
                     
                    </td>\n";
        $lista .= "</tr>\n";
    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                            
                                <th>Nombre del Centro de salud</th>
                                <th>Accion</th>
                            </tr>
                            </tfoot>
                        </table>
    ';


    return $lista;

}

/**
 * Funcion elimina los registros del centro de salud
 * @param $id
 */
function deleteMdcenter($id){
    global $wpdb;
    $wpdb->delete('MDCENTER',array('MPERSON_ID'=>$id));
}


if (!empty($_POST['mdcenter_del'])){
    deleteMdcenter($_POST['mdcenter_del']);
    $_POST['mcenter_del']= array();
}


?>