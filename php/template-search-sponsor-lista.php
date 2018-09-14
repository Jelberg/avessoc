<?php

global $wpdb;

$query_sponsor ="SELECT MPERSON_LEGAL_NAME, MPERSON_TYPE_DOC, MPERSON_IDENTF FROM SPONSOR;";
$tabla ="";


foreach( $wpdb->get_results($query_sponsor) as $key => $row){

    $tabla .= '{ "MPERSON_LEGAL_NAME":"'.$row->MPERSON_LEGAL_NAME.'","MPERSON_TYPE_DOC":"'.$row->MPERSON_TYPE_DOC.'","MPERSON_IDENTF":"'.$row->MPERSON_IDENTF.'"},';

}

$tabla = substr($tabla,0,strlen($tabla)-1);
$data_table =  '{"data":['.$tabla.']}';
echo $data_table;


?>