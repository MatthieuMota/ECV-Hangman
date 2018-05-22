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

class Dictionnary
{
    private $words = [];

    public function __construct()
    {
        $this->words = ['voiture', 'automobile', 'camion'];
    }

    public function getRandom()
    {
        $randomKey = array_rand($this->words);

        return $this->words[$randomKey];
    }
}
