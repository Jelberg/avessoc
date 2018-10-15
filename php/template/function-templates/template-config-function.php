<html>
	<head>
		<script languaje="javascript">
			
		var email ="";

		<?php 
			evaluaDesicion();
			configExtra();
		?>

		function cargaemail(){
			document.getElementById("email").value = email;	
		}

		</script>

	</head>
	<body></body>
</html>

<?php 



/**
*
*Funcion Carga la informacion de la tabla extra a la ventana de configuracion, dicha configuracion es para el email del centro donde va a recibir el correo de las pre-ordenes generadas
*/
function configExtra(){
	global $wpdb;
    session_start();

	$id_centro = $wpdb->get_var("SELECT USER_COMPANY FROM USER  WHERE MPERSON_ID=".$_SESSION['user_load']['id']);

	$query="SELECT EXTRA_EMAIL FROM EXTRA WHERE EXTRA_COMPANY=".$id_centro;

	foreach ($wpdb->get_results($query) as $key => $value) {
		echo 'email="'.$value->EXTRA_EMAIL.'"'.";\n";
	}
}


/**
*
*Funcion inserta en la tabla extra los datos de correo y el centro al que pertenece
*/
function insertEmail(){
	global $wpdb;
	// trae el id del centro
	$id_centro = $wpdb->get_var("SELECT USER_COMPANY FROM USER  WHERE MPERSON_ID=".$_SESSION['user_load']['id']);
	$wpdb->insert('EXTRA', array(
			'EXTRA_EMAIL' => $_POST['email'],
			'EXTRA_COMPANY' => $id_centro
		));
}

/**
*
*Actualiza los datos de la tabla extra, conrespecto al correo
*/
function updateEmail(){
	global $wpdb;
	$id_centro = $wpdb->get_var("SELECT USER_COMPANY FROM USER  WHERE MPERSON_ID=".$_SESSION['user_load']['id']);
	$wpdb->update('EXTRA',array(
		'EXTRA_EMAIL' => $_POST['email']
		),
		array(
		'EXTRA_COMPANY'=>$id_centro
		));
}


/*
*
*Funcion determina si es un insert o un update
*/
function evaluaDesicion(){
	if ( !empty($_POST['email']) ){
		global $wpdb;
			
			// -se obtiene el id del centro al que pertenece el usuario
			$id_centro = $wpdb->get_var("SELECT USER_COMPANY FROM USER  WHERE MPERSON_ID=".$_SESSION['user_load']['id']);
				
				// Si no retorna nada es que no existe la configuracion en la tabla
			$id_centro_extra = $wpdb->get_var("SELECT EXTRA_COMPANY FROM EXTRA WHERE EXTRA_COMPANY=".$id_centro); 

			if ($id_centro_extra == ""){
				 insertEmail();
			}else {
				updateEmail();
			}
	}
}

?>