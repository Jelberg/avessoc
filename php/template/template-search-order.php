
<?php

/* Template Name: Search Order */

get_header();
include "menu.php";
include "function-templates/template-search-order-function.php";
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

                <h2>Busqueda Ordenes</h2>

                <?php
                echo llenaListaOrdenes();
                ?>

            </div> <!--fin div 2 grid-2-->

        </section> <!--fin section grid-2-->

    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->

</body>

