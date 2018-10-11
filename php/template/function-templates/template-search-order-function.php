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
            var table = $('#listaorder').DataTable( {
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

        /**
         * Redirecciona a la pagina especifica
         * @param num
         */
        function ref(num){
            window.location.href = '<?php echo PATH_PAG_LOAD_ORDEN;?>'.concat('?norden=').concat(num);
        }

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
function llenaListaOrdenes(){
    global $wpdb;
    $lista="";
    $query ="SELECT ORDER_ID, P.MPERSON_LEGAL_NAME, P.MPERSON_TYPE_DOC, P.MPERSON_IDENTF,ORDER_ACTIVITY_DATE, PO.RPORDER_NUMERO_SOL 
                FROM `ORD`
                INNER JOIN RPORDER AS PO ON PO.RPORDER_ORDER_ID=ORDER_ID
                INNER JOIN REQUEST AS R ON R.REQUEST_ID = PO.RPORDER_REQUEST_ID
                INNER JOIN PATIENT AS P ON P.MPERSON_ID = R.REQUEST_PATIENT_PERSON_ID
                WHERE 
                R.REQUEST_PATIENT_PERSON_ID = PO.REQUEST_PATIENT_PERSON_ID 
                GROUP BY PO.RPORDER_NUMERO_SOL";

    $lista .= '
                            <table id="listaorder" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Orden #</th>
                                <th>Paciente</th>
                                <th>T. Documento</th>
                                <th>Número Identidad</th>
       
                                <th>Fecha</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    foreach( $wpdb->get_results($query) as $key => $row){

        $lista .= "<tr>\n";
        $lista .= '<td>'.$row->ORDER_ID."</td>\n";
        $lista .= '<td>'.$row->MPERSON_LEGAL_NAME."</td>\n";
        $lista .= '<td>'.$row->MPERSON_TYPE_DOC."</td>\n";
        $lista .= '<td>'.$row->MPERSON_IDENTF."</td>\n";

        $lista .= '<td>'.$row->ORDER_ACTIVITY_DATE."</td>\n
                    <td>
                    <a id='verporden' name='verporden' onclick='ref(".$row->ORDER_ID.")' ><i style='background: dodgerblue; width: 35px; height: 30px; color: white; text-align: center' class='fa fa-eye fa-2x'></i></a>
          
                    </td>\n";
        $lista .= "</tr>\n";
    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>Orden #</th>
                                <th>Paciente</th>
                                <th>T. Documento</th>
                                <th>Número Identidad</th>
                       
                                 <th>Fecha</th>
                                 <th>Acción</th>
                            </tr>
                            </tfoot>
                        </table>
    ';


    return $lista;
}
?>