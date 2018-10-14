<html>
<head>
    <script language="JavaScript">
        /**
         * Form para validar que los datos sean los correctos
         */
           function validaForm() {
            var logitud = seudonimos.length;
            var password = document.getElementById("pass").value;
            var password2 = document.getElementById("pass2").value;
            var pass = "NO"; // variable para saber si encontro el seudoimo
            var pse = document.getElementById("seudonimo").value;
            var tamañopass = password.length;
            var tamañopse = pse.length;
            for (i = 0; i < logitud; i++) {
                if (seudonimos[i] == pse) {
                    alert("El seudónimo ingresado ya existe\n Por favor ingrese otro.");
                    pass = "SI";
                }
                if (password =! password2){
                    alert("Las claves no coinciden");
                    pass = "SI";
                }
                if (tamañopass < 4){
                    alert("Password con minimo de 4 caracteres");
                    pass = "SI";
                }
                if (tamañopse < 4){
                    alert("Seudónimo con minimo de 4 caracteres");
                    pass = "SI";
                }
            }
            if (pass == 'NO') {
                jQuery(function ($) {
                    $('#FormAddUser').submit();
                });
            }
        }


    </script>
</head>
<body>

</body>
</html>

<?php
session_start();

//podemos pasar un array de direcciones de email a cuales enviar.
$to=array('elbergjessica@gmail.com');

//Asunto del email
$subject=$submit['asunto'];

//La dirección de envio del email es la de nuestro blog por lo que agregando este header podremos responder al remitente original
$headers = 'Reply-to: Jessica <Elberg elbergjessica@gmaiñ.com>'."\r\n";


//El mensaje a enviar. Se puede incluir HTML si enviamos el email en modo HTML y no texto.
$message.='Hola <br/>';
$message.='Te gusta este tutorial?';


//Filtro para indicar que email debe ser enviado en modo HTML
add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));

//Cambiamos el remitente del email que en Wordpress por defecto es tu email de admin
add_filter('wp_mail_from','mqw_email_from');

function mqw_email_from($content_type) {
    return 'elbergjessica@gmail.com';
}


//Por último enviamos el email
wp_mail( $to, $subject, $message, $headers);



/**
 * Llena el combo con los centros de Salud
 */
function llenaListaMDC(){
    global $wpdb;
    $combo = "";
    $query = "SELECT MPERSON_ID, MPERSON_LEGAL_NAME FROM MDCENTER ORDER BY MPERSON_LEGAL_NAME ASC";

    foreach ($wpdb->get_results($query) as $key => $row){
        $combo .= '<option value="'.$row->MPERSON_ID.'">'.$row->MPERSON_LEGAL_NAME.'</option>';
    }

    return $combo;
}


/**
 * Inserta el usuario en la base de datos
 */
function agregarUsuario(){
    $messageIdent = md5($_POST["nombre"].$_POST["seudonimo"].$_POST["apellido"]); // Se hace hash sobre los valoes de los parametros

    $sessionMessageIdent = isset($_SESSION['messageIdent'])?$_SESSION['messageIdent']:''; // si la variable de sesion esta definida entonces se asigna a la variable el valor de la sesion si no se asigna ''

    if($messageIdent!=$sessionMessageIdent) {
        $_SESSION['messageIdent'] = $messageIdent; // Se guarda la nueva variable de sesion
        global $wpdb;
        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['pass']) && !empty($_POST['seudonimo']) &&
            !empty($_POST['email']) && !empty($_POST['privilegio']) && !empty($_POST['centro'])) {
            $wpdb->insert('USER', array(
                'MPERSON_NAME' => $_POST['nombre'],
                'MPERSON_LAST_NAME' => $_POST['apellido'],
                'USER_PASS' => $_POST['pass'],
                'USER_PSEUDONYM' => $_POST['seudonimo'],
                'USER_PRIVILEGE_LEVL' => $_POST['privilegio'],
                'USER_COMPANY' => $_POST['centro']
            ));


            $id = $wpdb->get_var("SELECT MPERSON_ID FROM USER ORDER BY MPERSON_ID DESC");
            //Agrega el correo en contacto
            $wpdb->insert('CONTACT', array(
                'CONTACT_EMAIL' => $_POST['email'],
                'CONTACT_USER_MPERSON_ID' => $id
            ));
        }
    }
}


/**
 * Funcion llena el array de seudonimos para compararlos con el de que ingresa el usuario el cual debe de ser unico
 */
function llenaArraySeudonimos(){
    global  $wpdb;
    $query="SELECT USER_PSEUDONYM FROM USER";
    $i =0;
    foreach ($wpdb->get_results($query) as $key => $row){
        echo 'seudonimos['.$i.']="'.$row->USER_PSEUDONYM.'"'.";\n";
        $i = $i +1;
    }

}

function mandaCorreo(){
//Segundo espacia mejor tu codigo para que sea mas legible.
    $mmm = "JESSICA ELBERG";
    $header = 'From: ' . $mmm . " \r\n". //Supongo que sabes que no hace falta poner las variables fuera del string stream.
        "X-Mailer: PHP/".phpversion()." \r\n".
        "Mime-Version: 1.0 \r\n".
        "Content-Type: text/plain\r\n".
        "\r\n"; //Creo que aqui falta este \r\n que no tienes en tu codigo. No estoy seguro.

    $mensaje = "Este mensaje fue enviado por: ,\n reservando:  ". //He hecho cambios en lo que comente de las variables. Ahora el codigo es mas legible.
        "pares de entradas para la función de perro del viernes  \r\n". //Parece que fun es algo sin determinar, creo que te falta el comodin de variable.
        "La reserva estará vigente hasta el 20:30 hs. del día de función, retirando ".
        "las entradas exclusivamente en efectivo en el Auditorio en brama 1350, Palermo. ".
        "Cada par de entradas tiene un valor de $100. ".
        "La reserva implica un compromiso, pedimos que cualquier cancelación sea informada ".
        "por mail a xxx@xxx.com.ar o llamando por teléfono al Auditorio a los tel. 4444-3418/2439.".

        "Teléfono de contacto de quien reserva: \r\n".
        "Enviado el ".date('d/m/Y', time()).
        ""; //esta linea es solo para hacerlo mas amistoso a la vista, puedes quitarlo y poner un ; detras  de date()

    $para = "elbergjessica@gmail.com, $mmm \r\n"; //No hace falta poner la variable fuera del stream
    $asunto = 'RESERVA 2x1para Perro';

    mail($para, $asunto, utf8_decode($mensaje), $header);
}

?>