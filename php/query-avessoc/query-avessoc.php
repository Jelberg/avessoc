<?php
/**
* Plugin Name: Query's AVESSOC
* Description: Este plugin esta desarrollado para que pueda ejecutar los query's de la base de datos que le da soporte al portal de avessoc
* Version: 1.0.0
* Author: Jessica Elberg
*/


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


?>