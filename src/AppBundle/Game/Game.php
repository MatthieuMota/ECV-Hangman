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

    public function getRemainingAttempts()
    {
        return self::MAX_ATTEMPTS - $this->attempts;
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
