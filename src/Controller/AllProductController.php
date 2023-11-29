<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class AllProductController extends AbstractController
{
    #[Route('/admin/all/product', name: 'app_all_product')]
    public function allProduct(EntityManagerInterface $em): Response
    {
        $products = $em->getRepository(Product::class)->findAll();

        return $this->render('product/all_product.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/admin/product/{id}/delete", name="product_delete")
     */
    public function delete(EntityManagerInterface $em,$id)
    {

        $product = $em->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('app_all_product');
    }
}
