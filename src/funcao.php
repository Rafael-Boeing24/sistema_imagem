<?php

/**
 * Estrutura de funções do PHP
 * @package Estrutura
 * @subpackage Funcao
 * @author Rafael Boeing
 * @since 24/11/2019
 */
define('ENTER', "
");
define('ENTER_ANSI', chr(10));

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_CTYPE, 'pt_BR');

function emBranco($sValor) {
    return ((string) trim($sValor) === '') ? true : false;
}
