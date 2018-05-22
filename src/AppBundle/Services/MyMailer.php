<?php

/*
 * This file is part of the hangman package.
 *
 * (c) Matthieu Mota <matthieu@boxydev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Services;

use AppBundle\Entity\Contact;

class MyMailer
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMessageFromContact(Contact $contact)
    {
        $message = (new \Swift_Message($contact->getSubject()))
            ->setFrom('send@example.com')
            ->setTo($contact->getSender())
            ->setBody($contact->getDescription())
        ;

        $this->mailer->send($message);
    }
}
