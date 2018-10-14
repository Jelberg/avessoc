<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <?php
        registraOreden();
    ?>

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
            $arrayIdPHP = array();
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
            $('#submit-orden').click( function() {
                var long = idRporde.length;
                var sum = 0;
                for (i=0; i < long; i++ ){
                    var status = document.getElementById("estado-actual".concat(idRporde[i])).value;
                    if (status == 'PEN'){
                        alert("No pueden haber casillas pendientes en la respuesta de los examenes");
                        sum ++;
                    }
                }
                var pat = document.getElementById("patrocinante").value;
                if (pat == "") {
                    sum++;
                    alert("Debe seleccionar un patrocinante");
                }
                if (sum ==0) {
                    var data = table.$('select').serialize(); //Se serializan los datos de la pre-orden
                    $.post("<?php echo PATH_PAG_DATA_PRE_ORDER;?>", // Se mandan a la pagina
                        {
                            datos: data,
                        });
                    $('#FormPreOrden').submit();
                }
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


            for(i=0; i < longitud ; i++){// Para la suma o resta del precio de los examenes
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

           // var porcentaje = document.getElementById("poncentaje").value;
           // var t= document.getElementById("total");
           // document.getElementById("desc").value =parseFloat(porcentaje) * parseInt(t);
        }



    </script>

</head>
<body>

</body>
</html>



<?php

session_start();

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

    $queryIdPac ="SELECT REQUEST_PATIENT_PERSON_ID 
                    FROM RPORDER
                    WHERE RPORDER_NUMERO_SOL = ".$_GET['numporden']." LIMIT 1";

    $id = $wpdb->get_var($queryIdPac);

    $query = "SELECT P.MPERSON_LEGAL_NAME,TIMESTAMPDIFF(YEAR,P.MPERSON_BIRTH,CURDATE()) AS EDAD, P.MPERSON_TYPE_DOC, P.MPERSON_IDENTF, REQUEST_GRAFFAR_PORCTG, 
    `REQUEST_GRAFFAR_ONE`,`REQUEST_GRAFFAR_TWO`, `REQUEST_GRAFFAR_THREE`, `REQUEST_GRAFFAR_FOUR`,`REQUEST_FAMILY_TYPE`,`REQUEST_FAMILY_OTHER`, MDC.MPERSON_LEGAL_NAME as CENTRO,
    `REQUEST_WEIGHT`,`REQUEST_INHABITANTS_NUMB`, `REQUEST_AVERAGE_INCOME`, `REQUEST_ORIGIN`, `REQUEST_CAUSE_EXAM`,REQUEST_LOBORAL_COND,`REQUEST_ID`,P.MPERSON_ID
    FROM REQUEST 
    INNER JOIN PATIENT AS P ON P.MPERSON_ID = `REQUEST_PATIENT_PERSON_ID` 
    INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID = REQUEST_MDCENTER_ID_CONCERNING 
    WHERE P.MPERSON_ID=".$id." ORDER BY REQUEST_ID DESC LIMIT 1";

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
    global $wpdb;
    $queryIdPac ="SELECT REQUEST_PATIENT_PERSON_ID 
                    FROM RPORDER
                    WHERE RPORDER_NUMERO_SOL = ".$_GET['numporden']." LIMIT 1";

    $id = $wpdb->get_var($queryIdPac);

    $query ="SELECT `RPORDER_STATUS`, MDC.MPERSON_LEGAL_NAME, E.EXAM_DESC, `RPORDER_ID`, RCE.RCENTEREXAM_ID,`RPORDER_NUMERO_SOL`, RCE.RCENTEREXAM_PRICE 
            FROM `RPORDER` 
            INNER JOIN RCENTEREXAM AS RCE ON RCE.RCENTEREXAM_ID =`RPORDER_CE_ID` 
            INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID = RCE.RCENTEREXAM_MDCENTER_PERSON_ID 
            INNER JOIN EXAM AS E ON E.EXAM_ID= RCE.RCENTEREXAM_EXAM_ID 
            INNER JOIN REQUEST AS R ON R.REQUEST_ID=`RPORDER_REQUEST_ID` 
            WHERE 
            `RPORDER_NUMERO_SOL` = ".$_GET['numporden'];

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
            `RPORDER_NUMERO_SOL` = '.$_GET['numporden'];

    $i=0;
    global $arrayIdPHP;
    foreach ($wpdb->get_results($query) as $key => $row){

        echo 'idRporde['.$i.']="'.$row->RPORDER_ID.'"'.";\n";
        echo 'precio['.$i.']='.$row->RCENTEREXAM_PRICE.";\n";  //Precio no lleva comillas
        echo 'arrayRespuesta['.$i.']="'.$row->RPORDER_STATUS.'"'.";\n";

        $arrayIdPHP[i]=$row->RPORDER_ID;
        $i = $i +1;
    }
}

/**
 * Retorna un arreglo de ID's de laconsulta a la tabla RPORDER
 * @return array
 */
function retornaArrayID(){
    global $wpdb;
    $arrayIdPHP = array();
    $query ='SELECT RPORDER_ID
            FROM RPORDER 
            INNER JOIN RCENTEREXAM AS RCE ON RCE.RCENTEREXAM_ID =`RPORDER_CE_ID` 
            INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID = RCE.RCENTEREXAM_MDCENTER_PERSON_ID 
            INNER JOIN EXAM AS E ON E.EXAM_ID= RCE.RCENTEREXAM_EXAM_ID 
            INNER JOIN REQUEST AS R ON R.REQUEST_ID=`RPORDER_REQUEST_ID` 
            WHERE 
            `RPORDER_NUMERO_SOL` = '.$_POST['number'];



    foreach ($wpdb->get_results($query) as $key => $row){
        array_push( $arrayIdPHP,$row->RPORDER_ID);
    }

    return $arrayIdPHP;
}

/**
 * Funcion retorna arreglo de precios de los  examenes
 * @return array
 */
function retornaArrayPrecios(){
    global $wpdb;
    $array = array();
    $query ='SELECT RCE.RCENTEREXAM_PRICE 
            FROM `RPORDER` 
            INNER JOIN RCENTEREXAM AS RCE ON RCE.RCENTEREXAM_ID =`RPORDER_CE_ID` 
            INNER JOIN MDCENTER AS MDC ON MDC.MPERSON_ID = RCE.RCENTEREXAM_MDCENTER_PERSON_ID 
            INNER JOIN EXAM AS E ON E.EXAM_ID= RCE.RCENTEREXAM_EXAM_ID 
            INNER JOIN REQUEST AS R ON R.REQUEST_ID=`RPORDER_REQUEST_ID` 
            WHERE 
            `RPORDER_NUMERO_SOL` =  '.$_POST['number'];



    foreach ($wpdb->get_results($query) as $key => $row){
        array_push( $array,$row->RCENTEREXAM_PRICE);
    }

    return $array;
}


/**
 * Funcion devuelve el valor del select
 */
function devuelveValorSelect($valor){
    if ($valor == 'PEN'){
        return "Pendiente";
    }else if($valor == 'APR'){
        return "Aprobado";
    }else return "Rechazado";
}

/**
 * funcion Retorna el resto deL combo de status
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


/**
 * Funcion llena combo de los sponsors
 */
function llenaComboSponsors(){
    global $wpdb;
    $combo = "";
    $query ="SELECT `MPERSON_LEGAL_NAME`, `MPERSON_ID`, C.CNTBTION_BALANCE, C.CNTBTION_ID 
                FROM `SPONSOR` 
                INNER JOIN CNTBTION AS C ON C.CNTBTION_SPONSOR_ID = MPERSON_ID";

    foreach($wpdb->get_results($query) as $key => $row){
        $combo .= '<option value="'.$row->MPERSON_ID.'">'.$row->MPERSON_LEGAL_NAME.'</option>';
    }

    return $combo;
}


/**
 * Funcion se encarga de actualizar los status de los examenes en la latabla rporder
 */
function actualizaStatus(){
    $arrayIdPHP = retornaArrayID();  //Retorna una lista e ID's
    $arrayPrecios = retornaArrayPrecios();
    $long = sizeof($arrayIdPHP);
echo '<script> console.log("ESTE ES EL VALOR '.$arrayIdPHP[0].'")</script>';
    for ($i=0 ; $i < $long ; $i++ ){
      $var =$arrayIdPHP[$i];

        if (!empty($_POST["estado-actual$var"])){
            global $wpdb;
            $wpdb->update( 'RPORDER',
                // Datos que se remplazarán
                array(
                    'RPORDER_STATUS' => $_POST["estado-actual$var"],
                    'RPORDER_EXAM_PRICE' => $arrayPrecios[$i]
                ),
                // Cuando el ID del campo es igual al número 1
                array( 'RPORDER_ID' =>$var )
            );

        }
    }



}

/**
 * Funcion registra los datos para generar la pre-orden
 */
function registraOreden(){
    $messageIdent = md5($_POST["patrocinante"].$_POST["porcentaje"].$_POST["number"]); // Se hace hash sobre los valoes de los parametros

    $sessionMessageIdent = isset($_SESSION['messageIdent'])?$_SESSION['messageIdent']:''; // si la variable de sesion esta definida entonces se asigna a la variable el valor de la sesion si no se asigna ''

    if($messageIdent!=$sessionMessageIdent) {
        $_SESSION['messageIdent'] = $messageIdent; // Se guarda la nueva variable de sesion
        if (!empty($_POST['patrocinante']) && !empty($_POST['porcentaje'])) {
            global $wpdb;
            $wpdb->insert('ORD', array(
                'ORDER_SPONSOR_PERSON_ID' => $_POST['patrocinante'],
                'ORDER_TOTAL_EXAM' => $_POST['total'],
                'ORDER_BIRTH_DATE' => 'SELECT CURDATE();',
                'ORDER_GRAFFAR' => $_POST['porcentaje']
            ));
            $query_last_ord = "SELECT ORDER_ID FROM ORD order BY ORDER_ID DESC LIMIT 1";
            $var = $wpdb->get_var($query_last_ord);

            $wpdb->update('RPORDER',
                // Datos que se remplazarán
                array(
                    'RPORDER_ORDER_ID' => $var
                ),
                // Cuando el ID del campo es igual al número 1
                array('RPORDER_NUMERO_SOL' => $_POST['number'])
            );
            actualizaStatus();
        }
    }
}


?>