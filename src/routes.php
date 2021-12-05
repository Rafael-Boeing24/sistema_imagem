<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

// ===================================================================================================================================
// ============================================================== IMAGEM =============================================================
// ===================================================================================================================================

$router->get ('/imagem/inserir'         , 'ImagemController@inserirImagem');
$router->post('/imagem/inserir'         , 'ImagemController@processaInclusao');
$router->get ('/imagem/excluir/{codigo}', 'ImagemController@processaExclusao');