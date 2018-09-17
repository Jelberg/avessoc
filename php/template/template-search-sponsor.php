
<?php

/* Template Name: Search Sponsor */

get_header();
include "template-search-sponsor-index.php";
include "menu.php";
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
        <form name="formSearchSponsor" id="formSearchSponsor" method="post" action=""> <!--Inicio de formulario-->

                <section class="grid-2">
                    <div class="item2">
                        <h2>Busqueda de Patrocinante</h2>
                            <?php
                            echo llenaListaSponsor();
                            ?>
                    </div> <!--fin div 2 grid-2-->

                </section> <!--fin section grid-2-->


        </form><!--fin de formulario-->
    </div><!-- fin  area-2 del grid-1Show _MENU_ entries -->
</div> <!-- fin  grid-1-->


</body>