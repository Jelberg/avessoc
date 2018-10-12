
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

    /**
     * Funcion para establecer un pattern en el campo de número de documento en base al tipo
     * */
 function cambioTipoDocumento() {
     if (document.getElementById("tipo-documento").value == "RIF") {
         document.getElementById("numero-doc").pattern = "([VEJPG]{1})([0-9]{7,9})";
         document.getElementById("numero-doc").placeholder = "Ej.: J3323432";
         document.getElementById("numero-doc").title = "El campo RIF debe contener una letra (V,E,J,P,G) y entre 7 a 9 dígitos"
     } else if(document.getElementById("tipo-documento").value == "E" || document.getElementById("tipo-documento").value == "V"){
         document.getElementById("numero-doc").pattern = "([0-9]{7,9})";
         document.getElementById("numero-doc").placeholder = "Ej.: 1234567";
         document.getElementById("numero-doc").title = "Tipo de documentos V o E deben contener solo digitos. Entre 7 a 9 digitos"
     } else{
         document.getElementById("numero-doc").placeholder = " ";
         document.getElementById("numero-doc").title = " Ingrese número de Pasaporte"
     }

 }

 /**
  * Funcion muestra en combo oculto cuando se selecciona otro en tipo de familia
  *  */
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


/**
 *   Registra el paciente en todas las tablas relacionadas en el template
 *
 */

function insert_patient(){

        global $wpdb;

        $wpdb->insert('PATIENT', array(
            'MPERSON_NAME' => ucfirst(strtolower($_POST['name-uno'])),
            'MPERSON_LAST_NAME' => ucfirst(strtolower($_POST['apellido-uno'])),
            'MPERSON_BIRTH' => $_POST['birth-date'],
            'MPERSON_IDENTF' => $_POST['numero-doc'],
            'MPERSON_LEGAL_NAME' => ucfirst(strtolower($_POST['apellido-uno'])) . " " . ucfirst(strtolower($_POST['apellido-dos'])) . ", " . ucfirst(strtolower($_POST['name-uno'])) . " " . ucfirst(strtolower($_POST['name-dos'])),
            'MPERSON_SECOND_NAME' => ucfirst(strtolower($_POST['name-dos'])),
            'MPERSON_SECOND_LNAME' => ucfirst(strtolower($_POST['apellido-dos'])),
            'MPERSON_NACIONALITY' => ucfirst(strtolower($_POST['nacionalidad'])),
            'MPERSON_CIVIL_STATS' => $_POST['estado-civil'],
            'MPERSON_SEX' => $_POST['sexo'],
            'MPERSON_HOLDER_CARD' => $_POST['titular'],
            'MPERSON_PROFETION' => ucfirst(strtolower($_POST['oficio'])),
            'MPERSON_TYPE_DOC' => $_POST['tipo-documento']
        ));
        $id_paciente = $wpdb->get_var("SELECT MAX(MPERSON_ID) AS id FROM PATIENT"); //< Devuelve el ultimo id registrado

        if (!empty($_POST['local']) or !empty($_POST['movil']) or !empty($_POST['correo'])) {
            add_contact_patient($id_paciente, $wpdb, $_POST['local'], $_POST['movil'], strtolower($_POST['correo']));
        }
        add_request($wpdb, $id_paciente, $_POST['num-personas'], $_POST['ingreso-promedio'], $_POST['familia-tipo'], ucfirst(strtolower($_POST['otro-tipo'])), $_POST['condicion-laboral'],
            $_POST['graffar-1'], $_POST['graffar-2'], $_POST['graffar-3'], $_POST['graffar-4']);
        insert_direction($id_paciente);

}


/**
 * Registra la direccion del usuario
 * @param $id_usuario
 */
