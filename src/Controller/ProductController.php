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


class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product', methods:['GET'])]
    public function index(ProductRepository $productRepository, PaginatorInterface $paginator,
    Request $request ): Response
    {
        // dd($product);
        if (!$this->getUser() || !$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('pages/home/home.html.twig');
        }
        
        $products = $paginator->paginate(
            $productRepository->findAll(),
            $request->query->getInt('page', 1), 
            4
        );

        return $this->render('pages/product/listeprod.html.twig', [
            // 'controller_name' => 'ProductController', 
            'products' =>  $products,
            'user'=>$this->getUser()
        ]);
    }

    #[Route('/product{id}', name:'details_product')]
    public function detailsProd(Product $product):Response
    {
        if (!$this->getUser() || !$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('pages/home/home.html.twig');
        }
        $user = $this->getUser();
        $roles = $user->getRoles();
    

       if (in_array('ROLE_ADMIN', $roles)) {

        return $this->render('pages/product/listeprod.html.twig', [
               'product' => $product,
        ]);
        }elseif (in_array('ROLE_USER', $roles)) {

            return $this->render('pages/client/singleProduct.html.twig', [
                   'product' => $product,
            ]);
            }
            return $this->render('pages/home/pages/home.html.twig');
    }

    #[Route('/newprod', name: 'product_new', methods:['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager) : Response
    {
        $product = new Product();
        $form=$this->createForm(ProductType::class,$product);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $product = $form->getData();

            $manager->persist($product);
            $manager->flush();

            $this->addFlash(
                'success',
                'Le produit '.$product->getName().' a été créé avec succès!!'
             );
            return $this->redirectToRoute('app_product');
        }

        return $this->render('pages/product/newprod.html.twig',[
            'form' => $form->createView()
    ]);
    }
    


    #[Route('editprod/{id}', name: 'product_edit', methods:['GET', 'POST'])]
    public function edit(ProductRepository $repository, Product $product, Request $request, 
    EntityManagerInterface $manager) : Response
    {
        // $product = $repository->findOneBy(['id' => $id]);
        $form=$this->createForm(ProductType::class,$product);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $product = $form->getData();

            $manager->persist($product);
            $manager->flush();

            $this->addFlash(
                'success',
                'Le produit a été modifié avec succès!!'
             );
            return $this->redirectToRoute('app_product');
        }


        return $this->render('pages/product/editprod.html.twig',[
            'form' => $form->createView()
        ] );
    }
   

    #[Route('/deleteprod/{id}', name: 'product_delete', methods:[ 'GET'])]
    public function delete(EntityManagerInterface $manager, Product $product) : Response
    {
        if (!$product) {
            $this->addFlash(
                'success',
                'Le produit n\'a pas été trouvé'
            );
    
            return $this->redirectToRoute('app_product');
        }

        $manager->remove($product);
        $manager->flush();

        $this->addFlash(
            'success',
            'Le produit a été supprimé avec succès!!'
        );

        return $this->redirectToRoute('app_product');
    }
   
}

