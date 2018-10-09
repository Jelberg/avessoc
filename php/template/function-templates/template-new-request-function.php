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
    $query="SELECT MPERSON_LEGAL_NAME FROM PATIENT WHERE MPERSON_ID=".$_POST['id_pac'];
    $nombre = $wpdb->get_var($query);
    return $nombre;

}

/**
 * Registra solicitud para el paciente
 */
function registraSolicitud(){
    if(!empty($_POST['num']) && !empty($_POST['ingresop']) && !empty($_POST['g1'] )
                && !empty($_POST['g2']) && !empty($_POST['g3']) && !empty($_POST['g4'])) {

        global $wpdb;

        $valor = $_POST['g1'] + $_POST['g2'] + $_POST['g3'] + $_POST['g4'];
        $porcentaje = $wpdb->get_var('SELECT SCALE_PORCENTAGE FROM `SCALE` WHERE SCALE_MIN<=' . $valor . ' AND SCALE_MAX>=' . $valor);

        //Insercion de datos en la tabla REQUEST
        $wpdb->insert('REQUEST', array(
            'REQUEST_PATIENT_PERSON_ID' => $_POST['id_pac'],
            'REQUEST_INHABITANTS_NUMB' => $_POST['num'],
            'REQUEST_AVERAGE_INCOME' => $_POST['ingresop'],
            'REQUEST_FAMILY_TYPE' => $_POST['fam-tipo'],
            'REQUEST_FAMILY_OTHER' => ucfirst(strtolower($_POST['otro-desc'])),
            'REQUEST_LOBORAL_COND' => $_POST['condicion'],
            'REQUEST_GRAFFAR_ONE' => $_POST['g1'],
            'REQUEST_GRAFFAR_TWO' => $_POST['g2'],
            'REQUEST_GRAFFAR_THREE' => $_POST['g3'],
            'REQUEST_GRAFFAR_FOUR' => $_POST['g4'],
            'REQUEST_GRAFFAR_PORCTG' => $porcentaje
        ));
    }
}

?>