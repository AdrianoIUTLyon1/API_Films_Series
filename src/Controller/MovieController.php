<?php

namespace App\Controller;

use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;


#[Route('/movie')]
class MovieController extends AbstractController
{
    public function __construct(
        private HttpClientInterface $tmdbClient,
    ) {
    }


    #[Route('/all')]
    public function getMovie(): Response
    {

        $response = $this->tmdbClient->request('GET', '/3/movie/popular?');
        $movies = $response->toArray()['results'];
        $movieList=[];
        for ($i = 0; $i < sizeof($movies); $i++) {
            $movie = new Movie($movies[$i]);
            $movieList[]=$movie;
        }
        return $this->render('movies.html.twig',[
            'movies' => $movieList
        ]);
    }
}