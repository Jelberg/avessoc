<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .alert {
            padding: 20px;
            box-sizing: border-box;
            display: block;
            float: none;
            bottom: 0;
            align-self: center;
            position: fixed;
            z-index: 999;
            background-color: #f44336;
            color: white;
            opacity: 1;
            transition: opacity 0.6s;
        }

        .alert.success {background-color: #4CAF50;}
        .alert.info {background-color: #2196F3;}
        .alert.warning {background-color: #ff9800;}

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>

    <script language="JavaScript">
        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>

</head>
<body>

<?php
/**
 * Notificacion para mensajes de Error
 * @param $titulo
 * @param $mensaje
 */
function notificationDanger($titulo,$mensaje){
    $alerta = '
    <div id="notif" class="alert">
    <span class="closebtn" onclick="cierreNotification()">x</span>
    <strong>'.$titulo.'</strong><br> 
    <p>'.$mensaje.'</p>
    </div>
    ';
    echo $alerta;
}

/**
 * Notificacion para mensajes de exitoso
 * @param $titulo
 * @param $mensaje
 */
function notificationSuccess($titulo,$mensaje){
    $alerta='
    <div id="notif" class="alert success">
    <span class="closebtn" onclick="cierreNotification()">x</span>
    <strong>'.$titulo.'</strong><br> 
    <p>'.$mensaje.'</p>
    </div>
    ';

    echo $alerta;
}

/**
 * Notificacion para mensajes ede Informacion
 * @param $titulo
 * @param $mensaje
 */
function notificationInfo($titulo,$mensaje){
    $alerta='
    <div id="notif" class="alert info">
    <span class="closebtn" onclick="cierreNotification()">x</span>
    <strong>'.$titulo.'</strong><br> 
    <p>'.$mensaje.'</p>
    </div>
    ';

    echo $alerta;
}


/**
 * Notificacion para mensajes de advertencia
 * @param $titulo
 * @param $mensaje
 */
function notificationWarning($titulo,$mensaje){
    $alerta='
    <div id="notif" class="alert warning">
    <span class="closebtn" onclick="cierreNotification()">x</span>
    <strong>'.$titulo.'</strong><br> 
    <p>'.$mensaje.'</p>
    </div>
    ';

    echo $alerta;
}
?>

<script language="JavaScript">

    /**
     * Funcion que cierra la ventana de notificacion usando la etiqueta span
     */
    function cierreNotification() {
        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }

    }

</script>


</body>
</html>