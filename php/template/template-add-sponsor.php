
<?php

/* Template Name: HI MOM */

//get_header();
?>


<div class="wrap">
    <label for="legal-name">Nombre Legal</label><input type="text" name="legal-name" id="legal-name" />

    <label for="name">Tipo de Documento</label>
    <select id="tipo-documento">
                <option value="RIF">RIF</option>
                <option value="V">V</option>
                <option value="E">E</option>
                <option value="P">Passaporte</option>
    </select>
    <label for="name">Numero del documento</label><input type="number" name="numero-doc" id="numero-doc" />

    <div>
        <label for="logo">Logo</label>
        <input type="file"
               id="logo" name="logo"
               accept="image/png, image/jpeg" />
    </div>

    <label for="name">Aporte Inicial</label><input type="number" name="aporte" id="aporte" />
</div>
