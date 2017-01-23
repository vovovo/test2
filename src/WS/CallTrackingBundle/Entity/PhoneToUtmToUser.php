<?php

namespace WS\CallTrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;

/**
 * PhoneToUtmToUser
 *
 * @ORM\Table(name="phone_to_utm_to_user")
 * @ORM\Entity(repositoryClass="WS\CallTrackingBundle\Repository\PhoneToUtmToUserRepository")
 */
class PhoneToUtmToUser
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getUtm()
    {
        return $this->utm;
    }

    /**
     * @param mixed $utm
     */
    public function setUtm($utm)
    {
        $this->utm = $utm;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Phones")
     * @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     */
    private $phone;

    /**
     * @ORM\Column(name="utm", type="string")
     */
    private $utm;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }




}

