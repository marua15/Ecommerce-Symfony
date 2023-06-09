<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home.index', methods: ['GET'])]
    public function index(
        CategoryRepository $categoryRepository
    ): Response
    {
        return $this->render('pages/home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
