<html>
<head>

    <script language="JavaScript">

        <?php
        loadMdcenter();
        ?>

        var codMunicipios = new Array();
        var idEstado =  new Array();
        var municipios = new Array();

        var codParroquias =  new Array();
        var idMunicipio =  new Array();
        var parroquias = new Array();


        var rreferencia ="";
        var ccentro="";
        var ssiglas ="";
        var ccongregacion="";
        var nnaturaleza="";
        var llaboral_1="";
        var llaboral_2="";
        var tturno_1_1="";
        var tturno_1_2="";
        var tturno_2_1="";
        var tturno_2_2="";
        var rresponsable="";
        var ccorreo ="";

        var uno;
        var dos;
        var tres;
        var cuatro;
        var cinco;
        var web="";

        var estado;
        var municipio;
        var parroquia;
        var direcciondesc="";
        var nombreEstado = "";
        var nombreMunicipio = "";
        var nombreParroquia = "";
        /**
         * Funcion limpia el combo boxbox de municios
         * */
        function limpiarMunicipios() {
            var reference = document.formSaludCenterLoad.cmbMunicipios;
            var largo = reference.options.length;
            for ( j = 0; j < 8; j++ )
                for ( i = 0; i < largo; i++ )
                    document.formSaludCenterLoad.cmbMunicipios.remove(i);
        }

        /**
         * Funcion Carga los munipios en vase al valor que recibe
         * */
        function cargarMunicipios(valor) {
            var longitud = idEstado.length;
            var reference = document.formSaludCenterLoad.cmbMunicipios;
            var i = 0;
            var j = 0;

            limpiarMunicipios();
            limpiarParroquia();

            for ( i = 0; i < longitud; i++ ) {
                if ( idEstado[i] == valor ) {
                    var newOption = new Option(municipios[i], codMunicipios[i]);
                    reference.options[j] = newOption;
                    j++;
                }
            }
        }


        /*AQUI LAS MISMA PARROQUIAS QUE MUNICIPIO*/

        function limpiarParroquia() {
            var reference = document.formSaludCenterLoad.cmbParroquias;
            var largo = reference.options.length;
            for ( j = 0; j < 10; j++ )
                for ( i = 0; i < largo; i++ )
                    document.formSaludCenterLoad.cmbParroquias.remove(i);
        }

        function cargarParroquias(valor) {
            var longitud = idMunicipio.length;
            var reference = document.formSaludCenterLoad.cmbParroquias;
            var i = 0;
            var j = 0;

            limpiarParroquia();

            for ( i = 0; i < longitud; i++ ) {
                if ( idMunicipio[i] == valor ) {
                    var newOption = new Option(parroquias[i], codParroquias[i]);
                    reference.options[j] = newOption;
                    j++;
                }
            }
        }


        <?php
        loadMdcenter();  //Carga los datos del centro de salud
        //cargaDatosPaciente();
        ?>

        /**
         * Carga los datos del centro en la pagina
         */
        function cargaDatos(){
            document.getElementById("fan").value =<?php echo $_GET['mdcenter_val']; ?>  ;
            document.getElementById("salud").value =  rreferencia;
            document.getElementById("name-center").value =  ccentro;
            document.getElementById("siglas").value = ssiglas ;
            document.getElementById("congregacion").value =  ccongregacion ;
            document.getElementById("naturaleza").value =  nnaturaleza;
            document.getElementById("flaborday").value = llaboral_1 ;
            document.getElementById("lastlaborday").value = llaboral_2 ;
            document.getElementById("tunoinicio").value =  tturno_1_1;
            document.getElementById("tunofin").value =  tturno_1_2;
            document.getElementById("tdosinicio").value =  tturno_2_1;
            document.getElementById("tdosfin").value = tturno_2_2 ;
            document.getElementById("responsable").value = rresponsable ;
            document.getElementById("correo").value = ccorreo ;
            document.getElementById("local1").value =uno  ;
            document.getElementById("local2").value =dos  ;
            document.getElementById("local3").value =  tres;
            document.getElementById("local4").value = cuatro ;
            document.getElementById("local5").value = cinco ;
            document.getElementById("web").value = web ;
            document.getElementById("muestraEstado").value = nombreEstado ;
            document.getElementById("muestraMunicipio").value = nombreMunicipio;
            document.getElementById("muestraParroquia").value = nombreParroquia ;
            document.getElementById("direccion").value = direcciondesc;
            document.getElementById("tt").style.display="none";
            document.getElementById("edit").style.display="block";
            document.getElementById("edit-null").style.display="none";

            
            document.getElementById("salud").disabled =  true;
            document.getElementById("name-center").disabled =  true;
            document.getElementById("siglas").disabled = true ;
            document.getElementById("congregacion").disabled =  true ;
            document.getElementById("naturaleza").disabled =  true;
            document.getElementById("flaborday").disabled = true ;
            document.getElementById("lastlaborday").disabled =true;
            document.getElementById("tunoinicio").disabled = true;
            document.getElementById("tunofin").disabled =  true;
            document.getElementById("tdosinicio").disabled =  true;
            document.getElementById("tdosfin").disabled = true ;
            document.getElementById("responsable").disabled =true;
            document.getElementById("correo").disabled = true ;
            document.getElementById("local1").disabled =true ;
            document.getElementById("local2").disabled =true ;
            document.getElementById("local3").disabled = true;
            document.getElementById("local4").disabled = true ;
            document.getElementById("local5").disabled = true ;
            document.getElementById("web").disabled =true ;
            document.getElementById("muestraEstado").disabled = true ;
            document.getElementById("muestraMunicipio").disabled = true;
            document.getElementById("muestraParroquia").disabled = true ;
            document.getElementById("direccion").disabled = true;
        }

        function editCentro(){
            document.getElementById("salud").disabled =  false;
            document.getElementById("name-center").disabled =  false;
            document.getElementById("siglas").disabled = false ;
            document.getElementById("congregacion").disabled =  false ;
            document.getElementById("naturaleza").disabled =  false;
            document.getElementById("flaborday").disabled = false ;
            document.getElementById("lastlaborday").disabled =false;
            document.getElementById("tunoinicio").disabled = false;
            document.getElementById("tunofin").disabled =  false;
            document.getElementById("tdosinicio").disabled =  false;
            document.getElementById("tdosfin").disabled = false ;
            document.getElementById("responsable").disabled =false;
            document.getElementById("correo").disabled = false ;
            document.getElementById("local1").disabled =false ;
            document.getElementById("local2").disabled =false ;
            document.getElementById("local3").disabled = false;
            document.getElementById("local4").disabled = false ;
            document.getElementById("local5").disabled = false ;
            document.getElementById("web").disabled =false ;
            document.getElementById("muestraEstado").disabled = false ;
            document.getElementById("muestraMunicipio").disabled = false;
            document.getElementById("muestraParroquia").disabled = false ;
            document.getElementById("direccion").disabled = false;
            document.getElementById("tt").style.display="block";
            document.getElementById("edit").style.display="none";
            document.getElementById("edit-null").style.display="block";
        }


    </script>



