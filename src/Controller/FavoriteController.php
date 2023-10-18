<?php

namespace App\Controller;

use App\Entity\Favorite;
use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;


#[Route('/favorite')]
class FavoriteController extends AbstractController
{
    public function __construct(
        private HttpClientInterface $tmdbClient,
        EntityManagerInterface $entityManager
    ) {

    }



    #[Route('/all')]
    public function getFavoriteMovies(EntityManagerInterface $entityManager): Response
    {

        $favoriteRepository = $entityManager->getRepository(Favorite::class);
        $favorites = $favoriteRepository->findAll();
        $response = $this->tmdbClient->request('GET', '/3/movie/popular');
        $movies = $response->toArray()['results'];
        $movieFavoriteList = [];
        for ($i = 0; $i < sizeof($movies); $i++) {
            foreach ($favorites as $favorite) {
                if($movies[$i]['id']==$favorite['idFavoriteMovie']){
                    $movie = new Movie($movies[$i]);
                    $movieFavoriteList[] = $movie;
                }
                
            }
           
        }
        return $this->render('movies.html.twig', [
            'movies' => $movieFavoriteList
        ]);
    }


    #[Route('/add-favorite')]
    public function saveFavorite(EntityManagerInterface $entityManager, $idMovie): Response
    {
        $favorite = new Favorite();
        $favorite->setIdFavoriteMovie($idMovie);
        $entityManager->persist($favorite);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('movieDetails.html.twig');
    }


}