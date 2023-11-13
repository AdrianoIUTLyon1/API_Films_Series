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

    #[Route('/add-favorite/{idMovie}', name: 'addFav')]
    public function saveFavorite(EntityManagerInterface $entityManager, $idMovie): Response
    {
        $favorite = new Favorite();
        $favorite->setIdFavoriteMovie($idMovie);
        $entityManager->persist($favorite);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
    

        return $this->render('movies.html.twig');
    }


}