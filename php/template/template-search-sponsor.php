
<?php

/* Template Name: Search Sponsor */

get_header();
include "template-search-sponsor-index.php";
include "menu.php";
?>

<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script language="JavaScript">

        $(document).ready(function() {
            $('#example').DataTable( {
                "language": {
                    "loadingRecords": "Cargando...",
                    "decimal": ",",
                    "thousands": ".",
                    "processing":     "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ entradas ",
                    "zeroRecords": "No se encontró ningún registro disponible",
                    "search":         "Buscar:",
                    "info": "pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Ultima",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                }
            } );
        } );

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
        <form name="formSearchSponsor" id="formSearchSponsor" method="post" action=""> <!--Inicio de formulario-->

                <section class="grid-2">
                    <div class="item2">
                        <h2>Busqueda de Patrocinante</h2>
                        <table id="example" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Nombre Legal</th>
                                <th>Tipo de Documento</th>
                                <th>Número de documento</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach( $wpdb->get_results($query_sponsor) as $key => $row){
                                $uno =$row->MPERSON_LEGAL_NAME;
                                $dos=$row->MPERSON_TYPE_DOC;
                                $tres=$row->MPERSON_IDENTF;
                                ?>
                            <tr>
                                <td><?php printf($uno); ?></td>
                                <td><?php printf($dos); ?></td>
                                <td><?php printf($tres); ?></td>
                            </tr>
                            <?php
                                 }?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre Legal</th>
                                <th>Tipo de Documento</th>
                                <th>Número de documento</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div> <!--fin div 3 grid-3-->

                </section> <!--fin section grid-3-->


        </form><!--fin de formulario-->
    </div><!-- fin  area-2 del grid-1Show _MENU_ entries -->
</div> <!-- fin  grid-1-->


</body>