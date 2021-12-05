<?php $render('header'); ?>

<div class="container">
    <form class="form-control" method="POST" action="<?= $base; ?>/imagem/inserir" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="imagem" class="form-label">Nome Arquivo</label>
            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/png, image/jpeg">
        </div>
        <input type="submit" value="Enviar" class="btn btn-success">
    </form>
</div>

<?php $render('footer');