<?php
/*if(!empty($_POST)){
    //$comando = $_GET['comand'];
    $valor = $_POST['valor'];
    //$v = $_POST['name'];
    echo deleteSponsor($valor);
     /*   switch ($comando) {
            case "selectQuery":
                echo select();
                break;
            case "updateQuery":
                echo update();
                break;
            case "DeleteSponsor":
                echo deleteSponsor($valor);
                break;
        }
}else return "WHYYY ??";
*/

//header("http://dev.avessoc.org.ve/avessoc-registro-paciente/");
echo '
    <script>alert("Entrooooooooooo")</script>
    ';

function select(){
}

function update(){
}

/*function deleteSponsor($id_sponsor){
global $wpdb;
$wpdb->delete('SPONSOR',array('MPERSON_ID'=>$id_sponsor));
return "YESS";
}*/

?>