<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(): Response
    {
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }

    public function addToCart($id, SessionInterface $session)
    {
        // Récupérez l'article en fonction de l'identifiant $id depuis votre source de données (base de données, service, etc.)
        $article = // récupérez l'article depuis votre source de données

        // Ajoutez l'article au panier dans la session
        $panier = $session->get('panier', []);
        $panier[$id] = $article;
        $session->set('panier', $panier);

        // Redirigez l'utilisateur vers la page du panier
        return new RedirectResponse($this->generateUrl('app_panier'));
    }
}
