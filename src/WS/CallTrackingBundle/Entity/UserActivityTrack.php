<?php

namespace WS\CallTrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserActivityTrack
 *
 * @ORM\Table(name="user_activity_track")
 * @ORM\Entity(repositoryClass="WS\CallTrackingBundle\Repository\UserActivityTrackRepository")
 */
class UserActivityTrack
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
     * @var string
     *
     * @ORM\Column(name="user_activity_key", type="string", length=500)
     */
    private $userActivityKey;

    /**
     * @var string
     *
     * @ORM\Column(name="coockie_string", type="text")
     */
    private $coockieString;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime")
     */
    private $createAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;



    /**
     * @var string
     *
     * @ORM\Column(name="url_referer", type="text")
     */
    private $urlReferer;

    /**
     * @var string
     *
     * @ORM\Column(name="url_current", type="text")
     */
    private $urlCurrent;


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
     * Set userActivityKey
     *
     * @param string $userActivityKey
     *
     * @return UserActivityTrack
     */
    public function setUserActivityKey($userActivityKey)
    {
        $this->userActivityKey = $userActivityKey;

        return $this;
    }

    /**
     * Get userActivityKey
     *
     * @return string
     */
    public function getUserActivityKey()
    {
        return $this->userActivityKey;
    }

    /**
     * Set coockieString
     *
     * @param string $coockieString
     *
     * @return UserActivityTrack
     */
    public function setCoockieString($coockieString)
    {
        $this->coockieString = $coockieString;

        return $this;
    }

    /**
     * Get coockieString
     *
     * @return string
     */
    public function getCoockieString()
    {
        return $this->coockieString;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return UserActivityTrack
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return UserActivityTrack
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }



    /**
     * Set urlReferer
     *
     * @param string $urlReferer
     *
     * @return UserActivityTrack
     */
    public function setUrlReferer($urlReferer)
    {
        $this->urlReferer = $urlReferer;

        return $this;
    }

    /**
     * Get urlReferer
     *
     * @return string
     */
    public function getUrlReferer()
    {
        return $this->urlReferer;
    }

    /**
     * Set urlCurrent
     *
     * @param string $urlCurrent
     *
     * @return UserActivityTrack
     */
    public function setUrlCurrent($urlCurrent)
    {
        $this->urlCurrent = $urlCurrent;

        return $this;
    }

    /**
     * Get urlCurrent
     *
     * @return string
     */
    public function getUrlCurrent()
    {
        return $this->urlCurrent;
    }


}

