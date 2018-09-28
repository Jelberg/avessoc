

<?php

/**
 * Funcion dibuja el combo box de los examenes registrados en el sistema
 */
function mostrarExamenes(){
    $combo = '<label for="name">Seleccione Examen</label><span class="required">* </span><br>';
    $combo .= '<select id="tipo-examen" name="tipo-examen" class="select-area-two"required>' ;
    $combo .= '<option value="" selected> >>Seleccione opción<< </option>';

    // Aqui va la consulta que trae los examens con sus id
    $combo .= '</select>';

    return $combo;
}

/**
 * Llena el 1er combo de los centros de salud registrados
 */
function llenaCentroCombo1(){
    $combo = '<label for="name">Seleccione Centro de Salud</label><span class="required">* </span><br>';
    $combo .= '<select id="centro-salud" name="centro-salud" class="select-area"required>' ;
    $combo .= '<option value="" selected> >>Seleccione opción<< </option>';

    // Aqui va la consulta que trae los centros con sus id
    $combo .= '</select>';

    return $combo;
}
?>