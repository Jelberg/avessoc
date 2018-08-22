<?php

/* Template Name: Register patient */

get_header();


?>



<section class="grid-1">

    <div class="area-1"> <!--PENDIENTE ARREGLAR-->
        <p>-</p>
        <p>-</p>
        <p>-</p>
    </div>

    <div class="area-2">
        <h1>Menu</h1>
    </div>

    <div class="area-3">

        <!-- DATOS PERSONALES -->
     
        <label for="name">Tipo de Documento</label><select id="tipo-documento">
            <option value="V">V</option>
            <option value="E">E</option>
            <option value="P">Passaporte</option>
            <option value="RIF">RIF</option>
        </select>
        <label for="name">Titular</label><select id="titular">
            <option value="PR">Propio</option>
            <option value="M">Madre</option>
            <option value="P">Padre</option>
            <option value="R">Representante</option>
        </select>
        <label for="name">Numero del documento</label><input type="text"name="name" id="numero-doc" />
        <label for="name">Primer Nombre</label><input type="text"name="name" id="name-uno" />
        <label for="name">Segundo Nombre</label><input type="text"name="name" id="name-dos" />
        <label for="name">Primer Apellido</label><input type="text"name="name" id="apellido-uno" />
        <label for="name">Segundo Segundo</label><input type="text"name="name" id="apellido-dos" />
        <label for="name">Fecha de Nacimiento</label><input type="date" name="name" id="birth-date" />
        <label for="name">Sexo</label><select id="Sexo">
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
        <label for="name">Estado Civil</label><select id="estado-civil">
            <option value="S">Soltero</option>
            <option value="C">Casado</option>
            <option value="D">Divorciado</option>
            <option value="V">Viudo</option>
        </select>
        <label for="name">Profesion u Oficio</label><input type="text" name="name" id="oficio" />
        <label for="name">Nacionalidad</label><input type="text" name="name" id="nacionalidad" />
        
        <!-- FIN DATOS PERSONALES -->

        <!-- DIRECCION -->
       
        <label for="name">Direccion</label><input type="text" name="direccion" id="direccion" />
        <label for="name">Estado</label><select id="estado">
        </select>
        <label for="name">Municipio</label><select id="municipio">
        </select>
        <label for="name">Parroquia</label><select id="parroquia">
        </select>
      
        <!-- FIN DIRECCION -->


        <!-- CONTACTO -->

        <label for="name">Telefono Local</label><input type="number" name="local" id="local" />
        <label for="name">Telefono Movil</label><input type="number" name="movil" id="movil" />
        <label for="name">Correo</label><input type="number" name="correo" id="correo" />

        <!-- FIN CONTACTO -->


        <!-- COMPOSICION FAMILIAR -->

        <label for="name">Numero de personas que viven en el hogar</label><input type="number" name="num-personas" id="num-personas" />
        <label for="name">Ingreso Promedio Mensual</label><input type="number" name="ingreso-promedio" id="ingreso-promedio" />
        <label for="name">Tipo de familia con la que convive</label><select id="familia-tipo">
            <option value="S">Una sola persona</option>
            <option value="C">Pareja sin hijos</option>
            <option value="D">Madre/Padre solo, con hijos</option>
            <option value="V">Madre y Padre con hijos y otros parientes</option>
            <option value="V">Madre/Padre solo, hijos y otros parientes</option>
            <option value="V">Niño/a o adolence en entidad de atencion </option>
            <option value="V">Otro</option>
        </select>
        <label for="name">En caso de ser otro especifique</label><input type="text" name="otro-tipo" id="otro-tipo" />

        <!-- FIN COMPOSICION FAMILIAR -->



        <!-- DETALLE LABORAL -->

        <label for="name">Condicion laboral</label><select id="condicion-laboral">
            <option value="S">Desocupado/ Sin trabajo</option>
            <option value="C">Oficios del hogar</option>
            <option value="D">Trabajo formal (Empresas, Organismos de estados, etc.)</option>
            <option value="V">Trabajo informal a destajo, trabajo temporal)</option>
        </select>

        <!-- FIN DETALLE LABORAL -->


        <!-- CLASIFICACION GRAFFAR -->

            <form>
                <label>Profesion del jefe del hogar</label>
                <li><input type="radio" name="UNO" id="uno-1" /><label for="uno-1">Profesion Universitaria</label></li>
                <li><input type="radio" name="UNO" id="uno-2" /><label for="uno-2">Profesion Tecnica superior o medianos comerciantes o productores</label></li>
                <li><input type="radio" name="UNO" id="uno-3" /><label for="uno-3">Empleados sin profesion universitaria. Bachiller tecnico, pequeños comerciantes o propietarios</label></li>
                <li><input type="radio" name="UNO" id="uno-4" /><label for="uno-4">Obreros especializados, parte de los trabajadores del sector informal de la economia </label></li>
                <li><input type="radio" name="UNO" id="uno-5" /><label for="uno-5">Obreros no especializados y otra parte del sector informal de la economia</label></li>
            </form>

            <form>
                <label>Nivel de instruccion de la esposa o conyugue</label>
                <li><input type="radio" name="DOS" id="dos-1" /><label for="dos-1">Enseñanza universitaria o su equivalente</label></li>
                <li><input type="radio" name="DOS" id="dos-2" /><label for="dos-2">Enseñan secundaria completa</label></li>
                <li><input type="radio" name="DOS" id="dos-3" /><label for="dos-3">Enseñanza secundaria incompleta</label></li>
                <li><input type="radio" name="DOS" id="dos-4" /><label for="dos-4">Enseñanza primaria o alfabeta (Algun grado de instruccion primaria)</label></li>
                <li><input type="radio" name="DOS" id="dos-5" /><label for="dos-5">Analfabeta</label></li>
            </form>

            <form>
                <label>Principal fuente de ingreso</label>
                <li><input type="radio" name="TRES" id="tres-1" /><label for="tres-1">Fortuna heredada o adquirida</label></li>
                <li><input type="radio" name="TRES" id="tres-2" /><label for="tres-2">Ganancia, beneficios, honorarios profesionales</label></li>
                <li><input type="radio" name="TRES" id="tres-3" /><label for="tres-3">Sueldo mensual</label></li>
                <li><input type="radio" name="TRES" id="tres-4" /><label for="tres-4">Sueldo semanal, por dia. Entrada a destajo</label></li>
                <li><input type="radio" name="TRES" id="tres-5" /><label for="tres-5">Donaciones de origen público o privado</label></li>
            </form>

            <form>
                <label>Condiciones de alojamiento</label>
                <li><input type="radio" name="CUATRO" id="cuatro-1" /><label for="">Vivienda con optimas condiciones sanitarias y ambientales de gran lujo</label></li>
                <li><input type="radio" name="CUATRO" id="cuatro-2" /><label for="">Vivienda con óptimas condiciones sanitarias, en ambientes con lujo, sin excesos y suficientes espacios.</label></li>
                <li><input type="radio" name="CUATRO" id="cuatro-3" /><label for="">Vivienda con buenas condiciones sanitarias en espacios reducidos o no, pero siempre menores que en la viviendas 1 y 2</label></li>
                <li><input type="radio" name="CUATRO" id="cuatro-4" /><label for="">Viviendas con ambientes espaciosos o reducidos y/o con deficiencias en algunas condiciones sanitarias</label></li>
                <li><input type="radio" name="CUATRO" id="cuatro-5" /><label for="">Rancho o vivienda con espacios insuficientes y condiciones sanitarias marcadamente inadecuadas</label></li>
            </form>


        <!-- FIN CLASIFICACION GRAFFAR -->



        <button type="submit" name="submit" id="submit">Submit</button>

    </div>
</section>
