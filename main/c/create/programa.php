<?php include('../../0/components/elements-l3.php'); ?>
<?php include('../../1/crud.php'); ?>
    
<div class="principal">
    <h2>Registro de programa</h2>
    <hr>

    <form action="code-programa.php" method="post" accept-charset="utf-8" class="row g-3">
        <div class="col-12">
            <label class="form-label" for="nombre">Nombre programa *</label>
            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Análisis y Desarrollo de Software" required>
        </div>

        <div class="col-12 col-md-5">
            <label class="form-label" for="codigo">Código *</label>
            <input class="form-control" type="number" name="codigo" id="codigo" placeholder="281210" length="6" required>
            <p style="font-size: 0.7em; margin-bottom: 0px;">¹Deben ser seis cifras</p>
        </div>
        <div class="col-12 col-md-7">
        <label class="form-label" for="nivel">Nivel *</label>
            <select class="form-select" name="nivel" id="nivel" required>
                <option value="" style="display: none">...</option>
                <option value="operario">Operario</option>
                <option value="técnica">Técnica</option>
                <option value="tecnología">Tecnología</option>
                <option value="esp. tecnológica">Especialización tecnológica</option>
            </select>
        </div>
    
        <div class="d-flex align-items-center justify-content-center">
            <button class="button-submit" type="submit" name="enviar" style="width: 50%">Enviar</button>
        </div>
    </form>
</div>

<?php include('../../0/components/footer.php'); ?>