function insert_direction($id_usuario){

    global $wpdb;

    $wpdb->insert('DIRECTION', array(
        'DIRECTION_PARISH_ID' => $_POST['cmbParroquias'],
        'DIRECTION_PAR_MUN_ID' => $_POST['cmbMunicipios'],
        'DIRECTION_MPERSON_ID' => $id_usuario,
        'DIRECTION_DESC' => ucfirst(strtolower($_POST['direccion']))
    ));

}


/**
 *
 * Insert de los datos de contacto
 * @param $id_paciente
 * @param $wpdb
 * @param $local
 * @param $movil
 * @param $correo
 */
function add_contact_patient($id_paciente,$wpdb,$local,$movil,$correo){
    //global $wpdb;
    //$id_paciente= $wpdb->get_var( "SELECT MAX(MPERSON_ID) AS id FROM PATIENT" ); //< Devuelve el ultimo id registrado

    //Ahora hace insert de contacto
    $wpdb->insert('CONTACT', array(
        'CONTACT_MPERSON_ID' => $id_paciente,
        'CONTACT_LOCAL_PHON' => $local,
        'CONTACT_MOVIL_PHON' => $movil,
        'CONTACT_EMAIL' => $correo
    ));
}


/**
 * Inserta en la tabla REQUEST cuando se agrega el paciente al sistema
 *
 * @param $wpdb                 conexion a la base de datos
 * @param $id_paciente          La id del paciente al que se esta registrando
 * @param $numpersonas          cantidad de personas con la quie vive
 * @param $ingresopromedio
 * @param $familiatipo
 * @param $otro                 puede ser nulo, dependiendo de la respuestaa del parametro anterior
 * @param $condicionlab         condicion laboral
 */
function add_request($wpdb,$id_paciente,$numpersonas,$ingresopromedio, $familiatipo, $otro, $condicionlab,$g1,$g2,$g3,$g4){
    $valor = $g1+$g2+$g3+$g4;
    $porcentaje= $wpdb->get_var('SELECT SCALE_PORCENTAGE FROM `SCALE` WHERE SCALE_MIN<='.$valor.' AND SCALE_MAX>='.$valor);

    //Insercion de datos en la tabla REQUEST
    $wpdb->insert('REQUEST', array(
        'REQUEST_PATIENT_PERSON_ID' => $id_paciente,
        'REQUEST_INHABITANTS_NUMB' => $numpersonas,
        'REQUEST_AVERAGE_INCOME' => $ingresopromedio,
        'REQUEST_FAMILY_TYPE' => $familiatipo,
        'REQUEST_FAMILY_OTHER' => $otro,
        'REQUEST_LOBORAL_COND' => $condicionlab,
        'REQUEST_GRAFFAR_ONE' => $g1,
        'REQUEST_GRAFFAR_TWO' => $g2,
        'REQUEST_GRAFFAR_THREE' => $g3,
        'REQUEST_GRAFFAR_FOUR' => $g4,
        'REQUEST_GRAFFAR_PORCTG' => $porcentaje
    ));


}


/**
 * Obtiene el valor y la descripcion de la respuesta de la escala graffar
 * @param $id_question
 * @return mixed
 */
function search_answer($id_question){
    global $wpdb;
    $query ="SELECT ANSWER_VALUE, ANSWER_DESC FROM `ANSWER` WHERE ANSWER_QUESTION_ID =".$id_question;
    $answers= $wpdb->get_results( $query );
    return $answers;
}



/**
 * Funcion tranforma lo que se obtiene del array para llenar el select
 * @param $results Array con el resultado de la consulta, El array que debe recibir en un Arreglo dentro de otro arreglo.
 */
function llenaComboBox($results)
{  // Funcion llena combobox pasando como parrametro un array de la forma
    $cont = 0;
    $key = "";
    foreach ($results as $llave => $valor) {
        foreach ($valor as $value => $option) {
            if ($cont == 0) {
                $key = $option;
                $cont += 1;
            } else {
                echo '<option value ="' . $key . '">' . $option . '</option>';
                $cont = 0;
            }
        }
    }
}



?>