<?php

namespace WS\CallTrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phones
 *
 * @ORM\Table(name="phones")
 * @ORM\Entity(repositoryClass="WS\CallTrackingBundle\Repository\PhonesRepository")
 */
class Phones
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
     * @ORM\Column(name="phone_num", type="string", length=15)
     */
    private $phone_num;

    /**
     * @return mixed
     */
    public function getPhoneNum()
    {
        return $this->phone_num;
    }

    /**
     * @param mixed $phone_num
     */
    public function setPhoneNum($phone_num)
    {
        $this->phone_num = $phone_num;
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
        return $this->phone_num;
    }

}

