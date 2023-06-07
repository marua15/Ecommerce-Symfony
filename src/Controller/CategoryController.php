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
    /**
     * Summary of index
     * @param \App\Repository\CategoryRepository $repository
     * @param \Knp\Component\Pager\PaginatorInterface $paginator
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(CategoryRepository $repository, PaginatorInterface $paginator,
    Request $request,EntityManagerInterface $entityManager): Response
    {
        if (!$this->getUser() || !$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('pages/home/home.html.twig');
        }

        $user = $this->getUser();
        $roles = $user->getRoles();

        if(in_array('ROLE_ADMIN', $roles)){
            $categories=$paginator->paginate(
                $repository->findAll(),
                $request->query->getInt('page', 1),
                4
            );


           return $this->render('pages/category/listecat.html.twig', [
            'categories'=>$categories,
        ]);
        } else  if (in_array('ROLE_USER', $roles)) {

           
            $category = $paginator->paginate(
                $entityManager->getRepository(Category::class)->findAll(),
                $request->query->getInt('page', 1), /*page number*/
                3 /*limit per page*/
            );
            
                    if (!$category) {
                        throw $this->createNotFoundException(
                            'No category found in our DATABASE !'
                        );
                    }
            
                    return $this->render('pages/client/categories.html.twig', [
                        'categories' => $category,
                        
                    ]);
        
        }
        

        
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
        // $category = $repository->findOneBy(['id' => $id]);
        $form=$this->createForm(CategoryType::class,$category);
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


        return $this->render('pages/category/editcat.html.twig',[
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


