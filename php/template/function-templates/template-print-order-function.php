<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script language="JavaScript">

        var nombre="";
        var fechaNac="";
        var edad="";
        var centroReferido="";
        var numeroOrden="";
        var peso="";
        var tipoDoc="";
        var numeroDoc="";
        var financiado="";
        var pagar ="";
        var referente="";
        var causa="";
        var totaltotal="";
        var graffar="";
        var sponsor="";

        <?php
        llenaDatosOrden();
        totalpagar();
        ?>

        function cargaDatosOrden(){
            document.getElementById("nombre").value = nombre;
            document.getElementById("edad").value = edad;
            document.getElementById("peso").value = peso ;
            document.getElementById("identificacion").value = tipoDoc+" "+numeroDoc;
            document.getElementById("fechaNac").value = fechaNac;
            document.getElementById("totalfinanciado").value = financiado;
            document.getElementById("total").value = pagar;
            document.getElementById("orden").value = "Orden # "+numeroOrden;
            document.getElementById("referente").value = referente;
            document.getElementById("referido").value =centroReferido ;
            document.getElementById("causa").value =causa ;
            document.getElementById("totaltotal").value =totaltotal ;
            document.getElementById("graffar").value ="Usted esta siendo beneficiado por el Fondo Solidario de AVESSOC son el "+graffar+"% del costo total" ;
            document.getElementById("sponsor").value ="Este descuento que esta recibiendo es gracias a: "+sponsor ;
        }

        $(document).ready(function() {
            $('#ordenExamenes').DataTable( {
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
                "searching": false,
                "paging":   false,
                "ordering": false,
                "info":     false
            });

        } );

    </script>
</head>
<body>
</body>
</html>

<?php

/**
 * Funcion devuelve la diferencia a pagar por el paciente
 * @param $montoinicial
 * @param $sustraendo
 * @return mixed
 */
function diferencia($montoinicial, $sustraendo){
    $resto = $montoinicial -  $sustraendo;
    return $resto;
}

/**
 * Funcion llena la lista de examenes de la orden del paciente, los cuales son aprobados
 * @return string
 */
function llenaListaExamenes(){
    global $wpdb;
    $lista="";

    $lista .= '
    <table id="ordenExamenes" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Examen</th>
                                <th>Costo</th>
                                <th>Porcentaje</th>
                                <th>Monto Financiado</th>
                                <th>Monto a Pagar</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    $query ="SELECT EXAM_DESC, PO.RPORDER_EXAM_PRICE, O.ORDER_GRAFFAR, (PO.RPORDER_EXAM_PRICE*O.ORDER_GRAFFAR)/100 AS FINANCIADO, MC.MPERSON_LEGAL_NAME
FROM EXAM
INNER JOIN RCENTEREXAM AS RC ON RC.RCENTEREXAM_EXAM_ID= EXAM_ID
INNER JOIN RPORDER AS PO ON PO.RPORDER_CE_ID = RC.RCENTEREXAM_ID
INNER JOIN ORD AS  O ON O.ORDER_ID = PO.RPORDER_ORDER_ID
INNER JOIN MDCENTER AS MC ON MC.MPERSON_ID=RC.RCENTEREXAM_MDCENTER_PERSON_ID
WHERE 
PO.RPORDER_STATUS = 'APR' AND ORDER_ID = ".$_GET['norden']." AND MC.MPERSON_ID= ".$_GET['centro'];

    foreach( $wpdb->get_results($query) as $key => $row) {

        $lista .= "<tr>\n";
        $lista .= '<td>'.$row->EXAM_DESC."</td>\n";
        $lista .= '<td>'.$row->RPORDER_EXAM_PRICE."</td>\n";
        $lista .= '<td>'.$row->ORDER_GRAFFAR."</td>\n";
        $lista .= '<td>'.$row->FINANCIADO."</td>\n";
        $lista .= '<td>'.diferencia($row->RPORDER_EXAM_PRICE,$row->FINANCIADO)."</td>\n";
        $lista .= "</tr>\n";

    }

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                            <tr>
                                <th>Examen</th>
                                <th>Costo</th>
                                <th>Porcentaje</th>
                                <th>Monto Financiado</th>
                                <th>Monto a Pagar</th>
                            </tr>
                            </tfoot>
                        </table>
    ';
    return $lista;

}

/**
 * Funcion busca los datos en la base de datos para implimir la orden
 */
