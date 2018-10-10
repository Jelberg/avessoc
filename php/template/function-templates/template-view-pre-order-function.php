<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


    <script languaje="javascript">
        var idRporde=Array();
        var precio = Array();
        var arrayRespuesta= Array();

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

        <?php
            infoPaciente();
            llenaArrays();
        ?>

        /**
         * Funcion carga la informacion del paciente en el html
         */
        function cargaInformacionPaciente() {
            document.getElementById("legal-name").value=nombreLegal ;
            document.getElementById("identificacion").value= tipoDoc.concat(" ").concat(numeroDoc);
            document.getElementById("edad").value= edad;
            document.getElementById("solicitante").value= nombreCentro ;
            document.getElementById("procedencia").value= origen;
            //document.getElementById("causa").value= ;
            document.getElementById("peso").value= peso;
            document.getElementById("poncentaje").value= porcentaje;
            document.getElementById("convivencia").value= numHabitantes;
            document.getElementById("ingreso").value= ingreso;
            document.getElementById("condicion").value= condicion;
            if (tipoFamilia == '0'){
                document.getElementById("tipo").value= otroTipo;
            }else document.getElementById("tipo").value= tipoFamilia;
            document.getElementById("g-1").value= g1;
            document.getElementById("g-2").value= g2;
            document.getElementById("g-3").value= g3;
            document.getElementById("g-4").value= g4;
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
            var count=0; //Variable para tener id y nombre único

            /**
             * Se serializan los datos para mandarlos por ajax
             * */
            $('#submit-porden').click( function() {
                var data = table.$('select').serialize();
                $.post("<?php echo PATH_PAG_ADD_PRE_ORDEN;?>" ,
                    {
                        datos:data,
                    });
                return true;
            });


        });

        /**
         *
         *Funcion calcula el total de la order
         * @param precio a sumar
         * @param comando a ejecutar
         * @param id de rporder
         */
        function adiereAlTotal(precio,comando,id) {
            var longitud =  arrayRespuesta.length;
            var total = document.getElementById("total").value;
            for(i=0; i < longitud ; i++){
                console.log(comando);
                if (idRporde[i] == id){
                    var respuesta = arrayRespuesta[i]; // guarda el ultimo valor del status
                    arrayRespuesta[i]= comando; // actualiza el status en el arreglo
                    if (comando=='APR'){
                        document.getElementById("total").value = parseFloat(total) + parseFloat(precio);
                    }
                    if (comando =='REC'){ //Varia en 2 casos dependiendo el ultimo estatus
                        if (respuesta == 'APR'){  // SI anteriormente estaba aprobado se resta
                            document.getElementById("total").value = parseFloat(total) - parseFloat(precio);
                        }
                    }
                    if (comando =='PEN'){
                        if (respuesta == 'APR'){
                            document.getElementById("total").value = parseFloat(total) - parseFloat(precio);
                        }
                    }

                }

            }
        }



    </script>

</head>
<body>

</body>
</html>



<?php



/**
 * Funcion trae la informacion del usuario para mostrar en la pre-orden
 */
