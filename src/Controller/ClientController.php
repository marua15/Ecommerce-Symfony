<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; // Update the import statement


class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Check if user is authenticated 
        if (!$this->getUser() || !$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('pages/home/home.html.twig');
        }

        // Get user object and check roles
        $user = $this->getUser();
        $roles = $user->getRoles();

        if (in_array('ROLE_CLIENT', $roles)) {
            $products = $entityManager->getRepository(Product::class)
                                ->findAll();
           
            if (!$products) {
                throw $this->createNotFoundException(
                    'No product found in the our DATABASE !'
                );
            }
            return $this->render('pages/client/homecli.html.twig', [
               
                'user' => $user,
                'products' =>$products
            ]);
        }
        elseif (in_array('ROLE_ADMIN', $roles)) {
            
            $users = [];
            $users1 = $entityManager->getRepository(User::class)->findAll();
            foreach ($users1 as $user) {
                if (in_array('ROLE_ADMIN', $user->getRoles())) {
                    continue;
                }
                $users[] = $user;
            }
            return $this->render('pages/admin/homeadmin.html.twig', [
                'users' => $users
            ]);
    }
    return $this->render('pages/home/home.html.twig');
}

    #[Route('/user/cart/', name: 'cart_Page')]
    public function cart(EntityManagerInterface $entityManager,  PaginatorInterface $paginator, 
    Request $request) : Response {
         // Check if user is authenticated
         if (!$this->getUser() || !$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('pages/home/home.html.twig');
        }

        // Get user object and check roles
        $user = $this->getUser();
        $roles = $user->getRoles();

        if (in_array('ROLE_USER', $roles)) {

            $products = $this->getUser()->getCart();                 
            if (!$products) {
                throw $this->createNotFoundException(
                    'No product found in the our DATABASE !'
                );
            }
            $totalPrice =0.0;
            foreach ($products as $product) {
                $totalPrice += $product->getprice();
            }
            return $this->render('pages/client/cart.hml.twig', [
                'user' => $user,
                'products' =>$products ,
                'totalPrice'=>$totalPrice
            ]);
        }
       
    
        return $this->render('pages/home/home.html.twig');
    
    }

    #[Route('/user/cart/{id}', name: 'cart_Page_Admin',methods:['GET','POST'])]
    public function cartAdmin(EntityManagerInterface $entityManager,PaginatorInterface $paginator,Request $request ,User $user): Response
    {
        // Check if user is authenticated
        if (!$this->getUser() || !$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('pages/home/home.html.twig');
        }

            $products = $user->getCart();                 
            if (!$products) {
                throw $this->createNotFoundException(
                    'No product found in the our DATABASE !'
                );
            }
            $totalPrice =0.0;
            foreach ($products as $product) {
                $totalPrice += $product->getprice();
            }
            return $this->render('pages/admin/cart.html.twig', [
                'user' => $user,
                'products' =>$products ,
                'totalPrice'=>$totalPrice
            ]);

    }

    #[Route('/user/delete/{id}', name: 'user_delete' , methods:['GET','POST'])]
    public function deleteP(User $user,EntityManagerInterface $entityManager){


        $entityManager->remove($user);
        $entityManager->flush();
        $this->addFlash(
            'danger',
            'The product '.$user->getFullName().' was Deleted successfully!'
         );
        return $this->redirectToRoute('app_client');  
      } 

      #[Route('/cart/add/{id}',name:"addToCart",methods:['GET','POST'])]
      public function addToCart (int $id ,EntityManagerInterface $entityManager): Response{
 
         if (!$this->getUser() || !$this->isGranted('IS_AUTHENTICATED_FULLY')) {
             return $this->render('pages/home/home.html.twig');
         }
         $user = $this->getUser();
         $product = $entityManager->getRepository(Product::class)
                                ->findOneBy(['id' => $id]);
 
         $cartProducts1= $user->getCart();
         $cartProducts = [];
         foreach ($cartProducts1 as $cartProduct1 ) {
            $cartProducts[] = $cartProduct1;
         }
           if (in_array($product, $cartProducts)){
 
             $this->addFlash(
                'danger',
                'Product Already existe in you cart List '
             );
             return $this->redirectToRoute('app_client');  
           }else
         {
             $user->addCart($product);
             $entityManager->persist($user);
             $entityManager->flush();
 
               $this->addFlash(
                  'success',
                  'Product Added successfully '
               );
               return $this->redirectToRoute('app_client');  
         }

        return $this->render('pages/home/home.html.twig');
 
      }


      #[Route('/cart/delete/{id}',name:"deleteFromCart",methods:['GET','POST'])]
      public function deleteFromCart (int $id ,EntityManagerInterface $entityManager): Response{
 
         if (!$this->getUser() || !$this->isGranted('IS_AUTHENTICATED_FULLY')) {
             return $this->render('pages/home/home.html.twig');
         }
            $user = $this->getUser();
            $product = $entityManager->getRepository(Product::class)
                                    ->findOneBy(['id' => $id]);
    
         
             $user->removeCart($product);
             $entityManager->persist($user);
             $entityManager->flush();
 
               $this->addFlash(
                  'danger',
                  'Product deleted successfully '
               );
               return $this->redirectToRoute('app_client');  
         

 
      }

}
