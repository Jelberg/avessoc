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
function nombrePaciente(){
    global $wpdb;
    $nombre="";
    $nombre = $wpdb->get_var("SELECT MPERSON_LEGAL_NAME FROM PATIENT WHERE MPERSON_ID=".$_POST['id_pac']);
    return $nombre;

}

/**
 * Registra solicitud para el paciente
 */
function registraSolicitud(){
        global $wpdb;
        $valor = $_POST['graffar-1']+$_POST['graffar-2']+$_POST['graffar-3']+$_POST['graffar-4'];
        $porcentaje= $wpdb->get_var('SELECT SCALE_PORCENTAGE FROM `SCALE` WHERE SCALE_MIN<='.$valor.' AND SCALE_MAX>='.$valor);

        //Insercion de datos en la tabla REQUEST
        $wpdb->insert('REQUEST', array(
            'REQUEST_PATIENT_PERSON_ID' => $_POST['id_pac'],
            'REQUEST_INHABITANTS_NUMB' => $_POST['num-personas'],
            'REQUEST_AVERAGE_INCOME' => $_POST['ingreso-promedio'],
            'REQUEST_FAMILY_TYPE' => $_POST['familia-tipo'],
            'REQUEST_FAMILY_OTHER' => ucfirst(strtolower($_POST['otro-tipo'])),
            'REQUEST_LOBORAL_COND' => $_POST['condicion-laboral'],
            'REQUEST_GRAFFAR_ONE' => $_POST['graffar-1'],
            'REQUEST_GRAFFAR_TWO' => $_POST['graffar-2'],
            'REQUEST_GRAFFAR_THREE' => $_POST['graffar-3'],
            'REQUEST_GRAFFAR_FOUR' => $_POST['graffar-4'],
            'REQUEST_GRAFFAR_PORCTG' => $porcentaje
        ));



}

?>