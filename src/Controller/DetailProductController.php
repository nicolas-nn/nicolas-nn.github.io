<?php

namespace App\Controller;

use App\Entity\DescriptionObsolescence;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Routing\Attribute\AsRoutingConditionService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class DetailProductController extends AbstractController
{
    //rédirige au clic card product
    #[Route('/detail/{id}', name:'app_detail', methods: ['GET', 'HEAD'])]
    function showDetail(ManagerRegistry $doctrine, int $id):Response
    {
        if (!$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_USER')) {
            return new RedirectResponse($this->generateUrl('app_register'));
        }
        else{
            $descriptions = $doctrine->getRepository(DescriptionObsolescence::class)->findAll();
            $allProducts = $doctrine->getRepository(Product::class)->findAll();
            $product = $doctrine->getRepository(Product::class)->find($id);
            if (!$product) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }
            return $this->render('detailProduct.html.twig',
            ['product' => $product, 'allProducts' => $allProducts, 'descriptions'=>$descriptions]);
        }
    }

}
