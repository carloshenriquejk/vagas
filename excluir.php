<?php

require __DIR__ . '/vendor/autoload.php';



use \App\Entity\Vaga;

use App\sesion\Login;

//obriga o usuario a  estar logado 
Login::requireLogin();

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//VALIDAÇÃO DA VAGA
$obVaga = vaga::getVaga($_GET['id']);

if (!$obVaga instanceof Vaga) {
    header('location: index.php?status=error');
    exit;
}


//VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {

    $obVaga->excluir();
    header('location: index.php?status=success');
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';