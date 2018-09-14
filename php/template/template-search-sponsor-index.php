<!DOCTYPE html>
<html>
<head>

</head>

<body>
<script language="JavaScript">

    $(document).ready(function() {
        $('#example').DataTable( {
            "language": {
                "loadingRecords": "Cargando...",
                "decimal": ",",
                "thousands": ".",
                "processing":     "Procesando...",
                "lengthMenu": "Mostrar _MENU_ entradas ",
                "zeroRecords": "No se encontró nada",
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

<?php

function llenaListaPatrocinantes(){
    global $wpdb;

    $query ="SELECT MPERSON_LEGAL_NAME, MPERSON_TYPE_DOC, MPERSON_IDENTF FROM SPONSOR;";
    $count ="SELECT COUNT(MPERSON_LEGAL_NAME) FROM SPONSOR;";
    $consulta= $wpdb->get_results($query);
    $total= $wpdb->get_var($query);
    $lista="";

    if ($total > 0 ){
        while($consulta = $row->fetch_array()){
        $lista .= "<tr>\n";
        $lista .= '<td>'.$row[1]."</td>\n";
        $lista .= '<td>'.$row[2]."</td>\n";
        $lista .= '<td>'.$row[3]."</td>\n";
        $lista .= "<tr>\n";
        }

    }
    return $lista;
}


?>

</body>
</html>