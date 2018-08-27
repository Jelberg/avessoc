<?php
/**
* Plugin Name: Query's AVESSOC
* Description: Este plugin esta desarrollado para que pueda ejecutar los query's de la base de datos que le da soporte al portal de avessoc
* Version: 1.0.0
* Author: Jessica Elberg
*/

/**
 *
 * Metodo combierte un objeto en un arreglo para el caso de las consultas a la bd
 * @param $d Parametro de entrada queb puede ser un array
 * @return array El arreglo modificado7trasformado
 */
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
                        $titular){
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


}

// > Gancho de accion que enlaza la funcion insert_patient a la funcion de wp
add_action('wp', 'insert_patient');



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
add_action('wp', 'read_state');




//----------------------------------------CRUD MUNICIPALT------------------------------------------------

/**
 * @param $id_state
 * @return mixed
 */
function read_municipalt($id_state){
    global $wpdb;
    $municipios = $wpdb->get_results("SELECT MUNICIPALT_ID, MUNICIPALT_DESC FROM `MUNICIPALT` WHERE MUNICIPLAT_STATE_ID =1");
    //$new_array_municipalt = obbjectToArray($municipios);
    return $municipios;
}

// > Gancho de accion que enlaza la funcion read_municipalt a la funcion de wp
add_action('wp', 'read_municipalt');


?>

