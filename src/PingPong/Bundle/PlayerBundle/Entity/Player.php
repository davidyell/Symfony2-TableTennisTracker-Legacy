<?php

namespace PingPong\Bundle\PlayerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Players
 *
 * @ORM\Table(name="players")
 * @ORM\Entity
 */
class Player
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=255, nullable=true)
     */
    private $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    private $facebookId;

    /**
     * @var integer
     *
     * @ORM\Column(name="performance_rating", type="integer", nullable=false)
     */
    private $performanceRating;

    /**
     * @var integer
     *
     * @ORM\Column(name="department_id", type="integer", nullable=true)
     */
    private $departmentId;
    
    /**
     * @var string
     * 
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="players")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
    protected $department;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Players
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     *
     * @return Players
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Players
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Players
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set facebookId
     *
     * @param string $facebookId
     *
     * @return Players
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set performanceRating
     *
     * @param integer $performanceRating
     *
     * @return Players
     */
    public function setPerformanceRating($performanceRating)
    {
        $this->performanceRating = $performanceRating;

        return $this;
    }

    /**
     * Get performanceRating
     *
     * @return integer
     */
    public function getPerformanceRating()
    {
        return $this->performanceRating;
    }

    /**
     * Set departmentId
     *
     * @param integer $departmentId
     *
     * @return Players
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    /**
     * Get departmentId
     *
     * @return integer
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Players
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return Players
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set department
     *
     * @param \PingPong\Bundle\PlayerBundle\Entity\Department $department
     * @return Player
     */
    public function setDepartment(\PingPong\Bundle\PlayerBundle\Entity\Department $department = null)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return \PingPong\Bundle\PlayerBundle\Entity\Department 
     */
    public function getDepartment()
    {
        return $this->department;
    }
}