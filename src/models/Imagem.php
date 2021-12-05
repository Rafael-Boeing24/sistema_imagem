<?php

namespace src\models;

use core\Model;

class Imagem extends Model {

    private $codigo;
    private $arquivoImagem;

    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    function getArquivoImagem() {
        return $this->arquivoImagem;
    }

    function setArquivoImagem($arquivoImagem): void {
        $this->arquivoImagem = $arquivoImagem;
    }

}