
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
        var g1="";
        var g2="";
        var g3="";
        var g4="";
        var tipoFamilia="";
        var otroTipo="";
        var ingreso="";
        var numHabitantes="";
        var nombreCentro="";
        var origen="";
        var causa="";
        var condicion="";
        var peso="";


        /**
         * Funcion carga la informacion del paciente en el html
         */
        function cargaInformacionOrden() {
            document.getElementById("legal-name").value=nombreLegal ;
            document.getElementById("identificacion").value= tipoDoc.concat(" ").concat(numeroDoc);
            document.getElementById("edad").value= edad;
            document.getElementById("solicitante").value= nombreCentro ;
            document.getElementById("peso").value= peso;
            document.getElementById("poncentaje").value= porcentaje;
            document.getElementById("causa").value= causa;
        }

        /**
         * Seccion para manejar el datatable
         * */
        $(document).ready(function() {
            var table = $('#examenes').DataTable({
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



    </script>

</head>
<body>

</body>
</html>



<?php


/**
 * Llena la tabla de los exames de la pre-orden realizada
 * @return string
 */
function llenaTablaExamenes(){
    global $wpdb;

    $query ="SELECT ORDER_ID, P.MPERSON_LEGAL_NAME, P.MPERSON_TYPE_DOC, P.MPERSON_IDENTF,ORDER_ACTIVITY_DATE,  TIMESTAMPDIFF(YEAR,P.MPERSON_BIRTH,CURDATE()) AS EDAD, ORDER_GRAFFAR, R.REQUEST_WEIGHT, MDC.MPERSON_LEGAL_NAME AS CENTRO, E.EXAM_DESC, RC.RCENTEREXAM_PRICE, ORDER_TOTAL_EXAM,R.REQUEST_CAUSE_EXAM
            FROM `ORD` 
            INNER JOIN RPORDER AS PO ON PO.RPORDER_ORDER_ID=ORDER_ID
            INNER JOIN REQUEST AS R ON R.REQUEST_ID = PO.RPORDER_REQUEST_ID
            INNER JOIN PATIENT AS P ON P.MPERSON_ID = R.REQUEST_PATIENT_PERSON_ID
            INNER JOIN RCENTEREXAM AS RC ON RC.RCENTEREXAM_ID = PO.RPORDER_CE_ID
            INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID=RC.RCENTEREXAM_MDCENTER_PERSON_ID
            INNER JOIN EXAM AS E ON E.EXAM_ID = RC.RCENTEREXAM_EXAM_ID
            WHERE 
            R.REQUEST_PATIENT_PERSON_ID = PO.REQUEST_PATIENT_PERSON_ID AND ORDER_ID = 9 =";

    $lista="";
    $lista .= '
    
    <table id="examenes" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Nombre del Examen</th>
                                <th>Centro donde se realizará el examen</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    $i=0;
    foreach ($wpdb->get_results($query) as $key => $row){

        $lista .= "<tr>\n";
        $lista .= '<td>'.$row->EXAM_DESC."</td>\n";
        $lista .= '<td>'.$row->CENTRO."</td>\n";
        $lista .= "</tr>\n";


    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre del Examen</th>
                                <th>Centro donde se realizará el examen</th>
                            </tr>
                            </tfoot>
                        </table>
    ';
    return $lista;

}

/**
 * Funcion llena los arreglos para los precios y las aprobaciones de los examens
 */
function llenaArrays(){
    global $wpdb;
    $queryIdPac ="SELECT REQUEST_PATIENT_PERSON_ID 
                    FROM RPORDER
                    WHERE RPORDER_NUMERO_SOL = ".$_GET['numporden']." LIMIT 1";

    $id = $wpdb->get_var($queryIdPac);

    $query ='SELECT `RPORDER_ID`, RCE.RCENTEREXAM_PRICE, RPORDER_STATUS
            FROM `RPORDER` 
            INNER JOIN RCENTEREXAM AS RCE ON RCE.RCENTEREXAM_ID =`RPORDER_CE_ID` 
            INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID = RCE.RCENTEREXAM_MDCENTER_PERSON_ID 
            INNER JOIN EXAM AS E ON E.EXAM_ID= RCE.RCENTEREXAM_EXAM_ID 
            INNER JOIN REQUEST AS R ON R.REQUEST_ID=`RPORDER_REQUEST_ID` 
            WHERE 
            `RPORDER_NUMERO_SOL` = (SELECT `RPORDER_NUMERO_SOL` FROM RPORDER WHERE `REQUEST_PATIENT_PERSON_ID` = '.$id.' ORDER BY RPORDER_NUMERO_SOL DESC LIMIT 1)';

    $i=0;
    foreach ($wpdb->get_results($query) as $key => $row){

        echo 'idRporde['.$i.']="'.$row->RPORDER_ID.'"'.";\n";
        echo 'precio['.$i.']='.$row->RCENTEREXAM_PRICE.";\n";  //Precio no lleva comillas
        echo 'arrayRespuesta['.$i.']="'.$row->RPORDER_STATUS.'"'.";\n";

        $i = $i +1;
    }
}



?>