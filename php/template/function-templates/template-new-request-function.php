<?php


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


/**
 * Funcion trae el nombre del paciente
 * @return string
 */
function nombrePaciente($id){
    global $wpdb;

    $nombre="";
    $query="SELECT MPERSON_LEGAL_NAME FROM PATIENT WHERE MPERSON_ID=".$id;
    $nombre = $wpdb->get_var($query);
    return $nombre;

}


?>