function infoPaciente(){
    global $wpdb;
    $g1="";
    $g2="";
    $g3="";
    $g4="";
    $causa="";
    $query = "SELECT P.MPERSON_LEGAL_NAME,TIMESTAMPDIFF(YEAR,P.MPERSON_BIRTH,CURDATE()) AS EDAD, P.MPERSON_TYPE_DOC, P.MPERSON_IDENTF, REQUEST_GRAFFAR_PORCTG, 
    `REQUEST_GRAFFAR_ONE`,`REQUEST_GRAFFAR_TWO`, `REQUEST_GRAFFAR_THREE`, `REQUEST_GRAFFAR_FOUR`,`REQUEST_FAMILY_TYPE`,`REQUEST_FAMILY_OTHER`, MDC.MPERSON_LEGAL_NAME as CENTRO,
    `REQUEST_WEIGHT`,`REQUEST_INHABITANTS_NUMB`, `REQUEST_AVERAGE_INCOME`, `REQUEST_ORIGIN`, `REQUEST_CAUSE_EXAM`,REQUEST_LOBORAL_COND,`REQUEST_ID`,P.MPERSON_ID
    FROM REQUEST 
    INNER JOIN PATIENT AS P ON P.MPERSON_ID = `REQUEST_PATIENT_PERSON_ID` 
    INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID = REQUEST_MDCENTER_ID_CONCERNING 
    WHERE P.MPERSON_ID=3 ORDER BY REQUEST_ID DESC LIMIT 1";

    foreach ($wpdb->get_results($query) as $key => $row) {
        echo 'nombreLegal="' . $row->MPERSON_LEGAL_NAME . '"'.";\n";
        echo 'edad="' . $row->EDAD . '"'.";\n";
        echo 'tipoDoc="' . $row->MPERSON_TYPE_DOC . '"'.";\n";
        echo 'numeroDoc="' . $row->MPERSON_IDENTF . '"'.";\n";
        echo 'porcentaje="' . $row->REQUEST_GRAFFAR_PORCTG . '"'.";\n";
        $g1=$row->REQUEST_GRAFFAR_ONE;
        $g2=$row->REQUEST_GRAFFAR_TWO;
        $g3=$row->REQUEST_GRAFFAR_THREE;
        $g4=$row->REQUEST_GRAFFAR_FOUR;
        $causa = $row->REQUEST_CAUSE_EXAM;
        echo 'tipoFamilia="' . $row->REQUEST_FAMILY_TYPE . '"'.";\n";
        echo 'otroTipo="' . $row->REQUEST_FAMILY_OTHER . '"'.";\n";
        echo 'ingreso="' . $row->REQUEST_AVERAGE_INCOME . '"'.";\n";
        echo 'numHabitantes="' . $row->REQUEST_INHABITANTS_NUMB . '"'.";\n";
        echo 'nombreCentro="' . $row->CENTRO . '"'.";\n";
        echo 'origen="' . $row->REQUEST_ORIGIN . '"'.";\n";
        echo 'peso="' . $row->REQUEST_WEIGHT . '"'.";\n";
        echo 'condicion="' . $row->REQUEST_LOBORAL_COND . '"'.";\n";
    }
    // Trae las respuestas de las preguntas de clasificacion graffar
    $query_g1="SELECT `ANSWER_DESC` FROM `ANSWER` WHERE `ANSWER_VALUE` = ".$g1." and `ANSWER_QUESTION_ID`=1";
    $query_g2="SELECT `ANSWER_DESC` FROM `ANSWER` WHERE `ANSWER_VALUE` = ".$g2." and `ANSWER_QUESTION_ID`=2";
    $query_g3="SELECT `ANSWER_DESC` FROM `ANSWER` WHERE `ANSWER_VALUE` = ".$g3." and `ANSWER_QUESTION_ID`=3";
    $query_g4="SELECT `ANSWER_DESC` FROM `ANSWER` WHERE `ANSWER_VALUE` = ".$g4." and `ANSWER_QUESTION_ID`=4";

        echo 'g1="'.$wpdb->get_var($query_g1).'"'.";\n";
        echo 'g2="'.$wpdb->get_var($query_g2).'"'.";\n";
        echo 'g3="'.$wpdb->get_var($query_g3).'"'.";\n";
        echo 'g4="'.$wpdb->get_var($query_g4).'"'.";\n";

        //Consulta para traer la respuesta de la causa
    $query_causa="SELECT DISIEASE_DESC FROM `DISIEASE` WHERE `DISIEASE_ID` =".$causa;

        echo 'causa="'.$wpdb->get_var($query_causa).'"'.";\n";

}


/**
 * Llena la tabla de los exames de la pre-orden realizada
 * @return string
 */
