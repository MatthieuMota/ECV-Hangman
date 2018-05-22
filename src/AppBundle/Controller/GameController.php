<?php

namespace AppBundle\Controller;

use AppBundle\Game\Dictionnary;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
    /**
     * @Route("/{_locale}/game", name="game_home", requirements={"_locale"="fr|en"})
     * @param Dictionnary $dictionnary
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Dictionnary $dictionnary)
    {
        $word = $dictionnary->getRandom();
        dump($word);

        return $this->render('game/index.html.twig');
    }
}