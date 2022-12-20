<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Usuario;
use App\session\Login;

//obriga o usuario a não  estar logado 
Login::requireLogout();

//mensagem de alerta nos formularios
$alertaLogin = '';
$alertaCadastro = '';

//validação do post
if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'logar':
            //busca usuario por email
            $obusuario = Usuario::getUsuarioPorEmail($_POST['email']);

            //valida a instancia e a senha
            if (!$obusuario instanceof usuario || !password_verify($_POST['senha'], $obusuario->senha)) {
                $alertaLogin = 'E-mail ou senha invalida';
                break;
            }

            //loga o usuario
            Login::login($obusuario);

        case 'cadastrar':
            if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
                $obusuario = new Usuario;
                $obusuario->nome = $_POST['nome'];
                $obusuario->email = $_POST['email'];
                $obusuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $obusuario->cadastrar();
            }
            break;
    }
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';