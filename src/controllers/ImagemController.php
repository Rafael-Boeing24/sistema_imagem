<?php

/**
 * Imagem Controller
 * @package Src
 * @subpackage Controller
 * @author Rafael Boeing
 * @since 05/12/2021
 */
namespace src\controllers;

use core\Controller,
    \core\Database,
    src\models\Imagem;

class ImagemController extends Controller {

    // =========================================================================================================================================
    // =========================================================== PROCESSA INCLUSÃO ===========================================================
    // =========================================================================================================================================

    public function inserirImagem() {
        $this->render('inserirImagem');
    }

    public function processaInclusao() {
        if ($oImagem = $_FILES['imagem']) {
            $sNewNomeImagem = uniqid('', true) . $oImagem['name'];
            $oConexao = Database::getInstance();
            $oPrepare = $oConexao->prepare('insert into tbimagem (imgnomefisico)' .
                                           'values (:nomeFisico)');
            if ($oPrepare->execute(['nomeFisico' => $sNewNomeImagem])) {
                $this->processaUploadImagem($oImagem, $sNewNomeImagem);
            }
        }
    }

    protected function processaUploadImagem($oImagem, $sNewNomeImagem) {
        // Verifica se a Exensão da Imagem é válida.
        $sExtensaoImagem = end(explode('/', $oImagem['type']));
        if (in_array($sExtensaoImagem, ['png', 'jpg', 'jpeg'])) {
            // Valida se o tamanho da Imagem é válido.
            if ($oImagem['size'] < 3145728) {
                $sDiretorio     = dirname(__DIR__) . '/images/' . $sNewNomeImagem;
                $sDiretorioTemp = $oImagem['tmp_name'];
                // Realiza o processamento de Upload da Imagem.
                if (move_uploaded_file($sDiretorioTemp, $sDiretorio)) {
                    $this->redirect('/');
                }
            } else {
                echo 'Não é possível realizar o Upload de arquivos com capacidade maior que 3 mb.';
            }
        } else {
            echo 'Extensão de arquivo não reconhecido.';
        }
    }

    // =========================================================================================================================================
    // =========================================================== PROCESSA EXCLUSÃO ===========================================================
    // =========================================================================================================================================

    public function processaExclusao($args) {
        if (isset($args['codigo'])) {
            $oImagem = Imagem::select()->where('imgcodigo', $args['codigo'])->one();
            $oConexao = Database::getInstance();
            $oPrepare = $oConexao->prepare('delete' .
                                           '  from tbimagem' .
                                           ' where imgcodigo = :codigo');

            if ($oPrepare->execute(['codigo' => $args['codigo']])) {
                if (file_exists(dirname(__DIR__) . '/images/' . $oImagem['imgnomefisico'])) {
                    unlink(dirname(__DIR__) . '/images/' . $oImagem['imgnomefisico']);
                }
            }
        }
        $this->redirect('/');
    }

}
