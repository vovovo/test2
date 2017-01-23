<?php

namespace WS\CallTrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utm
 *
 * @ORM\Table(name="utm")
 * @ORM\Entity(repositoryClass="WS\CallTrackingBundle\Repository\UtmRepository")
 */
class Utm
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var
     * @ORM\Column(name="utm_string", type="string", length=255)
     */
    private $utm_string;

    /**
     * @var
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @return mixed
     */
    public function getUtmString()
    {
        return $this->utm_string;
    }

    /**
     * @param mixed $utm_string
     */
    public function setUtmString($utm_string)
    {
        $this->utm_string = $utm_string;
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
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->utm_string;
    }

}

