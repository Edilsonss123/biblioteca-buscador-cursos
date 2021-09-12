<?php

namespace App\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $response = $this->httpClient->request('GET', $url);
        $this->crawler->addHtmlContent($response->getBody());
        $elementosCursos = $this->crawler->filter(".card-curso__info>span.card-curso__nome");

        $cursos = [];
        foreach ($elementosCursos as $key => $elemento) {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }
}
