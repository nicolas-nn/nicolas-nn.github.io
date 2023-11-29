<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class AddProductController extends AbstractController
{
    #[Route('/admin/add/product', name: 'app_add_product')]
    public function addProduct(Request $request,EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $entityManager->persist($product);
            $entityManager->flush();
             $this->addFlash('success','Product add succesfully');
            return $this->redirectToRoute('app_add_product');
        }
            return $this->render('product/add_product.html.twig', [
           'form' => $form->createView()
        ]);
    }

    #[Route('/admin/edit/product/{id}', name: 'app_edit_product')]
    public function editProduct(Request $request,EntityManagerInterface $entityManager, Product $product): Response
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $entityManager->persist($product);
            $entityManager->flush();
            return $this->redirectToRoute('app_edit_product', ['id' => $product->getId()]);
        }
        return $this->render('product/edit_product.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
