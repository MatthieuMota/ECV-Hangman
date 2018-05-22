<?php


namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @Assert\NotBlank(message="app.subject")
     */
    private $subject;

    /**
     * @Assert\NotBlank(message="app.subject")
     * @Assert\Email()
     */
    private $sender;

    /**
     * @Assert\NotBlank(message="app.subject")
     * @Assert\Length(min = 15, )
     */
    private $description;


    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     * @return Contact
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Contact
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

}
