<?php
/**
* Plugin Name: Avessoc
* Description: Plugin desarrollado para dar soporte al portal de avessoc despues del login de Usuario donde se
 * administra la generacion de ordenes y pre-ordenes de la asociacion.
* Version: 1.0.0
* Author: Jessica Elberg
*/



//=========================================================================================
//                                                                                        //
//                                                                                        //
//                      CONTROLADORES DE LOS TEMPLATES                                    //
//                                                                                        //
//                                                                                        //
//=========================================================================================


/**
 * Manejador de la platilla de Add Sponsor
 */
include "function-templates/template-add-sponsor-function.php";

/**
 * Manejador de la plantilla Register Patient
 */
include "function-templates/template-register-patient-function.php";

/**
 * Manejador de la plantilla Search Patient
 */
include "function-templates/template-search-patient-function.php";

/**
 * Manejador de la plantilla Search Sponsor
 */
include "function-templates/template-search-sponsor-function.php";


//=========================================================================================
//                                                                                        //
//                                                                                        //
//                                       MENÚ                                             //
//                                                                                        //
//                                                                                        //
//=========================================================================================

/**
 * Crea el menú en árbol, el cual es usado para la navegación
 */
include "menu.php";


//=========================================================================================
//                                                                                        //
//                                                                                        //
//                               Variables de mansajes                                    //
//                                                                                        //
//                                                                                        //
//=========================================================================================

$ErrmsjOnlyLetters="Sólo se permiten mayúsculas, minusculas y espacios en blanco. Máximo 25 caracteres";
$msjNumero="Sólo números. Min 7 dígitos, Max 20 dígitos";
$msjContacto="Sólo números. Min 7 dígitos, Max 15 dígitos";
$msjSuccess="";

//=========================================================================================
//                                                                                        //
//                                                                                        //
//                               Variables para mantener                                  //
//                                                                                        //
//                                                                                        //
//=========================================================================================

$legal=$numedoc=$aporte=$tdoc="";



?>
