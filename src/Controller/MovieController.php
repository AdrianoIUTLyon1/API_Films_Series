<?php

namespace App\Controller;

use App\Entity\Actor;
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
    public function getMovies(): Response
    {

        $response = $this->tmdbClient->request('GET', '/3/movie/popular');
        $movies = $response->toArray()['results'];
        $movieList = [];
        for ($i = 0; $i < sizeof($movies); $i++) {
            $movie = new Movie($movies[$i]);
            $movieList[] = $movie;
        }
        return $this->render('movies.html.twig', [
            'movies' => $movieList
        ]);
    }


    #[Route('/{id}')]
    public function getMovie(int $id): Response
    {

        $responseMovie = $this->tmdbClient->request('GET', "/3/movie/{$id}");
        $movie = $responseMovie->toArray();
        $movieDetails = new Movie($movie);

        $responseCast = $this->tmdbClient->request('GET', "/3/movie/{$id}/credits");
        $cast = $responseCast->toArray()['cast'];
        $castList = [];
        for ($i = 0; $i < sizeof($cast); $i++) {
            $cast = new Actor($cast[$i]);
            $castList[] = $cast;
        }

        return $this->render('movieDetails.html.twig', [
            'movieDetails' => $movieDetails,
            'castDetails' => $castList
        ]);
    }
}