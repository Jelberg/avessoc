
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

                <section class="grid-2">

                    <div class="item2">
                        <h2>Busqueda de Patrocinante</h2>
                        <button class="rigth" id="button">Eliminar</button>
                            <?php
                            echo llenaListaSponsor();
                            ?>
                    </div> <!--fin div 2 grid-2-->

                </section> <!--fin section grid-2-->

    </div><!-- fin  area-2 del grid-1Show _MENU_ entries -->
</div> <!-- fin  grid-1-->


</body>