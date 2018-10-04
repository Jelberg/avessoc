<?php

/* Template Name: Search Medical Centers */

get_header();
include "menu.php";
include "function-templates/template-search-mdcenter-function.php";
?>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            <div class="item-1">
                <?php
                echo muestraListaMdcenter();
                ?>
            </div>
        </section>

    </div><!-- fin  area-3 del grid-container -->
</section> <!-- fin  grid-container-->
<script language="JavaScript">

    function eliminarxid(id){
        swal({
            title: "Advertencia!",
            text: "Una vez eliminado el patrocinante, se borraran todos los registros!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.swal({
                        title: "Eliminando...",
                        text: "Por favor, espere",
                        button:false,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $.post('<?php echo PATH_PAG_SEARCH_MDCENTER; ?>', {mdcenter_del: id});
                    window.location.reload(false);
                }
            });
    }

</script>
</body>