</head>
<body>

</body>
</html>

<?php

/**
 *Funcion dibuja la parte de direccion en el formulario
 */
function mostrarFormulario() {
    echo '
            <section class="grid-columns">
                <div class="item1" style="display: none|block" id="cmbsE">
                    <label for="name">Estado</label><span class="required">*  </span><br>
                    <input type="text" class="form-area" name="web" id="muestraEstado"/><br>
                    <div>' . llenarEstados() . '</div>
                </div>
                <div class="item2" style="display: none|block" id="cmbsM">
                    <label for="name">Municipio</label><span class="required">* </span><br>
                    <input type="text" class="form-area" name="web" id="muestraMunicipio"/><br
                    <div>' . llenarMunicipios() . '</div>
                </div>
                <div class="item3" style="display: none|block" id="cmbsP">
                    <label for="name">Parroquia</label><span class="required">* </span><br>
                    <input type="text" class="form-area" name="web" id="muestraParroquia"/><br>
                    <div>' . llenarParroquias() . '</div>
                </div>
                <div class="item-span-three">
                    <label for="name">Direccion</label><br>
                    <input type="text" class="form-area-three" name="direccion" id="direccion" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"  title="<?php echo $ErrmsjOnlyLetters ?>" /><br>
                </div>                      
            </section>
        ';
}

/**
 * Funcion que muestra los datos de direccion del paciente
 */
