<?php

require 'vendor/autoload.php';

use App\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$buscador = new Buscador(new Client(['base_uri' => 'https://www.alura.com.br/']), new Crawler());
$cursos = $buscador->buscar('cursos-online-programacao/php');
foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}