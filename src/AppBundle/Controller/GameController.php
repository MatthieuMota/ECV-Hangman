<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
    /**
     * @Route("/{_locale}/game", name="game_home", requirements={"_locale"="fr|en"})
     */
    public function indexAction()
    {
        // $word = $dictionnary->getRandom();

        return $this->render('game/index.html.twig');
    }
}