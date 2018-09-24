
<?php

/* Template Name: Search Sponsor */

get_header();
include "menu.php";
include "function-templates/template-search-sponsor-function.php";
?>

<head>

</head>

<body>

<div class="grid-container">

    <div class="item2">
        <!--Area del menu para navegacion-->
        <?php
        mostrarMenu();
        ?>
    </div> <!-- fin area 2-->

    <div class="item3">
            <form name="formSponsorSearch" id="formSponsorSearch" method="post" action="function-templates/template-search-sponsor-function.php" class="AjaxForm">
                <section class="grid-2">

                    <div class="item2">
                        <h2>Busqueda de Patrocinante</h2>

                            <?php
                            echo llenaListaSponsor();
                            ?>
                    </div> <!--fin div 2 grid-2-->

                </section> <!--fin section grid-2-->
            </form>
    </div><!-- fin  area-2 del grid-1Show _MENU_ entries -->
</div> <!-- fin  grid-1-->

<script language="JavaScript">
    function eliminar(id){
        var aidi = id;
        var variableToSend = id;
        $.post('http://dev.avessoc.org.ve/avessos-buscar-patrocinante/', {
            variable: variableToSend});
        /*  $.ajax({
              type: 'POST',
              url: "http://dev.avessoc.org.ve/avessos-buscar-patrocinante/",
              data: {aidi: 'aidi'},
              success: function() {
                  alert("exitoso ".concat(aidi));*/
        <?php
        $variable = $_POST['variable'];
        echo 'alert("ID '.$variable.'");';
        //deleteSponsor($_POST['aidi']);
        ?>
        /*     }
         });*/

    }
</script>


</body>