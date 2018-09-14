
<?php

/* Template Name: Search Patient */

get_header();
include "template-search-patient-index.php";
include "menu.php";
?>

<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script language="JavaScript">

        $(document).ready(function() {
            $('#paciente').DataTable( {
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

<section class="grid-1">

    <div class="area-2">
        <!--Area del menu para navegacion-->
        <?php
        mostrarMenu();
        ?>
    </div> <!-- fin area 2-->

    <div class="area-3">
        <form name="formSearchSponsor" id="formSearchSponsor" method="post" action=""> <!--Inicio de formulario-->

                <section class="grid-3">
                    <h3>Buscar Pacientes</h3>
                    <div class="item2">
                        <table id="paciente" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>T. Doc</th>
                                <th>Número de identidad</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            global $wpdb;
                            $query ="SELECT MPERSON_NAME, MPERSON_LAST_NAME, MPERSON_TYPE_DOC, MPERSON_IDENTF FROM PATIENT";
                            foreach( $wpdb->get_results($query) as $key => $row){
                                $uno =$row->MPERSON_NAME;
                                $dos=$row-> MPERSON_LAST_NAME;
                                $tres=$row->MPERSON_TYPE_DOC;
                                $cuatro=$row->MPERSON_IDENTF;
                                ?>
                            <tr>
                                <td><?php printf($uno); ?></td>
                                <td><?php printf($dos); ?></td>
                                <td><?php printf($tres); ?></td>
                                <td><?php printf($cuatro); ?></td>
                            </tr>
                            <?php
                                 }?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>T. Doc</th>
                                <th>Número de identidad</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div> <!--fin div 3 grid-3-->

                </section> <!--fin section grid-3-->


        </form><!--fin de formulario-->
    </div><!-- fin  area-3 del grid-1Show _MENU_ entries -->
</section> <!-- fin  grid-1-->


</body>