function llenaTablaExamenes(){
    $query ="SELECT `RPORDER_STATUS`, MDC.MPERSON_LEGAL_NAME, E.EXAM_DESC, `RPORDER_ID`, RCE.RCENTEREXAM_ID,`RPORDER_NUMERO_SOL`, RCE.RCENTEREXAM_PRICE 
            FROM `RPORDER` 
            INNER JOIN RCENTEREXAM AS RCE ON RCE.RCENTEREXAM_ID =`RPORDER_CE_ID` 
            INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID = RCE.RCENTEREXAM_MDCENTER_PERSON_ID 
            INNER JOIN EXAM AS E ON E.EXAM_ID= RCE.RCENTEREXAM_EXAM_ID 
            INNER JOIN REQUEST AS R ON R.REQUEST_ID=`RPORDER_REQUEST_ID` 
            WHERE 
            `RPORDER_NUMERO_SOL` = (SELECT `RPORDER_NUMERO_SOL` FROM RPORDER WHERE `REQUEST_PATIENT_PERSON_ID` = 3 ORDER BY RPORDER_NUMERO_SOL DESC LIMIT 1)";

    $lista="";
    $lista .= '
    
    <table id="examenes" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Nombre del Examen</th>
                                <th>Centro donde se realizará el examen</th>
                                <th>Estatus</th>
                            </tr>
                            </thead>
                            <tbody>
    ';
    global $wpdb;
    $i=0;
    foreach ($wpdb->get_results($query) as $key => $row){

        $lista .= "<tr>\n";
        $lista .= '<td>'.$row->EXAM_DESC."</td>\n";
        $lista .= '<td>'.$row->MPERSON_LEGAL_NAME."</td>\n";
        $lista .= '<td>
            <select id="estado-actual'.$row->RPORDER_ID.'" name="estado-actual'.$row->RPORDER_ID.'" onchange="adiereAlTotal('.$row->RCENTEREXAM_PRICE.',this.value,'.$row->RPORDER_ID.')">
                <option selected="true" value="'.$row->RPORDER_STATUS.'">'.devuelveValorSelect($row->RPORDER_STATUS).'</option>
                '.retornaRestolista($row->RPORDER_STATUS).'
            </select>
            '."</td>\n";
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
 * Funcion llena los arreglos para los precios y las aprobaciones de los examens
 */
function llenaArrays(){
    $query ='SELECT `RPORDER_ID`, RCE.RCENTEREXAM_PRICE, RPORDER_STATUS
            FROM `RPORDER` 
            INNER JOIN RCENTEREXAM AS RCE ON RCE.RCENTEREXAM_ID =`RPORDER_CE_ID` 
            INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID = RCE.RCENTEREXAM_MDCENTER_PERSON_ID 
            INNER JOIN EXAM AS E ON E.EXAM_ID= RCE.RCENTEREXAM_EXAM_ID 
            INNER JOIN REQUEST AS R ON R.REQUEST_ID=`RPORDER_REQUEST_ID` 
            WHERE 
            `RPORDER_NUMERO_SOL` = (SELECT `RPORDER_NUMERO_SOL` FROM RPORDER WHERE `REQUEST_PATIENT_PERSON_ID` = 3 ORDER BY RPORDER_NUMERO_SOL DESC LIMIT 1)';
    global $wpdb;
    $i=0;
    foreach ($wpdb->get_results($query) as $key => $row){

        echo 'idRporde['.$i.']="'.$row->RPORDER_ID.'"'.";\n";
        echo 'precio['.$i.']='.$row->RCENTEREXAM_PRICE.";\n";  //Precio no lleva comillas
        echo 'arrayRespuesta['.$i.']="'.$row->RPORDER_STATUS.'"'.";\n";

        $i = $i +1;
    }
}

/**
 * Funcion devuelve el valor del select
 */
function devuelveValorSelect($valor){
    if ($valor == 'PEN'){
        return "Pendiente";
    }else if($valor == 'APR'){
        return "Aprovado";
    }else return "Rechazado";
}

/**
 * funcion Retorna el resto de la lista
 */
function retornaRestolista($valor){
    $opcion="";
    if ($valor == 'PEN'){
        $opcion .= '<option value="APR">Aprobado</option>
                <option value="REC">Rechazado</option>';
    }else if($valor == 'APR'){
        $opcion .= '<option value="PEN">Pendiente</option>
                <option value="REC">Rechazado</option>';
    }else {
        $opcion .= '<option value="PEN">Pendiente</option>
                <option value="APR">Aprobado</option>';
    }

    return $opcion;
}


?>