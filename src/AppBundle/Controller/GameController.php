<?php

namespace AppBundle\Controller;

use AppBundle\Game\Game;
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
        // On récupére la partie s'il y en a une
        $game = $this->get('session')->get('game');

        if (null === $game) { // On génére un mot s'il n'y a pas de partie en cours
            $word = $dictionnary->getRandom();
            // Génére la partie
            $game = new Game($word);
            // On met le mot en session
            $this->get('session')->set('game', $game);
        }

        // Si le nombre d'essais est dépassé
        if ($game->isOver()) {
            $this->get('session')->remove('game'); // On reset la partie avant d'afficher la page "perdu"

            return $this->render('game/lose.html.twig', ['game' => $game]);
        }

        return $this->render('game/index.html.twig', [
            'game' => $game
        ]);
    }

    /**
     *
     * Créer la route /fr/game/letter/G. La route doit avoir un paramètre.
     * Quand on se rend sur la route, on doit récupérer la partie qui est en session.
     * On regarde si la lettre fait partie du mot.
     * Si la lettre ne fait pas partie du mot alors on décrémente la valeur attempts
     * Si la lettre fait partie du mot, trouver un moyen de garder dans la partie les lettres "trouvées"
     * Faire une redirection vers /fr/game
     *
     * @Route("/{_locale}/game/letter/{letter}", name="game_try_letter", requirements={
     *     "letter"="[A-Z]"
     * })
     */
    public function tryLetterAction($letter)
    {
        // On récupére le tableau contenant la partie
        /** @var Game $game */
        $game = $this->get('session')->get('game');

        if ($game) { // Si la partie n'existe pas
            $game->tryLetter($letter);

            $this->get('session')->set('game', $game);
        }

        return $this->redirectToRoute('game_home');
    }

    /**
     * @Route("/{_locale}/game/reset", name="game_reset")
     */
    public function resetAction()
    {
        $this->get('session')->remove('game'); // On reset la partie

        return $this->redirectToRoute('game_home');
    }
}