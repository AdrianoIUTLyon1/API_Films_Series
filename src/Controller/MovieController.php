<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/movie')]
class MovieController extends AbstractController
{

    #[Route('/all')]
    public function getMovie(): Response
    {


        $client = HttpClient::create();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxYTNhNTliZDc2ZGE4ODA3ZjdlMmMzYWYwZjI1NzUzNiIsInN1YiI6IjY1MTNlMjM5YTE5OWE2MDBjNDliZjU4YyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.pYz4KkgJQ4K1o_2F1HsJxZaczk7CkpH5bfbKgomUXcc',
                'accept' => 'application/json',
            ],
        ]);

        return new Response($response->getContent());
    }
}