<html>
<head>

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
    <?php
    infoPaciente();
    ?>

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
           /* document.getElementById("").value= ;
            document.getElementById("").value= ;
            document.getElementById("").value= ;*/
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
function infoPaciente()
{
    global $wpdb;
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
        /*echo 'g1="'.$row->.'"';
        echo 'g2="'.$row->.'"';
        echo 'g3="'.$row->.'"';
        echo 'g4="'.$row->.'"';*/
        echo 'tipoFamilia="' . $row->REQUEST_FAMILY_TYPE . '"'.";\n";
        echo 'otroTipo="' . $row->REQUEST_FAMILY_OTHER . '"'.";\n";
        echo 'ingreso="' . $row->REQUEST_AVERAGE_INCOME . '"'.";\n";
        echo 'numHabitantes="' . $row->REQUEST_INHABITANTS_NUMB . '"'.";\n";
        echo 'nombreCentro="' . $row->CENTRO . '"'.";\n";
        echo 'origen="' . $row->REQUEST_ORIGIN . '"'.";\n";
        /*echo 'causa="' . $row->REQUEST_CAUSE_EXAM . '"'.";\n";*/
        echo 'peso="' . $row->REQUEST_WEIGHT . '"'.";\n";
        echo 'condicion="' . $row->REQUEST_LOBORAL_COND . '"'.";\n";

    }
}
?>