function mostrardireccionmdcenter() {
    echo '
            <section class="grid-columns">
                <div class="item1" style="display: none|block" id="cmbsE">
                    <label for="name">Estado</label><span class="required">*  </span><br>
                    <input type="text" class="form-area" name="muestraEstado" id="muestraEstado"/>
    
                </div>
                <div class="item2" style="display: none|block" id="cmbsM">
                    <label for="name">Municipio</label><span class="required">* </span><br>
                    <input type="text" class="form-area" name="muestraMunicipio" id="muestraMunicipio"/>
                    
                </div>
                <div class="item3" style="display: none|block" id="cmbsP">
                    <label for="name">Parroquia</label><span class="required">* </span><br>
                    <input type="text" class="form-area" name="muestraParroquia" id="muestraParroquia"/>
        
                </div>
                <div class="item-span-three">
                    <label for="name">Direccion</label><br>
                    <input type="text" class="form-area-three" name="direccion" id="direccion" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"  title="<?php echo $ErrmsjOnlyLetters ?>" />
                </div>                      
            </section>
        ';
}

/**
 * Funcion devuelve el dibujo del html con los datos de la consulta de Estado en el Select
 * @return string
 */
function llenarEstados() {
//$db = new MySql();
    global $wpdb;
    $query = "SELECT STATE_ID, STATE_DESC FROM STATE WHERE STATE_ID > 0 ORDER BY STATE_DESC ASC ;"; // Trae todos los estados
    $count= "SELECT COUNT(STATE_ID) FROM STATE"; //cantidad de filas
    $consulta = $wpdb->get_results($query);
    $consulta2 = $wpdb->get_var($count);
    $combo = "";
    $i = 0;
    $count =0;
    $key=""; //Guarda la llave para la segunda vuelta del foreach
    if ( $consulta2 > 0 ) {
        $combo= '<select class="select-area" name="cmbEstados" id="cmbEstados" onchange="cargarMunicipios(this.value)" requiered>';
        foreach ( $consulta as $rows => $row ) {
            foreach ( $row as $datos => $dato ) {
                if ($i == 0)
                    $combo .= '<option >Seleccione opción</option>' . "\n"; // Solamente cuando empieza a llenar el combo para que seleccione opcion
                if ($count == 0) {
                    $key = $dato;
                    $count+=1;
                }else{
                    $combo .= '<option value="' . $key . '">' . $dato . "</option>\n";
                    $count =0;
                }
                $i++;
            }
        }
        $combo .= "</select>\n";
    }
    return $combo;
}


/**
 * Funcion devuelve el dibujo del html con los datos de la consulta de Municipo en el Select
 * @return string
 */
function llenarMunicipios() {
    global $wpdb;
    $query = "SELECT MUNICIPALT_ID, MUNICIPALT_STATE_ID, MUNICIPALT_DESC FROM `MUNICIPALT` WHERE MUNICIPALT_ID > 0 ORDER BY MUNICIPALT_DESC ASC ;";
    $count= "SELECT COUNT(MUNICIPALT_ID) FROM MUNICIPALT"; //cantidad de filas
    $consulta = $wpdb->get_results($query);
    $consulta2 = $wpdb->get_var($count);
    $combo = "";

    if ( $consulta2 > 0 ) {

        $id_mun="";
        $id_es="";
        $count =0;
        $combo= '<select class="select-area" name="cmbMunicipios" id="cmbMunicipios" onclick="cargarParroquias(this.value)" requiered>';
        $i = 0;
        echo "<script language='javascript'>\n";
        foreach ( $consulta as $rows => $row ) {
            foreach ( $row as $datos => $dato ) {
                if ($count == 0){
                    $id_mun = $dato;
                    $count +=1;
                }else if($count == 1){
                    $id_es = $dato;
                    $count +=1;
                } else {
                    echo "codMunicipios[" . $i . "] = " . $id_mun . ";\n";
                    echo "idEstado[" . $i . "] = " . $id_es . ";\n";
                    echo "municipios[" . $i . "] = '" . $dato . "';\n";
                    //$combo .= '<option value="' . $id_mun . '">' . $dato . "</option>\n";
                    $count=0;
                    $i++;
                }
            }
        }
        echo "</script>\n";
        $combo .= "</select>\n";
    }
    return $combo;
}


/**
 * Funcion devuelve el dibujo del html con los datos de la consulta de Parroquia en el Select
 * @return string
 */
