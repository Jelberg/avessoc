
<?php

/* Template Name: Search Pre-Order */

get_header();
include "menu.php";
?>

<head>

</head>

<body>

<section class="grid-container">

    <div class="area-2">
        <?php
        mostrarMenu();
        ?>
    </div> <!-- fin area 2-->

    <div class="area-3">
        <section class="grid-2">

            <div class="item2">

                <h2>Busqueda Pre-Ordenes</h2>

                <?php
                echo llenaListaPreOrdenes();
                ?>

            </div> <!--fin div 2 grid-2-->

        </section> <!--fin section grid-2-->

    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->

</body>

