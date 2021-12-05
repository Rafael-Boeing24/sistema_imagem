<?php
use src\models\Imagem;

$render('header');
?>

<div class="container mt-2">
    <div>
        <a class="btn btn-success" href="<?= $base; ?>/imagem/inserir">Inserir Imagem</a>
    </div>
    <div>
        <table class="position-absolute top-0 start-50 translate-middle-x">
            <tr>
                <td class="p-3">Id</td>
                <td class="p-3">Imagem</td>
                <td class="p-3">Ações</td>
            </tr>
            <?php
            $aImagens = Imagem::select()->execute();
            foreach ($aImagens as $oImagem) {
                $sRegistro = '<tr>' . ENTER .
                             '    <td class="p-2">' . $oImagem['imgcodigo'] . '</td>' . ENTER .
                             '    <td class="p-2"><img src="' . str_replace('public', 'src', $base) . '/images/' . $oImagem['imgnomefisico'] . '" width="100" height="100"></td>' . ENTER .
                             '    <td class="p-2"><a href="' . $base . '/imagem/excluir/' . $oImagem['imgcodigo'] . '" class="btn btn-danger">Excluir</a></td>' . ENTER .
                             '</tr>';

                echo $sRegistro;
            }
            ?>
        </table>
    </div>
</div>

<?php $render('footer');