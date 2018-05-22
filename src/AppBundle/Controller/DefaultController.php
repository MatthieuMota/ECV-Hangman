<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Get HTML files at https://we.tl/lGFdV0OUk4
 */
class DefaultController extends Controller
{
    /**
     * @Route(
     *     "/hello/{name}",
     *     defaults={ "name" = "Matthieu" }
     * )
     * A route to see Hello World in Symfony.
     * Ajouter un paramètre name dans la route qui a une valeur par défaut.
     * Récupérer ce paramètre dans l'action et le passer dans Twig
     * Afficher le nom dans Twig
     *
     * @param Request $request
     * @param string $name
     * @return Response
     */
    public function helloAction(Request $request, $name)
    {
        // return new Response('<body>Hello</body>');
        return $this->render('default/hello.html.twig', [
            'name' => $name
        ]);
    }

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->redirectToRoute('game_home');
    }
}
