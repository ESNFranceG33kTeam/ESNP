<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OCMember
 *
 * @ORM\Table(name="esnp_oc_member")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OCMemberRepository")
 */
class OCMember
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
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=13)
     */
    private $mobile;

    /**
     * @ORM\Column(name="picture", type="string")
     */
    private $picture;

    /**
     * @var Event
     *
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="tips")
     */
    private $event;

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
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return string
     */
    public function __toString(){
        return $this->getFirstname() . ' ' . $this->getLastname();
    }
}

