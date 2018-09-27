
<?php

/* Template Name: Search Sponsor */

get_header();
include "menu.php";
include "function-templates/template-search-sponsor-function.php";

?>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script language="JavaScript">
        /*$(function() {
            $( "#dialog-confirm" ).dialog({
                autoOpen: false,
            });

            $( "#hola" ).click(function() {
                $( "#dialog-confirm" ).dialog( {
                    resizable: false,
                    height:140,
                    modal: true,
                    buttons: {
                        "SI" :{
                            text: "OK",
                            id: "btn-ok",
                            click: function(e){

                                //$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

                                //$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');

                                //$( this ).dialog( "close" );

                            }
                        }
                    }
                });
            });
        });*/


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
                    $.post('http://dev.avessoc.org.ve/avessos-buscar-patrocinante/', {sponsor_del: id});
                    window.location.reload(false);
                }
            });
    }

</script>

</body>
