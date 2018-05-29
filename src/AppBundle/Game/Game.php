<?php

/*
 * This file is part of the hangman package.
 *
 * (c) Matthieu Mota <matthieu@boxydev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Game;

class Game
{
    const MAX_ATTEMPTS = 11;
    private $word;
    private $attempts;
    private $foundLetters;
    private $triedLetters;

    public function __construct($word, $attempts = 0, $foundLetters = [], $triedLetters = [])
    {
        $this->word = $word;
        $this->attempts = $attempts;
        $this->foundLetters = $foundLetters;
        $this->triedLetters = $triedLetters;
    }

    /**
     * @return mixed
     */
    public function getWord()
    {
        return $this->word;
    }

    public function getWordLength()
    {
        return strlen($this->word);
    }

    /**
     * Créer une méthode qui transforme le mot en tableau
     * Utiliser la méthode dans la vue Twig
     * Plutôt que de faire une boucle de 1 à la taille du mot
     * Faire une boucle sur le mot en tableau et à chaque fois, regarder si la lettre a été trouvé ou non
     * Pour savoir si la lettre a été trouvé ou non, on peut créer une méthode
     */

    public function getWordLetters()
    {
        return str_split($this->word);
    }

    public function isLetterFound($letter)
    {
        return in_array($letter, $this->foundLetters);
    }

    public function getRemainingAttempts()
    {
        return self::MAX_ATTEMPTS - $this->attempts;
    }

    public function isOver()
    {
        return $this->attempts >= self::MAX_ATTEMPTS;
    }

    public function tryLetter($letter)
    {
        $letter = strtolower($letter);

        if (false !== strpos($this->word, $letter)) { // Si la lettre fait partie du mot
            $this->foundLetters[] = $letter;

            return true;
        }

        // Si la lettre ne fait pas partie du mot
        $this->attempts++;

        return false;
    }
}
