<!DOCTYPE html>
<html>
<head>
 <script language="javascript">
        var codMunicipios = new Array();
        var idEstado =  new Array();
        var municipios = new Array();

        var codParroquias =  new Array();
        var idMunicipio =  new Array();
        var parroquias = new Array();


        /**
         * Funcion limpia el combo boxbox de municios
         * */
        function limpiarMunicipios() {
            var reference = document.formPaciente.cmbMunicipios;
            var largo = reference.options.length;
            for ( j = 0; j < 8; j++ )
                for ( i = 0; i < largo; i++ )
                    document.formPaciente.cmbMunicipios.remove(i);
        }

        /**
         * Funcion Carga los munipios en vase al valor que recibe
         * */
        function cargarMunicipios(valor) {
            var longitud = idEstado.length;
            var reference = document.formPaciente.cmbMunicipios;
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
            document.formPaciente.totalMunicipios.value = j + ' municipios';
        }


        /*AQUI LAS MISMA PARROQUIAS QUE MUNICIPIO*/

        function limpiarParroquia() {
            var reference = document.formPaciente.cmbParroquias;
            var largo = reference.options.length;
            for ( j = 0; j < 10; j++ )
                for ( i = 0; i < largo; i++ )
                    document.formPaciente.cmbParroquias.remove(i);
        }

        function cargarParroquias(valor) {
            var longitud = idMunicipio.length;
            var reference = document.formPaciente.cmbParroquias;
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
            document.formPaciente.totalParroquias.value = j + ' parroquias';
        }



    </script>
</head>
<body>
<script language="JavaScript">

    if (document.getElementById("familia-tipo").value != "0" ){
        document.getElementById("otro").style.display = "none";
    }


    function muestraInfo(){
        var fam = document.getElementById("familia-tipo").value;
        if (fam == "0"){
            document.getElementById("otro").style.display = "block"; //Es el div
            document.getElementById("otro-tipo").required = true; //Es el textField
            document.getElementById("demo").innerHTML = "Debe especificar el tipo de familia";
        }else {
            document.getElementById("otro").style.display = "none";
            document.getElementById("otro-tipo").required = false;//es el text Field
        }
    }

    /**
     * Funcion valida que por los menos se debe de llenar alguno de los telefonos
     * @returns {boolean}
     */
    function validaTelefono(){
        var local = document.getElementById("local").value;
        var movil = document.getElementById("movil").value;
        if (local.length == 0 && movil.length == 0) {
            alert("Debe llenar al menos un número telefónico");
            return false;
        }else return true;
    }


</script>
</body>
</html>

<?php
//=========================================================================================
//                                                                                        //
//                                                                                        //
//       FUNCIONES PARA LLENAR COMBOBOX DE ESTADO MUNICIPIO Y PARROQUIA                   //
//                                                                                        //
//                                                                                        //
//=========================================================================================


/**
 *Funcion dibuja la parte de direccion en el formulario
 */
function mostrarFormulario() {
    echo '
			<section class="grid-columns">
				<div class="item1">
					<label for="name">Estado</label><span class="required">*  </span><br>
					<div>' . llenarEstados() . '</div>
				</div>
				<div class="item2">
					<label for="name">Municipio</label><span class="required">* </span><br>
					<div>' . llenarMunicipios() . '</div>
				</div>
				<div class="item3">
					<label for="name">Parroquia</label><span class="required">* </span><br>
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

?>