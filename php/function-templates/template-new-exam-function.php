<html>
<head>
    <script language="JavaScript">

        /**
         * Muestra el tpe input de otro tipo de patologia
         */
        function muestraTextAreaPatologia() {
            if (document.getElementById("tipo-patologia").value == -1) {
                document.getElementById("otra-patologia").style.display = "block";
                document.getElementById("nueva-patologia").required = true;
            } else{
                document.getElementById("otra-patologia").style.display = "none";
                document.getElementById("nueva-patologia").required = false;
            }
        }

    </script>
</head>
<body>

</body>
</html>

<?php

/**
 * Funcion llena el combo de patologias
 */
function muestraPatologias(){
    $combo = ' <label for="name">Patología por la que se realiza dicho examen</label><span class="required">*</span><br>
               <select id="tipo-patologia" name="tipo-patologia" class="select-area-two" onchange="muestraTextAreaPatologia()" required>' ;
    $combo .= '<option value="" selected> >>Seleccione opción<< </option>';
    $combo .= '<option value="1" selected> opcion</option>';
    //AQUI CONSULTA DE LA BASE DE DATOS

    $combo .= '<option value="-1" selected>Otro</option>';
    $combo .= '</select>';

    return $combo;
}

?>