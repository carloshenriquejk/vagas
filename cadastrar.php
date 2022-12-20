<?php

require __DIR__ . '/vendor/autoload.php';

use App\session\Login;
//obriga o usuario a  estar logado 
Login::requireLogin();

define('TITLE', 'Cadastrar vaga');

use \App\Entity\Vaga;

$obVaga = new Vaga;

//VALIDAÇÃO DO POST
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {

    $obVaga->titulo    = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo     = $_POST['ativo'];
    $obVaga->cadastrar();
    header('location: index.php?status=success');
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';