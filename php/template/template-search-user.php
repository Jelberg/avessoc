
<?php

/* Template Name: Search Users */

get_header();
include "menu.php";
include "function-templates/template-search-user-function.php";
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
                        <h2>Buscar Usuarios</h2>
                            <?php
                            echo llenaListaUsuarios();
                            ?>

                    </div> <!--fin div 3 grid-3-->

                </section> <!--fin section grid-3-->


    </div><!-- fin  area-3 del grid-1Show _MENU_ entries -->
</div> <!-- fin  grid-1-->


</body>