
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

<!--div id="dialog-confirm" title="Desea eliminar？">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span></p>
</div-->


<script language="JavaScript">

    function eliminarxid(valor){
        var id = valor;
        /*console.log(id);
        swal({
            title: "Advertencia?",
            text: "Una vez eliminado el patrocinante, se borraran todos los registros!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    go(valor,"DeleteSponsor");
                    swal("Patrocinante eliminado", {
                        icon: "success",
                    });
                }
            });
        p = confirm("Estas seguro?");
        if(p){
                    $.post("http://dev.avessoc.org.ve/wp-content/themes/hestia-child/page-templates/sponsorcrud.php",
                        {
                            name: "Donald Duck",
                            city: "Duckburg"
                        },
                        function(data,status){
                            alert("Data: " + data + "\nStatus: " + status);
                        });


        }*/
        go(id,"DeleteSponsor");
    }

    function go(valor,comando){
        var a = "wp-content/themes/hestia-child/page-templates/sponsorcrud.php";
        $.post(a,
            {
                comand: comando,
                val: valor,

            },
            function(resp) {
                console.log(resp);
            });
        //window.location.reload();
    }

    function go2(valor,comando) {
        $.ajax({
            url: "http://dev.avessoc.org.ve/wp-content/themes/hestia-child/page-templates/sponsorcrud.php", //http:/ /www.ejemplo.com/peticion
            type: "POST", // POST, GET, PUT, DELETE
            dataType: {comand: comando, val:valor},
            success: function(data){
                console.log("Todo ha funcionado");
            } ,
            error: function(){
                console.log("Ha ocurrido un error! :(");
            }
        });
    }

</script>

</body>
