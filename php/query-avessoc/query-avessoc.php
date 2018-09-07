<?php
/**
* Plugin Name: Query's AVESSOC
* Description: Este plugin esta desarrollado para que pueda ejecutar los query's de la base de datos que le da soporte al portal de avessoc
* Version: 1.0.0
* Author: Jessica Elberg
*/

/**
 * Convierte el objeto en un array
 * @param $d
 * @return array
 */

//=========================================================================================
//                                                                                        //
//                                                                                        //
//                               Variables de mansajes                                    //
//                                                                                        //
//                                                                                        //
//=========================================================================================

$ErrmsjOnlyLetters="Sólo se permiten mayúsculas, minusculas y espacios en blanco.";
$msjNumero="";


//=========================================================================================
//                                                                                        //
//                                                                                        //
//                               Variables para mantener                                  //
//                                                                                        //
//                                                                                        //
//=========================================================================================

$legal=$numedoc=$aporte=$tdoc="";



//=========================================================================================
//                                                                                        //
//                                                                                        //
//    Se ejecuta todo el tiempo para mantener actualizado vas variables anteriores        //  IMPORTANTE REVISAR
//                                                                                        //
//                                                                                        //
//=========================================================================================


function returnVarNoEmpty($etiqueta){
    $var ="";
    if (empty($_POST['"'.$etiqueta.'"'])){
        return $var;
    }else {
        return $var = test_input($_POST['"'.$etiqueta.'"']);
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//___________________________________________________________________________________________

function objectToArray($d)
{
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
        return $d;
    }
}

//----------------------------------CRUD PACIENTE------------------------------------------


/**
 *   Este Realiza el insert de paciente
 *
 * @param $nombre   Primer nombre
 * @param $apellido Primer Apellido
 * @param $snombre  Segundo Nombre
 * @param $sapellido    Segundo Apellido
 * @param $fnac     Fecha de nacimiento
 * @param $numeroidentidad  numero del documento de identidad
 * @param $nacionalidad nacionalidad
 * @param $ecivil       Estado civil
 * @param $profesion    Profesion que ejerce
 * @param $sexo         Sexo
 * @param $tipodoc      Tipo de documento (RIF, V, E, Passaporte)
 * @param $titular      Titular del documento de identidad
 */
function insert_patient($nombre,$apellido,$snombre,$sapellido,$fnac,$numeroidentidad,
                        $nacionalidad,$ecivil,$profesion,$sexo,$tipodoc,
                        $titular,$local,$movil,$correo,$numpersonas,$ingresopromedio, $familiatipo, $otro, $condicionlab){
    global $wpdb;

    $wpdb->insert('PATIENT', array(
      'MPERSON_NAME' => $nombre,
      'MPERSON_LAST_NAME' => $apellido,
      'MPERSON_BIRTH' => $fnac,
      'MPERSON_IDENTF' => $numeroidentidad,
      'MPERSON_LEGAL_NAME' => $apellido,  //CAMBIAR
      'MPERSON_SECOND_NAME' => $snombre,
      'MPERSON_SECOND_LNAME' => $sapellido,
      'MPERSON_NACIONALITY' => $nacionalidad,
      'MPERSON_CIVIL_STATS' => $ecivil,
      'MPERSON_SEX' => $sexo,
      'MPERSON_HOLDER_CARD' => $titular,
      'MPERSON_PROFETION' => $profesion,
      'MPERSON_TYPE_DOC' => $tipodoc
      ));
      $id_paciente= $wpdb->get_var( "SELECT MAX(MPERSON_ID) AS id FROM PATIENT" ); //< Devuelve el ultimo id registrado

    //add_contact_patient($id_paciente,$wpdb,$local,$movil,$correo);
    //add_request($wpdb,$id_paciente,$numpersonas,$ingresopromedio, $familiatipo, $otro, $condicionlab);

}

// > Gancho de accion que enlaza la funcion insert_patient a la funcion de wp
//add_action('wp', 'insert_patient');



//------------------------------------------CRUD STATE-------------------------------------------------

/**
 * Metodo que trae los estados de la bd y devuelve un ARRAY
 * @return array
 */
function read_state(){
  global $wpdb;
  $estados= $wpdb->get_results ("SELECT STATE_ID, STATE_DESC FROM `STATE` ");
  $new_array = objectToArray($estados);
  return $new_array;
}

// > Gancho de accion que enlaza la funcion read_state a la funcion de wp
//add_action('wp', 'read_state');




//----------------------------------------CRUD MUNICIPALT------------------------------------------------

/**
 * @param $id_state
 * @return mixed
 */
function read_municipalt($id_state){
    global $wpdb;
    $municipios = $wpdb->get_results("SELECT MUNICIPALT_ID, MUNICIPALT_DESC FROM `MUNICIPALT` WHERE MUNICIPALT_STATE_ID =".$id_state);
    //$new_array_municipalt = obbjectToArray($municipios);
    return $municipios;
}

// > Gancho de accion que enlaza la funcion read_municipalt a la funcion de wp
//add_action('wp', 'read_municipalt');




//------------------------------------------CRUD CONTACT----------------------------------------------


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




//-----------------------------------------CRUD REQUEST-----------------------------------------------

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
function add_request($wpdb,$id_paciente,$numpersonas,$ingresopromedio, $familiatipo, $otro, $condicionlab){

    //Insercion de datos en la tabla REQUEST
    $wpdb->insert('REQUEST', array(
        'REQUEST_PATIENT_PERSON_ID' => $id_paciente,
        'REQUEST_INHABITANTS_NUMB' => $numpersonas,
        'REQUEST_AVERAGE_INCOME' => $ingresopromedio,
        'REQUEST_FAMILY_TYPE' => $familiatipo,
        'REQUEST_FAMILY_OTHER' => $otro,
        'REQUEST_LOBORAL_COND' => $condicionlab
    ));

}


//--------------------------------------------CRUD SPONSOR-----------------------------------------------------
/**
 *
 * Inserta el Sponsor a la base de datos
 * @param $nombrelegal
 * @param $tipodocumento
 * @param $numero
 * @param $logo
 */
function add_sponsor(){
    global $wpdb;

    $wpdb->insert('SPONSOR', array(
        'MPERSON_LEGAL_NAME' => $_POST["legal-name"],
        'MPERSON_TYPE_DOC' => $_POST["tipo-documento"],
        'MPERSON_IDENTF' => $_POST["numero-doc"],
        'SPONSOR_LOGO' => $_POST["logo"]
    ));

    if (!empty($_POST["aporte"])){
        $id_sponsor= $wpdb->get_results( "SELECT MAX(MPERSON_ID) AS id FROM SPONSOR" ); //< Devuelve el ultimo id registrado
        add_cntribution_init($_POST["aporte"],$id_sponsor);
    }

}

/**
 * Buscar el numero de identificacion del sponsor
 * @param $numIdentificacion
 * @param $tipo
 * @return mixed
 */
function search_sponsor_id($numIdentificacion, $tipo){
    global $wpdb;
    $query ="SELECT MPERSON_ID FROM `SPONSOR` WHERE MPERSON_IDENTF = ".$numIdentificacion." AND MPERSON_TYPE_DOC ='".$tipo."'";
    $id_sponsor= $wpdb->get_var( $query );
    return $id_sponsor;
}

//-------------------------------------------CRUD CNTRIBUTION--------------------------------------------------

/**
 * Este insert es solo para cuando se agrega por primera vez al sponsor
 * @param $montoinicial
 * @param $userid
 */
function add_cntribution_init($montoinicial,$userid){
    global $wpdb;

    $wpdb->insert('CNTBTION', array(
        'CNTBTION_CANT' => $montoinicial,
        'CNTBTION_BALANCE' => $montoinicial,
        'CNTBTION_SPONSOR_ID' => $userid
    ));

}

?>


