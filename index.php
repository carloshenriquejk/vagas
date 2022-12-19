<?php

require_once __DIR__ . '\vendor\autoload.php';

use \App\Entity\Vaga;
use App\Db\Pagination;

use App\session\Login;

//obriga o usuario a  estar logado 
Login::requireLogin();

//BUSCAR
$busca = $_GET['busca'];

//FILTRO STATUS
//filtroStatus $_GET['status'];
//$filtroStatus = in_array($filtroStatus, ['s', 'n']) ? $filtroStatus : '';

//CONDIÇOES SQL 
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%' . str_replace('', '%', $busca) . '%"' : null,
    // strlen($filtroStatus) ? 'ativo = "' . $filtroStatus . '"' : null
];

//REMOVE POSIÇÕES VAZIAS
//$condicoes = array_filter($condicoes);

//CLAUSUAL WHERE
$where = implode(' AND ', $condicoes);

$quantidadeVagas = vaga::getQuantidadeVagas($where);


//PAGINAÇÃO
$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 3);

//OBTEM AS VAGAS
$vagas = Vaga::getVagas($where, null, $obPagination->getLimit());

//echo "<pre>"; print_r($vagas); "</pre>"; exit;
require_once __DIR__ . '\includes\header.php';
require_once __DIR__ . '\includes\listagem.php';
require_once __DIR__ . '\includes\footer.php';