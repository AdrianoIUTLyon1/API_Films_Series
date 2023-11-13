<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Serie;
use App\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/serie')]
class SerieController extends AbstractController
{
    public function __construct(
        private HttpClientInterface $tmdbClient,
    ) {
    }

    #[Route('/all', name: 'serie_all')]
    public function getSeries(): Response
    {
        $response = $this->tmdbClient->request('GET', '/3/tv/popular');
        $series = $response->toArray()['results'];
        $serieList = [];
        for ($i = 0; $i < sizeof($series); $i++) {
            $serie = new Serie($series[$i]);
            $serieList[] = $serie;
        }
        return $this->render('Series.html.twig', [
            'series' => $serieList,
        ]);
    }

    #[Route('/{id}', name: 'detailsseries')]
    public function getSerie(int $id): Response
    {
        $responseSerie = $this->tmdbClient->request('GET', "/3/tv/{$id}");
        $serie = $responseSerie->toArray();
        $serieDetails = new Serie($serie);

        $responseCast = $this->tmdbClient->request('GET', "/3/tv/{$id}/credits");
        $casts = $responseCast->toArray()['cast'];
        $nbActeur = sizeof($casts);
        $castList = [];
        for ($i = 0; $i < $nbActeur; $i++) {
            $cast = new Actor($casts[$i]);
            $castList[] = $cast;
        }

        $responseReview = $this->tmdbClient->request('GET', "/3/tv/{$id}/reviews");
        $reviews = $responseReview->toArray()['results'];
        $reviewList = [];

        for ($i = 0; $i < sizeof($reviews); $i++) {
            $review = new Review($reviews[$i]);
            $reviewList[] = $review;
        }

        return $this->render('serieDetails.html.twig', [
            'serieDetails' => $serieDetails,
            'castDetails' => $castList,
            'reviewLists' => $reviewList,
        ]);
    }
}
