
<?php

/* Template Name: Search Sponsor */

get_header();
include "menu.php";
include "function-templates/template-search-sponsor-function.php";
?>

<head>


    <script>
        $(function() {
            $( "#dialog-confirm" ).dialog({
                resizable: false,
                height:140,
                modal: true,
                buttons: {
                    "Delete all items": function() {
                        $( this ).dialog( "close" );
                    },
                    Cancel: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        });
    </script>
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

                <section class="grid-2">

                    <div class="item2">

                        <h2>Busqueda de Patrocinante</h2>

                            <?php
                            echo llenaListaSponsor();
                            ?>

                    </div> <!--fin div 2 grid-2-->

                </section> <!--fin section grid-2-->

    </div><!-- fin  area-2 del grid-1Show _MENU_ entries -->

</div> <!-- fin  grid-1-->

<div id="dialog-confirm" title="Eliminar？">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Si o No？</p>
</div>

</body>