function llenarParroquias() {
    global $wpdb;
    $query = "SELECT PARISH_ID, PARISH_MUNICIPALT_ID, PARISH_DESC FROM `PARISH` WHERE PARISH_ID > 0 ORDER BY PARISH_DESC ASC ;";
    $count= "SELECT COUNT(PARISH_ID) FROM PARISH"; //cantidad de filas
    $consulta = $wpdb->get_results($query);
    $consulta2 = $wpdb->get_var($count);
    $combo = "";

    if ( $consulta2 > 0 ) {

        $id_parroquia="";
        $id_municio="";
        $count =0;
        $combo= '<select class="select-area" name="cmbParroquias" id="cmbParroquias" required>';
        $i = 0;
        echo "<script language='javascript'>\n";
        foreach ( $consulta as $rows => $row ) {
            foreach ( $row as $datos => $dato ) {
                if ($count == 0){
                    $id_parroquia = $dato;
                    $count +=1;
                }else if($count == 1){
                    $id_municio = $dato;
                    $count +=1;
                } else {
                    echo "codParroquias[" . $i . "] = " . $id_parroquia . ";\n";
                    echo "idMunicipio[" . $i . "] = " . $id_municio . ";\n";
                    echo "parroquias[" . $i . "] = '" . $dato . "';\n";
                    $count=0;
                    $i++;
                }
            }
        }
        echo "</script>\n";
        $combo .= "</select>\n";
    }
    return $combo;
}



/**
 * Funcion trae la informacion del centro al que se esta consultando
 */

function loadMdcenter(){
    if (!empty($_GET['mdcenter_val'])) {
        global $wpdb;
        $id_contacto="";
        $id_direccion="";
        $query = "SELECT MPERSON_LEGAL_NAME, MDCENTER_REFERENCE_CENTER, MDCENTER_RESPANSABILITY_NAME, MDCENTER_RESPANSABILITY_EMAIL, MDCENTER_FLABOR_DAY, MDCENTER_LLABOR_DAY, MDCENTER_ACRONYM,  MDCENTER_CONGREGATION, MDCENTER_NATURE_INST,MDCENTER_FTURN_INIT, MDCENTER_FTURN_END, MDCENTER_STURN_INIT, MDCENTER_STURN_END, DIRECTION_ID, CONTACT_ID FROM `MDCENTER`, DIRECTION,CONTACT WHERE MPERSON_ID=DIRECTION_MDC_MPERSON_ID AND CONTACT_MDC_MPERSON_ID=MPERSON_ID AND MPERSON_ID=" . $_GET['mdcenter_val'];
        foreach ($wpdb->get_results($query) as $key => $row) {
            echo 'rreferencia="' . $row->MDCENTER_REFERENCE_CENTER . '"' . ";\n";
            echo 'ccentro="' . $row->MPERSON_LEGAL_NAME . '"' . ";\n";
            echo 'ssiglas ="' . $row->MDCENTER_ACRONYM . '"' . ";\n";
            echo 'ccongregacion="' . $row->MDCENTER_CONGREGATION . '"' . ";\n";
            echo 'nnaturaleza="' . $row->MDCENTER_NATURE_INST . '"' . ";\n";
            echo 'llaboral_1="' . $row->MDCENTER_FLABOR_DAY . '"' . ";\n";
            echo 'llaboral_2="' . $row->MDCENTER_LLABOR_DAY . '"' . ";\n";
            echo 'tturno_1_1="' . $row->MDCENTER_FTURN_INIT . '"' . ";\n";
            echo 'tturno_1_2="' . $row->MDCENTER_FTURN_END . '"' . ";\n";
            echo 'tturno_2_1="' . $row->MDCENTER_STURN_INIT . '"' . ";\n";
            echo 'tturno_2_2="' . $row->MDCENTER_STURN_END . '"' . ";\n";
            echo 'rresponsable="' . $row->MDCENTER_RESPANSABILITY_NAME . '"' . ";\n";
            echo 'ccorreo ="' . $row->MDCENTER_RESPANSABILITY_EMAIL . '"' . ";\n";
            $id_contacto = $row->CONTACT_ID;
            $id_direccion = $row->DIRECTION_ID;
        }

        cargaDatoscontacto($id_contacto);
        cargaDireccion($id_direccion);

    }
}

/**
 *
 * Funcion carga los datos de contacto en la pagina
 * @param $id_contactoss
 */
