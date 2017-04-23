<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * OCMember
 *
 * @ORM\Table(name="esnp_event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="logo_url", type="string", length=255)
     */
    private $logoUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="calendar", type="string", length=255)
     */
    private $calendar;

    /**
     * @var \Datetime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Tip", mappedBy="event")
     */
    private $tips;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OCMember", mappedBy="event")
     */
    private $ocmembers;

    /**
     * Constructor
     */
    public function __construct(){
        $this->tips = new ArrayCollection();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLogoUrl()
    {
        return $this->logoUrl;
    }

    /**
     * @param string $logoUrl
     */
    public function setLogoUrl($logoUrl)
    {
        $this->logoUrl = $logoUrl;
    }

    /**
     * @return string
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * @param string $calendar
     */
    public function setCalendar($calendar)
    {
        $this->calendar = $calendar;
    }

    /**
     * @return \Datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \Datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param Tip $tip
     * @return $this
     */
    public function addTip(Tip $tip){
        $this->tips->add($tip);

        $tip->setEvent($this);

        return $this;
    }

    /**
     * @param Tip $tip
     * @return $this
     */
    public function removeTip(Tip $tip){
        $this->tips->removeElement($tip);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTips(){
        return $this->tips;
    }

    /**
     * @param OCMember $member
     * @return $this
     */
    public function addOCMember(OCMember $member){
        $this->ocmembers->add($member);

        $member->setEvent($this);

        return $this;
    }

    /**
     * @param OCMember $member
     * @return $this
     */
    public function removeOCMember(OCMember $member){
        $this->ocmembers->removeElement($member);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getOCMembers(){
        return $this->ocmembers;
    }
}

