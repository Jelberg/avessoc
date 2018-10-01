<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <script language="JavaScript">

        $(document).ready(function() {
            var table = $('#examenescentros').DataTable({
                    "language": {
                        "loadingRecords": "Cargando...",
                        "decimal": ",",
                        "thousands": ".",
                        "processing": "Procesando...",
                        "lengthMenu": "Mostrar _MENU_ entradas ",
                        "zeroRecords": "La lista esta vacía",
                        "search": "Buscar:",
                        "info": "pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "paginate": {
                            "first": "Primera",
                            "last": "Ultima",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    "searching": false,
                    "paging":   false,
                    "ordering": false,
                    "info":     false
                });

            var count=0; // Variable que va aumentando a medida que se agregan items de la lista

        /**
         * Se serializan los datos para mandarlos por ajax
         * */
            $('#pruebaenvio').click( function() {
                var contador;
                for(i=1; i <= 8; i++ ){
                    if (verificaForm(i)){
                        contador++;
                    }else alert("Complete los campos de la fila: ".concat(i).concat(". O elimine la fila"));
                }

                if (contador == 8){
                    //Manda todos los datos en el submit
                    var data = table.$('input, select').serialize();
                    $.get(" http://dev.avessoc.org.ve/avessoc-registrar-examenes-centros/" ,{datos:data});
                    //document.getElementsByTagName("ExamenCentroForm").submit();
                    window.location.reload(false);
                    return true;
                }
                else return false;
            });


            /**
             * Añade otra fila a la tabla   NO USADO
             * */
            $('#addRow').on( 'click', function () {
                count++;
                table.row.add( [
                    '<select id="centro'.concat(count).concat('"').concat('" name="centro').concat(count).concat('"').concat('" class="select-area"> <option value="" selected> >>Seleccione opción<< </option> <?php echo llenaListaCentros(); ?>').concat('</select>'),
                    '<input type="number" class="form-area-number" id="precio'.concat(count).concat('"').concat('step="0.01"  min="1"  placeholder="Sólo hasta dos(2) decimales Ej.: 123,45"').concat(' name="precio').concat(count).concat('"').concat('required/>'),
                    '<select '.concat('id="disp').concat(count).concat('"').concat('name="disp').concat(count).concat('"').concat('class="select-area" name="disp" required> <option value="N" selected> No </option> <option value="S" selected> Si </option> </select>')
                ] ).draw( false );
            } );

            // Llena automaticamente 8 FILAS
            $('#addRow').click();

            /**
             * Selecciona un elemento de la fila
             */
            $('#examenescentros tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );

            /**
             *
             * Elimina una fila del sistema
             */
            $('#eliminafila').click( function () {
                table.row('.selected').remove().draw( false );
            } );

        });




    </script>
</body>
</html>

<?php

/**
 * Funcion dibuja el combo box de los examenes registrados en el sistema
 */
function mostrarExamenes(){
    global $wpdb;
    $combo = '<label for="name">Seleccione Examen</label><span class="required">* </span><br>'."\n";
    $combo .= '<select id="tipo-examen" name="tipo-examen" class="select-area-two" required>'."\n" ;
    $combo .= '<option value="" selected> >>Seleccione opción<< </option>'."\n";
    // Aqui va la consulta que trae los examens con sus id
    $query="SELECT EXAM_ID, EXAM_DESC FROM EXAM ORDER BY EXAM_DESC ASC";
    foreach( $wpdb->get_results($query) as $key => $row) {
        $combo .= '<option value="'.$row->EXAM_ID.'" selected>'.$row->EXAM_DESC.'</option>'."\n";
    }

    $combo .= '</select>'."\n";

    return $combo;
}


/**
 * Funcion dibuja la tabla del datatable
 * @return string
 */
function llenaTabla(){
    $lista="";

    $lista .= '
    <table id="examenescentros" class="display" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Centro de Salud</th>
                                <th>Precio Examen</th>
                                <th>Disponibilidad</th>
                            </tr>
                            </thead>
                            <tbody>
    ';

    $lista .= '
    </tbody>
                            <tfoot>
                            <tr>
                                <th>Centro de Salud</th>
                                <th>Precio Examen</th>
                                <th>Disponibilidad</th>
                            </tr>
                            </tfoot>
                        </table>
    ';
    return $lista;

}

/**
 * Llena el combo de centros de salud
 * @return string
 */
function llenaListaCentros(){
    global $wpdb;
    $lista="";

    $query ="SELECT MPERSON_ID, MPERSON_LEGAL_NAME FROM MDCENTER ORDER BY MPERSON_LEGAL_NAME ASC;";
    foreach( $wpdb->get_results($query) as $key => $row) {
        $lista .= '<option value="'.$row->MPERSON_ID.'" selected>'.$row->MPERSON_LEGAL_NAME.'</option>';
    }

    return $lista;
}


?>