function cargaDatoscontacto($id_contacto){
    global $wpdb;
    $query_contacto="SELECT CONTACT_LOCAL_PHON, CONTACT_LOCAL_PHON_2, CONTACT_LOCAL_PHON_3, CONTACT_LOCAL_PHON_4, CONTACT_LOCAL_PHON_5, CONTACT_WEB_SITE FROM CONTACT WHERE CONTACT_ID=".$id_contacto;
    foreach ($wpdb->get_results($query_contacto) as $key => $row) {
        if ($row->CONTACT_LOCAL_PHON==0){
            echo 'uno=""'. ";\n";
        }else echo 'uno=' . $row->CONTACT_LOCAL_PHON  . ";\n";
        if ($row->CONTACT_LOCAL_PHON_2 ==0){
            echo 'dos=""'. ";\n";
        }else echo 'dos=' . $row->CONTACT_LOCAL_PHON_2   . ";\n";
        if ($row->CONTACT_LOCAL_PHON_3 ==0){
            echo 'tres=""'. ";\n";
        }else echo 'tres=' . $row->CONTACT_LOCAL_PHON_3   . ";\n";
        if ($row->CONTACT_LOCAL_PHON_4==0){
            echo 'cuatro=""'. ";\n";
        }else echo 'cuatro=' . $row->CONTACT_LOCAL_PHON_4  . ";\n";
        if ($row->CONTACT_LOCAL_PHON_5==0){
            echo 'cinco=""'. ";\n";
        }else echo 'cinco=' . $row->CONTACT_LOCAL_PHON_5  . ";\n";

        echo 'web="' . $row->CONTACT_WEB_SITE . '"' . ";\n";
    }

}


/**
 * Funcion carga la direccion en la pagina
 * @param $id_direccion
 */
function cargaDireccion($id_direccion){
    global $wpdb;
    $query ="SELECT `DIRECTION_DESC`, PARISH_ID, PARISH_DESC, MUNICIPALT_ID, MUNICIPALT_DESC, STATE_ID, STATE_DESC FROM 
`DIRECTION`, PARISH, MUNICIPALT, STATE WHERE `DIRECTION_PARISH_ID`= PARISH_ID AND `DIRECTION_PAR_MUN_ID`= 
MUNICIPALT_ID AND MUNICIPALT_STATE_ID=STATE_ID AND DIRECTION_ID=".$id_direccion;
    foreach ($wpdb->get_results($query) as $key => $row) {
        echo 'estado='.$row->STATE_ID.";\n";
        echo 'municipio='.$row->MUNICIPALT_ID.";\n";
        echo 'parroquia='.$row->PARISH_ID. ";\n";
        echo 'direcciondesc="'.$row->DIRECTION_DESC.'"'.";\n";
        echo 'nombreEstado="'.$row->STATE_DESC.'"'.";\n";
        echo 'nombreMunicipio="'.$row->MUNICIPALT_DESC.'"'.";\n";
        echo 'nombreParroquia="'.$row->PARISH_DESC.'"'.";\n";
    }
}


/**
 * Funcion Actualiza la informacion del Centro de salud
 * @param $id_mdcenter
 */
function actualizaInformacionCentroSalud($id_mdcenter){
        global $wpdb;
        $wpdb->update( 'MDCENTER',
            // Datos que se remplazarán
            array(
                'MPERSON_LEGAL_NAME' => $_POST['name-center'],
                'MDCENTER_REFERENCE_CENTER' => $_POST['salud'],
                'MDCENTER_ACRONYM' => $_POST['siglas'],
                'MDCENTER_NATURE_INST' => $_POST['naturaleza'],
                'MDCENTER_CONGREGATION' => $_POST['congregacion'],
                'MDCENTER_FLABOR_DAY' => $_POST['flaborday'],
                'MDCENTER_LLABOR_DAY' => $_POST['lastlaborday'],
                'MDCENTER_FTURN_INIT' => $_POST['tunoinicio'],
                'MDCENTER_FTURN_END' => $_POST['tunofin'],
                'MDCENTER_STURN_INIT' => $_POST['tdosinicio'],
                'MDCENTER_STURN_END' => $_POST['tdosfin'],
                'MDCENTER_RESPANSABILITY_NAME' => $_POST['responsable'],
                'MDCENTER_RESPANSABILITY_EMAIL' => $_POST['correo']
            ),
            // Cuando el ID del campo es igual al número 1
            array( 'MPERSON_ID' => $id_mdcenter )
        );
}

?>