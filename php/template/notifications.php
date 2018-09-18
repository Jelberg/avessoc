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
            right: 0;
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
function notificationDanger($titulo,$mensaje){
    $alerta = '
    <div id="notif" class="alert">
    <span class="closebtn">&times;</span>
    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
    </div>
    ';
    echo $alerta;
}

function notificationSuccess($titulo,$mensaje){
    $alerta='
    <div id="notif" class="alert success">
    <span class="closebtn">&times;</span>
    <strong>Success!</strong> Indicates a successful or positive action.
    </div>
    ';

    echo $alerta;
}

function notificationInfo($titulo,$mensaje){
    $alerta='
    <div id="notif" class="alert info">
    <span class="closebtn">&times;</span>
    <strong>Info!</strong> Indicates a neutral informative change or action.
    </div>
    ';

    echo $alerta;
}

function notificationWarning($titulo,$mensaje){
    $alerta='
    <div id="notif" class="alert warning">
    <span class="closebtn">&times;</span>
    <strong>Warning!</strong> Indicates a warning that might need attention.
    </div>
    ';

    echo $alerta;
}
?>




</body>
</html>