<?php

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
function search_sponsor_id(){
    global $wpdb;
    $query ="SELECT MPERSON_ID FROM `SPONSOR` WHERE MPERSON_IDENTF = ".$_POST["numero-doc"]." AND MPERSON_TYPE_DOC ='".$_POST["tipo-documento"]."'";
    $id_sponsor= $wpdb->get_var( $query );
    return $id_sponsor;
}

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