function llenaDatosOrden(){
    $query ="SELECT ORDER_ID, PA.MPERSON_LEGAL_NAME, PA.MPERSON_TYPE_DOC, PA.MPERSON_IDENTF, PA.MPERSON_BIRTH, R.REQUEST_CAUSE_EXAM,TIMESTAMPDIFF(YEAR,PA.MPERSON_BIRTH,CURDATE()) AS EDAD, PO.RPORDER_NUMERO_SOL, R.REQUEST_MDCENTER_ID_CONCERNING, MDC.MPERSON_LEGAL_NAME AS CENTRO,R.REQUEST_WEIGHT,ORDER_SPONSOR_PERSON_ID, ORDER_GRAFFAR
                FROM `ORD`
                INNER JOIN RPORDER AS PO ON PO.RPORDER_ORDER_ID=ORDER_ID
                INNER JOIN REQUEST AS R ON R.REQUEST_ID = PO.RPORDER_REQUEST_ID
                INNER JOIN PATIENT AS PA ON PA.MPERSON_ID = R.REQUEST_PATIENT_PERSON_ID
                
                INNER JOIN RCENTEREXAM AS RC ON RC.RCENTEREXAM_ID = PO.RPORDER_CE_ID
                INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID =  RC.RCENTEREXAM_MDCENTER_PERSON_ID
                WHERE 
                R.REQUEST_PATIENT_PERSON_ID = PO.REQUEST_PATIENT_PERSON_ID
                AND ORDER_ID =".$_GET['norden'];
    global $wpdb;
    $referente ="";
    $causasExamen ="";
    $idsponsor="";

    foreach($wpdb->get_results($query) as $key => $row){
        echo 'nombre="'.$row->MPERSON_LEGAL_NAME.'";'."\n";
        echo 'fechaNac="'.$row->MPERSON_BIRTH.'";'."\n";
        echo 'edad="'.$row->EDAD.'";'."\n";
        echo 'centroReferido="'.$row->CENTRO.'";'."\n";
        echo 'numeroOrden="'.$row->ORDER_ID.'";'."\n";
        echo 'peso="'.$row->REQUEST_WEIGHT.'";'."\n";
        echo 'tipoDoc="'.$row->MPERSON_TYPE_DOC.'";'."\n";
        echo 'numeroDoc="'.$row->MPERSON_IDENTF.'";'."\n";
        $referente = $row->REQUEST_MDCENTER_ID_CONCERNING;
        $causasExamen= $row->REQUEST_CAUSE_EXAM;
        $idsponsor= $row->ORDER_SPONSOR_PERSON_ID;
        echo 'graffar="'.$row->ORDER_GRAFFAR.'";'."\n";

    }
    $centro = $wpdb->get_var("SELECT MPERSON_LEGAL_NAME FROM MDCENTER WHERE MPERSON_ID=".$referente);
    echo 'referente="'.$centro.'";'."\n";
    $respuestaCausa = $wpdb->get_var("SELECT DISIEASE_DESC FROM DISIEASE WHERE DISIEASE_ID=".$causasExamen);
    echo 'causa="'.$respuestaCausa.'";'."\n";
    $namesponsor= $wpdb->get_var("SELECT MPERSON_LEGAL_NAME FROM SPONSOR WHERE MPERSON_ID=".$idsponsor);
    echo 'sponsor="'.$namesponsor.'";'."\n";

}

/**
 * Funcion devuelve los valores de monto financiado y monto a pagar
 */
function totalpagar(){
    $query="SELECT SUM(PO.RPORDER_EXAM_PRICE*O.ORDER_GRAFFAR)/100 AS FINANCIADO, SUM(PO.RPORDER_EXAM_PRICE) AS TOTAL
FROM EXAM
INNER JOIN RCENTEREXAM AS RC ON RC.RCENTEREXAM_EXAM_ID= EXAM_ID
INNER JOIN RPORDER AS PO ON PO.RPORDER_CE_ID = RC.RCENTEREXAM_ID
INNER JOIN ORD AS  O ON O.ORDER_ID = PO.RPORDER_ORDER_ID
INNER JOIN MDCENTER AS MC ON MC.MPERSON_ID=RC.RCENTEREXAM_MDCENTER_PERSON_ID
WHERE 
PO.RPORDER_STATUS = 'APR' AND ORDER_ID = ".$_GET['norden']." AND MC.MPERSON_ID= ".$_GET['centro'];

    global $wpdb;
    foreach ($wpdb->get_results($query) as $key => $row){
        echo 'financiado="'.$row->FINANCIADO.'";'."\n";
        $final = ($row->TOTAL) - ($row->FINANCIADO);
        echo 'pagar="'.$final.'";'."\n";
        echo 'totaltotal="'.$row->TOTAL.'";'."\n";
    }

}

?>