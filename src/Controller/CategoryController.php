<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category', methods:['GET'])]
    public function index(CategoryRepository $repository, PaginatorInterface $paginator,
    Request $request): Response
    {
        $categories=$paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            4
        );


        return $this->render('pages/category/listecat.html.twig', [
            'categories'=>$categories,
        ]);
    }

    #[Route('/newcat', name: 'category_new', methods:['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager) : Response
    {
        $category = new Category ();
        $form=$this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category=$form->getData();

            $manager->persist($category);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre catégorire a été ajouté avec succès!!'
            );

            return $this->redirectToRoute('app_category');
        }

        return $this->render('pages/category/newcat.html.twig',[
            'form'=>$form ->createView()
        ]);
    }

    #[Route('editcat/{id}', name: 'category_edit', methods:['GET', 'POST'])]
    public function edit(CategoryRepository $repository, Category $category, Request $request, 
    EntityManagerInterface $manager) : Response
    {
        // $product = $repository->findOneBy(['id' => $id]);
        $form=$this->createForm(ProductType::class,$category);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $category = $form->getData();

            $manager->persist($category);
            $manager->flush();

            $this->addFlash(
                'success',
                'La catégorie a été modifié avec succès!!'
             );
            return $this->redirectToRoute('app_category');
        }


        return $this->render('pages/product/editcat.html.twig',[
            'form' => $form->createView()
        ] );
    }

    #[Route('/deletecat/{id}', name: 'category_delete', methods:[ 'GET'])]
    public function delete(EntityManagerInterface $manager, Category $category) : Response
    {
        if (!$category) {
            $this->addFlash(
                'success',
                'La catégorie n\'a pas été trouvée'
            );
    
            return $this->redirectToRoute('app_category');
        }

        $manager->remove($category);
        $manager->flush();

        $this->addFlash(
            'success',
            'La catégorie a été supprimée avec succès!!'
        );

        return $this->redirectToRoute('app_category');
    }
}


