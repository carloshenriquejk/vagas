<?php

use \app\session\Login;

//DADOS DO USUARIO LOGADO
$usuarioLogado = Login::getUsuarioLogado();

//DETALHES DO USUARIO
$usuario = $usuarioLogado ?
    '<a href="logout.php" class="nav-link">Sair</a>' :
    '<a href="login.php" class="nav-link">Entrar</a>';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>

<body class="bg-dark text-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CRUD</a>

        <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home </span></a>
                </li>
                <li class="nav-item active">
                    <?= $usuario ?>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">