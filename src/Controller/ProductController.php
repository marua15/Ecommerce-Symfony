<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product', methods:['GET'])]
    public function index(ProductRepository $productRepository, PaginatorInterface $paginator,
    Request $request ): Response
    {
        // dd($product);
        $products = $paginator->paginate(
            $productRepository->findAll(),
            $request->query->getInt('page', 1), 
            4
        );

        return $this->render('pages/product/listeprod.html.twig', [
            // 'controller_name' => 'ProductController', 
            'products' =>  $products
        ]);
    }


    // #[Route('/newprod', name: 'product_new', methods:['GET', 'POST'])]
    #[Route('/newprod', name: 'product_new', methods:['POST'])]
    // public function new(Request $request, EntityManagerInterface $manager) : Response
    // {
    //     $product = new Product();
    //     $form=$this->createForm(ProductType::class,$product);

    //     $form->handleRequest($request);
    //     if($form->isSubmitted() && $form->isValid()){
    //         $product = $form->getData();

    //         $manager->persist($product);
    //         $manager->flush();

    //         $this->addFlash(
    //             'success',
    //             'Le produit '.$product->getName().' a été créé avec succès!!'
    //          );
    //         return $this->redirectToRoute('app_product');
    //     }

    //     return $this->render('pages/product/newprod.html.twig',[
    //         'form' => $form->createView()
    // ]);
    // }
    public function new(Request $request, EntityManagerInterface $manager): JsonResponse
    {
        $requestData = json_decode($request->getContent(), true);

        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->submit($requestData);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($product);
            $manager->flush();

            return new JsonResponse(['message' => 'Le produit '.$product->getName().' a été créé avec succès!!'], Response::HTTP_CREATED);
        }

        return new JsonResponse(['errors' => $this->getFormErrors($form)], Response::HTTP_BAD_REQUEST);
    }


    // #[Route('editprod/{id}', name: 'product_edit', methods:['GET', 'POST'])]
    #[Route('editprod/{id}', name: 'product_edit', methods:['POST'])]
    // public function edit(ProductRepository $repository, Product $product, Request $request, 
    // EntityManagerInterface $manager) : Response
    // {
    //     // $product = $repository->findOneBy(['id' => $id]);
    //     $form=$this->createForm(ProductType::class,$product);
    //     $form->handleRequest($request);
    //     if($form->isSubmitted() && $form->isValid()){
    //         $product = $form->getData();

    //         $manager->persist($product);
    //         $manager->flush();

    //         $this->addFlash(
    //             'success',
    //             'Le produit a été modifié avec succès!!'
    //          );
    //         return $this->redirectToRoute('app_product');
    //     }


    //     return $this->render('pages/product/editprod.html.twig',[
    //         'form' => $form->createView()
    //     ] );
    // }
    public function edit(ProductRepository $repository, Product $product, Request $request, EntityManagerInterface $manager): JsonResponse
    {
        $requestData = json_decode($request->getContent(), true);

        $form = $this->createForm(ProductType::class, $product);
        $form->submit($requestData);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            return new JsonResponse(['message' => 'Le produit a été modifié avec succès!!'], Response::HTTP_OK);
        }

        return new JsonResponse(['errors' => $this->getFormErrors($form)], Response::HTTP_BAD_REQUEST);
    }

    // #[Route('/deleteprod/{id}', name: 'product_delete', methods:[ 'GET'])]
    #[Route('/deleteprod/{id}', name: 'product_delete', methods:[ 'DELETE'])]
    // public function delete(EntityManagerInterface $manager, Product $product) : Response
    // {
    //     if (!$product) {
    //         $this->addFlash(
    //             'success',
    //             'Le produit n\'a pas été trouvé'
    //         );
    
    //         return $this->redirectToRoute('app_product');
    //     }

    //     $manager->remove($product);
    //     $manager->flush();

    //     $this->addFlash(
    //         'success',
    //         'Le produit a été supprimé avec succès!!'
    //     );

    //     return $this->redirectToRoute('app_product');
    // }
    public function delete(EntityManagerInterface $manager, Product $product): JsonResponse
    {
        if (!$product) {
            return new JsonResponse(['message' => 'Le produit n\'a pas été trouvé'], Response::HTTP_NOT_FOUND);
        }

        $manager->remove($product);
        $manager->flush();

        return new JsonResponse(['message' => 'Le produit a été supprimé avec succès!!'], Response::HTTP_OK);
    }

    private function getFormErrors($form): array
    {
        $errors = [];
        foreach ($form->getErrors(true, true) as $error) {
            $errors[] = $error->getMessage();
        }
        return $errors;
    }
}


