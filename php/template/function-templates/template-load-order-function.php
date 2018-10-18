<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


    <script languaje="javascript">

        var nombreLegal="";
        var edad="";
        var tipoDoc="";
        var numeroDoc="";
        var porcentaje="";

        var sponsor ="";
        var causa="";
        var peso="";

        <?php
        llenaDatos();
        ?>

        /**
         * Funcion carga la informacion del paciente en el html
         */
        function cargaInformacionOrden() {
            document.getElementById("legal-name").value=nombreLegal ;
            document.getElementById("identificacion").value= tipoDoc.concat(" ").concat(numeroDoc);
            document.getElementById("edad").value= edad;
            document.getElementById("sponsor").value= sponsor ;
            document.getElementById("peso").value= peso;
            document.getElementById("porc").value= porcentaje;
            document.getElementById("causa").value= causa;
        }

        /**
         * Seccion para manejar el datatable
         * */
        $(document).ready(function() {
            var table = $('table.display').DataTable({
                "language": {
                    "loadingRecords": "Cargando...",
                    "decimal": ",",
                    "thousands": ".",
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ entradas ",
                    "zeroRecords": "La lista esta vacía",
                    "search": "Buscar:",
                    "info": "pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "paginate": {
                        "first": "Primera",
                        "last": "Ultima",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "searching": false,
                "paging":   false,
                "ordering": false,
                "info":     false
            });


        });

        function verordencentro(idcentro,numeroorden){
            window.location.href = "<?php echo PATH_PAG_PRINT_ORDER?>".concat("?centro=").concat(idcentro).concat("&norden=").concat(numeroorden);
        }

    </script>

</head>
<body>

</body>
</html>


<?php
/**
 * Funcion evuelve el status legible para el usurio
 * @param $st
 * @return string
 */
function devuelveStatusLegible($st){
    if($st=='APR'){
        return "Aprobado";
    }else if($st=='REC'){
        return "Rechazado";
    }
}


/**
 * Llena la tabla de los exames de la pre-orden realizada
 * @return string
 */
function llenaTablaExamenes(){
    global $wpdb;

    $query ="SELECT ORDER_ID, P.MPERSON_LEGAL_NAME, P.MPERSON_TYPE_DOC, P.MPERSON_IDENTF,ORDER_ACTIVITY_DATE, PO.RPORDER_STATUS,  TIMESTAMPDIFF(YEAR,P.MPERSON_BIRTH,CURDATE()) AS EDAD, ORDER_GRAFFAR, R.REQUEST_WEIGHT, MDC.MPERSON_LEGAL_NAME AS CENTRO, E.EXAM_DESC, RC.RCENTEREXAM_PRICE, ORDER_TOTAL_EXAM,R.REQUEST_CAUSE_EXAM, S.MPERSON_LEGAL_NAME AS SPONSOR
            FROM `ORD` 
            INNER JOIN RPORDER AS PO ON PO.RPORDER_ORDER_ID=ORDER_ID
            INNER JOIN REQUEST AS R ON R.REQUEST_ID = PO.RPORDER_REQUEST_ID
            INNER JOIN PATIENT AS P ON P.MPERSON_ID = R.REQUEST_PATIENT_PERSON_ID
            INNER JOIN RCENTEREXAM AS RC ON RC.RCENTEREXAM_ID = PO.RPORDER_CE_ID
            INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID=RC.RCENTEREXAM_MDCENTER_PERSON_ID
            INNER JOIN EXAM AS E ON E.EXAM_ID = RC.RCENTEREXAM_EXAM_ID
            INNER JOIN SPONSOR AS S ON S.MPERSON_ID = ORDER_SPONSOR_PERSON_ID
            WHERE 
            R.REQUEST_PATIENT_PERSON_ID = PO.REQUEST_PATIENT_PERSON_ID AND ORDER_ID = ".$_GET['norden'];

    $lista="";
    $lista .= '
    
    <table id="" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Nombre del Examen</th>
                                <th>Centro donde se realizará el examen</th>
                                <th>Estatus</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    $i=0;
    foreach ($wpdb->get_results($query) as $key => $row){

        $lista .= "<tr>\n";
        $lista .= '<td>'.$row->EXAM_DESC."</td>\n";
        $lista .= '<td>'.$row->CENTRO."</td>\n";
        $lista .= '<td>'.devuelveStatusLegible($row->RPORDER_STATUS)."</td>\n";
        $lista .= "</tr>\n";


    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre del Examen</th>
                                <th>Centro donde se realizará el examen</th>
                                <th>Estatus</th>
                            </tr>
                            </tfoot>
                        </table>
    ';
    return $lista;

}

/**
 * Funcion llena los datos para mostrar la informacion del paciente
 */
function llenaDatos(){
    global $wpdb;

    $query ='SELECT ORDER_ID, P.MPERSON_LEGAL_NAME, P.MPERSON_TYPE_DOC, P.MPERSON_IDENTF,ORDER_ACTIVITY_DATE,  TIMESTAMPDIFF(YEAR,P.MPERSON_BIRTH,CURDATE()) AS EDAD, ORDER_GRAFFAR, R.REQUEST_WEIGHT, MDC.MPERSON_LEGAL_NAME AS CENTRO, E.EXAM_DESC, RC.RCENTEREXAM_PRICE, ORDER_TOTAL_EXAM,R.REQUEST_CAUSE_EXAM, S.MPERSON_LEGAL_NAME AS SPONSOR
            FROM `ORD` 
            INNER JOIN RPORDER AS PO ON PO.RPORDER_ORDER_ID=ORDER_ID
            INNER JOIN REQUEST AS R ON R.REQUEST_ID = PO.RPORDER_REQUEST_ID
            INNER JOIN PATIENT AS P ON P.MPERSON_ID = R.REQUEST_PATIENT_PERSON_ID
            INNER JOIN RCENTEREXAM AS RC ON RC.RCENTEREXAM_ID = PO.RPORDER_CE_ID
            INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID=RC.RCENTEREXAM_MDCENTER_PERSON_ID
            INNER JOIN EXAM AS E ON E.EXAM_ID = RC.RCENTEREXAM_EXAM_ID
            INNER JOIN SPONSOR AS S ON S.MPERSON_ID = ORDER_SPONSOR_PERSON_ID
            WHERE 
            R.REQUEST_PATIENT_PERSON_ID = PO.REQUEST_PATIENT_PERSON_ID AND ORDER_ID = '.$_GET['norden'];

    $i=0;
    $causa = "";
    foreach ($wpdb->get_results($query) as $key => $row){

        echo 'nombreLegal="'.$row->MPERSON_LEGAL_NAME.'"'.";\n";
        echo 'edad='.$row->EDAD.";\n";  //Precio no lleva comillas
        echo 'tipoDoc="'.$row->MPERSON_TYPE_DOC.'"'.";\n";
        echo 'numeroDoc="'.$row->MPERSON_IDENTF.'"'.";\n";
        echo 'porcentaje="'.$row->ORDER_GRAFFAR.'"'.";\n";
        //echo 'causa="'.$row->RPORDER_STATUS.'"'.";\n";
        echo 'peso="'.$row->REQUEST_WEIGHT.'"'.";\n";
        echo 'sponsor="'.$row->SPONSOR.'"'.";\n";
        $causa = $row->REQUEST_CAUSE_EXAM;

    }

    $res = $wpdb->get_var("SELECT DISIEASE_DESC FROM DISIEASE WHERE DISIEASE_ID =".$causa);
    echo 'causa="'.$res.'"'.";\n";

}


/**
 * lLENA LA LISTA DE LOS CENTROS DE SALUD QUE VAN A REALIZAR LOS EXAMENES
 * @return string
 */
function llenaTablas(){
    global $wpdb;

    $query ="SELECT MDC.MPERSON_ID, MDC.MPERSON_LEGAL_NAME
            FROM `ORD` 
            INNER JOIN RPORDER AS PO ON PO.RPORDER_ORDER_ID=ORDER_ID
            INNER JOIN REQUEST AS R ON R.REQUEST_ID = PO.RPORDER_REQUEST_ID
            INNER JOIN PATIENT AS P ON P.MPERSON_ID = R.REQUEST_PATIENT_PERSON_ID
            INNER JOIN RCENTEREXAM AS RC ON RC.RCENTEREXAM_ID = PO.RPORDER_CE_ID
            INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID=RC.RCENTEREXAM_MDCENTER_PERSON_ID
            INNER JOIN EXAM AS E ON E.EXAM_ID = RC.RCENTEREXAM_EXAM_ID
            INNER JOIN SPONSOR AS S ON S.MPERSON_ID = ORDER_SPONSOR_PERSON_ID
            WHERE 
            R.REQUEST_PATIENT_PERSON_ID = PO.REQUEST_PATIENT_PERSON_ID AND ORDER_ID =".$_GET['norden']."
            GROUP BY MDC.MPERSON_ID ";

    $lista="";
    $lista .= '
    
    <table id="" class="display" style="width:100%; text-align: center;" >
                            <thead>
                            <tr>
                                <th>Nombre del Centro</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    $i=0;
    foreach ($wpdb->get_results($query) as $key => $row){

        $lista .= "<tr>\n";
        $lista .= '<td>'.$row->MPERSON_LEGAL_NAME."</td>\n";
        $lista .= '<td><button onclick="verordencentro('.$row->MPERSON_ID.','.$_GET['norden'].')">Ver Orden</button> '."</td>\n";
        $lista .= "</tr>\n";


    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre del Centro</th>
                                <th>Accion</th>
                            </tr>
                            </tfoot>
                        </table>
    ';
    return $lista;

}



?>