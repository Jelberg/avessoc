<?php
/**
* Plugin Name: Validaciones AVESSOC
* Description: Plugin desarrollado para agregar las validaciones de los campos de registro de la pagina web
* Version: 1.0.0
* Author: Jessica Elberg
*/


/**  Funcion que valida parametros de tipo entero
 * @param $valor variable que se evalua
 * @param null $opciones Arreglo de las posibles opcionnes que puede tener la variable valor, puede tomar valor nulo
 * @return bool
 */
function validarEntero($valor, $opciones=null){
    if(filter_var($valor, FILTER_VALIDATE_INT, $opciones) === FALSE){
       return false;
    }else{
       return true;
    }
 }



?>