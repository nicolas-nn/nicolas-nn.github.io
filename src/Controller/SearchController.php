<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/api/product_autocomplete", name="api_product_autocomplete")
     */
    public function ProductAutocomplete(Request $request, ProductRepository $repository): JsonResponse
    {

        $q = $request->get('q');

        $data = ['results' => $repository->autocomplete($q)];

        return new JsonResponse($data);

    }


}
