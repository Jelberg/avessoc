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
            var table = $('#listaPorder').DataTable( {
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
            } );
        });

    </script>
</head>
<body>

</body>
</html>

<?php

/**
 * Retorna La lista de las pre-ordenes
 * @return string
 */
function llenaListaPreOrdenes(){
    global $wpdb;
    $lista="";
    $query ="SELECT RPORDER_NUMERO_SOL, P.MPERSON_LEGAL_NAME, P.MPERSON_TYPE_DOC, P.MPERSON_IDENTF ,DATE_FORMAT(RPORDER_ACTIVITY_DATE, '%Y-%m-%d') FECHA_PORDER, MDC.MPERSON_LEGAL_NAME as NOMBRE_CENTRO
                FROM REQUEST
                INNER JOIN PATIENT AS P ON P.MPERSON_ID = REQUEST_PATIENT_PERSON_ID
                INNER JOIN RPORDER AS RPO ON RPO.RPORDER_REQUEST_ID = REQUEST_ID
                INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID = REQUEST_MDCENTER_ID_CONCERNING
                GROUP BY RPORDER_NUMERO_SOL ORDER BY RPORDER_NUMERO_SOL DESC;";

    $lista .= '
                            <table id="listaPorder" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Número Pre-Orden</th>
                                <th>Nombre Paciente</th>
                                <th>Tipo Documento</th>
                                <th>Número Identidad</th>
                                <th>Centro Referente</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    foreach( $wpdb->get_results($query) as $key => $row){

        $lista .= "<tr>\n";
        $lista .= '<td>'.$row->RPORDER_NUMERO_SOL."</td>\n";
        $lista .= '<td>'.$row->MPERSON_LEGAL_NAME."</td>\n";
        $lista .= '<td>'.$row->MPERSON_TYPE_DOC."</td>\n";
        $lista .= '<td>'.$row->MPERSON_IDENTF."</td>\n";
        $lista .= '<td>'.$row->NOMBRE_CENTRO."</td>\n";
        $lista .= '<td>'.$row->FECHA_PORDER."</td>\n";
        $lista .= "</tr>\n";
    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>Número Pre-Orden</th>
                                <th>Nombre Paciente</th>
                                <th>Tipo Documento</th>
                                <th>Número Identidad</th>
                                <th>Centro Referente</th>
                                 <th>Fecha</th>
                            </tr>
                            </tfoot>
                        </table>
    ';


    return $lista;
}
?>