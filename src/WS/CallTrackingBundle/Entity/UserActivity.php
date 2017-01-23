<?php

namespace WS\CallTrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserActivity
 *
 * @ORM\Table(name="user_activity")
 * @ORM\Entity(repositoryClass="WS\CallTrackingBundle\Repository\UserActivityRepository")
 */
class UserActivity
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
     * @return string
     */
    public function getUserActivityKey()
    {
        return $this->userActivityKey;
    }

    /**
     * @param string $userActivityKey
     */
    public function setUserActivityKey($userActivityKey)
    {
        $this->userActivityKey = $userActivityKey;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="user_activity_key", type="string", length=500)
     */
    private $userActivityKey;


    /**
     * @var string
     *
     * @ORM\Column(name="user", type="integer", length=255)
     */
    private $user;

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="cookies", type="text")
     */
    private $cookies;

    /**
     * @var string
     *
     * @ORM\Column(name="current_url", type="text")
     */
    private $currentUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="referer_url", type="text")
     */
    private $refererUrl;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cookies
     *
     * @param string $cookies
     *
     * @return UserActivity
     */
    public function setCookies($cookies)
    {
        $this->cookies = $cookies;

        return $this;
    }

    /**
     * Get cookies
     *
     * @return string
     */
    public function getCookies()
    {
        return $this->cookies;
    }

    /**
     * Set currentUrl
     *
     * @param string $currentUrl
     *
     * @return UserActivity
     */
    public function setCurrentUrl($currentUrl)
    {
        $this->currentUrl = $currentUrl;

        return $this;
    }

    /**
     * Get currentUrl
     *
     * @return string
     */
    public function getCurrentUrl()
    {
        return $this->currentUrl;
    }

    /**
     * Set refererUrl
     *
     * @param string $refererUrl
     *
     * @return UserActivity
     */
    public function setRefererUrl($refererUrl)
    {
        $this->refererUrl = $refererUrl;

        return $this;
    }

    /**
     * Get refererUrl
     *
     * @return string
     */
    public function getRefererUrl()
    {
        return $this->refererUrl;
    }
}

