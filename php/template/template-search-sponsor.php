
<?php

/* Template Name: Search Sponsor */

get_header();
include "template-search-sponsor-index.php";
?>

<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>

<body>

<section class="grid-1">

    <div class="area-2">
        <!--Area del menu para navegacion-->
    </div> <!-- fin area 2-->

    <div class="area-3">
        <form name="formSearchSponsor" id="formSearchSponsor" method="post" action=""> <!--Inicio de formulario-->

                <section class="grid-3">
                    <div class="item1">

                        <section class="grid-columns"><!--la informacion se ordena en filas-->

                            <div class="item1" >
                                <select id="opcion-busqueda" name="opcion-busqueda" class="select" required>
                                    <option value="" selected>Seleccione</option>
                                    <option value="V" selected> V </option>
                                    <option value="E" selected> E </option>
                                    <option value="RIF" selected> RIF </option>
                                    <option value="NL" selected> Nombre Legal </option>
                                </select><br>
                            </div>
                            <div class="item2">
                                <input type="text" id="criterio-sponsor" name="criterio-sponsor" class="search" />
                            </div>
                            <div class="item3">
                                <button id="buscar-sponsor" name="buscar-sponsor" class="button-search">BUSCAR</button>
                            </div>

                        </section><!--Grid de filas -->

                    </div> <!--fin del item 1 del grid-3-->

                    <div class="item2">
                        <table id="example" class="display" style="width:70%">
                            <thead>
                            <tr>
                                <th>Nombre Legal</th>
                                <th>Tipo de Documento</th>
                                <th>Número de documento</th>
                            </tr>
                            </thead>
                            <tbody>    
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                            </tr>
                            <?php llenaListaPatrocinantes(); ?>
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
    </div><!-- fin  area-3 del grid-1Show _MENU_ entries -->
</section> <!-- fin  grid-1-->

</body>

