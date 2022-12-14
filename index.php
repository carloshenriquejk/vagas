<?php

require_once __DIR__ . '\vendor\autoload.php';

use \App\Entity\Vaga;

$vagas = Vaga::getVagas();

//echo "<pre>"; print_r($vagas); "</pre>"; exit;
require_once __DIR__ . '\includes\header.php';
require_once __DIR__ . '\includes\listagem.php';
require_once __DIR__ . '\includes\footer.php';