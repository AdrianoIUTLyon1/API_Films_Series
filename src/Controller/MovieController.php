<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Movie;
use App\Entity\Review;
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
        $casts = $responseCast->toArray()['cast'];
        $nbActeur = sizeof($casts);
        $castList = [];
        for ($i = 0; $i < $nbActeur ; $i++) {
            $cast = new Actor($casts[$i]);
            $castList[] = $cast;
        }

        $responseReview = $this->tmdbClient->request('GET',"/3/movie/{$id}/reviews");
        $reviews = $responseReview->toArray()['results'];
        $reviewList = [];

        for ($i = 0; $i < sizeof($reviews) ; $i++) {
            $review = new Review($reviews[$i]);
            $reviewList[] = $review;
        }

        

        return $this->render('movieDetails.html.twig', [
            'movieDetails' => $movieDetails,
            'castDetails' => $castList,
            'reviewLists' => $reviewList
        ]);
    }
}