<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ResearchController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/research', name:'app_research')]
function research(): Response
    {
    if (!$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_USER')) {
        return new RedirectResponse($this->generateUrl('app_register'));
    } else {
        return $this->render('/research.html.twig');
    }
}
//récupere les données du formulaire de recherche
#[Route('/result-product', name:'app_resultProduct', methods:['POST', 'GET'])]
function resultProduct(Request $request)
    {
    $brand = $request->request->get('brand');
    $model = $request->request->get('model');
    $year = $request->request->get('year');
    $dataApi = $this->getDataApi();
    $dataApi = json_decode($dataApi, true);

    return $this->render('productResult.html.twig', [
        'brand' => $brand,
        'model' => $model,
        'year' => $year,
        'results' => $dataApi,
    ]);
}

//récupere les donnée de l'api locale
function getDataApi()
    {
    $response = $this->forward('App\Controller\SearchController::ProductAutocomplete');
    $content = $response->getContent();
    return $content;
}

}
