<?php

require __DIR__ . '/vendor/autoload.php';


use App\session\Login;

//obriga o usuario a não  estar logado 
Login::requireLogout();


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';