<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class SecurityController extends AbstractController
{
    // This controller allows us to login
    // #[Route('/connexion', name: 'security.login', methods: ['GET', 'POST'])]
    #[Route('/connexion', name: 'security.login', methods: ['POST'])]
    // public function login(AuthenticationUtils $authenticationUtils): Response
    // {
    //     return $this->render('pages/security/login.html.twig', [
    //         'last_username' => $authenticationUtils->getLastUsername(),
    //         'error' => $authenticationUtils->getLastAuthenticationError()
    //     ]);
    // }
    public function login(AuthenticationUtils $authenticationUtils): JsonResponse
    {
        // Get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // Last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // Return a response
        return new JsonResponse([
            'message' => 'Login successful',
            'last_username' => $lastUsername,
            'error' => $error ? $error->getMessage() : null
        ], JsonResponse::HTTP_OK);
    }

    // This controller allows us to logout
    #[Route('/deconnexion', name:'security.logout')]
    // public function logout()
    // {
    //     // Nothing to do here...
    // }
    public function logout(TokenStorageInterface $tokenStorage): JsonResponse
    {
        // Clear the token storage
        $tokenStorage->setToken(null);

        // Return a success response
        return new JsonResponse(['message' => 'Logout successful'], JsonResponse::HTTP_OK);
    }

    // This controller allows to sign up
    // #[Route('/inscription', 'security.registration', methods:['GET', 'POST'])]
    #[Route('/inscription', 'security.registration', methods:['POST'])]
    // public function registration(Request $request, EntityManagerInterface $manager) : Response
    // {
    //     $user = new User();
    //     $user->setRoles(['ROLE_USER']);            ;

    //     $form = $this->createForm(RegistrationType::class, $user);

    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $user = $form->getData();

    //         $this->addFlash(
    //             'success',
    //             'Votre compte a bien été créé. '
    //         );

    //         $manager->persist($user);
    //         $manager->flush();

    //         return $this->redirectToRoute('security.login');
    //     }
        
    //     return $this->render('pages/security/registration.html.twig', [
    //         'form' => $form->createView()
    //     ]);
    // }
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $passwordEncoder): JsonResponse
    {
        $form = $this->createForm(RegistrationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $form->getData();
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($passwordEncoder->hashPassword($user, $user->getPassword()));

            $manager->persist($user);
            $manager->flush();

            // Return a success response
            return new JsonResponse(['message' => 'Registration successful'], JsonResponse::HTTP_CREATED);
        }

        // Return a validation error response
        return new JsonResponse(['errors' => $this->getFormErrors($form)], Response::HTTP_BAD_REQUEST);
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
