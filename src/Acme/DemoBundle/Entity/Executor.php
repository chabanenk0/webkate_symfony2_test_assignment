<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Executors
 *
 * @ORM\Table(name="executors")
 * @ORM\Entity()
 */
class Executor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Acme\DemoBundle\Entity\Project", inversedBy="executors", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="executors_projects")
     */
    protected $projects;

    /**
     * @var string
     *
     * @Assert\NotBlank(message = "This field should not be empty")
     * @Assert\Length(min = "3", minMessage = "Too short name")
     * @ORM\Column(name="firstName", type="string", length=200)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @Assert\Length(min = "3", minMessage = "Too short name")
     * @ORM\Column(name="middleName", type="string", length=200)
     */
    protected $middleName;

    /**
     * @var string
     *
     * @Assert\NotBlank(message = "This field should not be empty")
     * @Assert\Length(min = "3", minMessage = "Too short name")
     * @ORM\Column(name="lastName", type="string", length=200)
     */
    protected $lastName;

    /**
     * @var \Date
     *
     * @Assert\NotBlank(message = "This field should not be empty")
     * @ORM\Column(name="birthday", type="date")
     */
    protected $birthday;

    /**
     * @var \Date
     *
     * @Assert\NotBlank(message = "This field should not be empty")
     * @ORM\Column(name="carrierBeginningDate", type="date")
     */
    protected $careerBeginningDate;

    /**
     * @var string
     *
     * @Assert\NotBlank(message = "This field should not be empty")
     * @Assert\Length(min = "4", minMessage = "Too short name")
     * @ORM\Column(name="phone", type="string", length=200)
     */
    protected $phone;

   /**
     * @var string
     *
     * @Assert\NotBlank(message = "This field should not be empty")
     * @ORM\Column(name="email", type="string", length=200)
     */
    protected $email;

   /**
     * @var string
     *
     * @Assert\NotBlank(message = "This field should not be empty")
     * @ORM\Column(name="skype", type="string", length=200)
     */
    protected $skype;

    /**
     * @var string
     *
     * @Assert\NotBlank(message = "This field should not be empty")
     * @ORM\Column(name="technologiesUsing", type="text")
     */
    protected $technologiesUsing;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Executor
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
     * Set middleName
     *
     * @param string $middleName
     * @return Executor
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Executor
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
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Executor
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set careerBeginningDate
     *
     * @param \DateTime $careerBeginningDate
     * @return Executor
     */
    public function setCareerBeginningDate($careerBeginningDate)
    {
        $this->careerBeginningDate = $careerBeginningDate;

        return $this;
    }

    /**
     * Get careerBeginningDate
     *
     * @return \DateTime 
     */
    public function getCareerBeginningDate()
    {
        return $this->careerBeginningDate;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Executor
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Executor
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
     * Set skype
     *
     * @param string $skype
     * @return Executor
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;

        return $this;
    }

    /**
     * Get skype
     *
     * @return string 
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Set technologiesUsing
     *
     * @param string $technologiesUsing
     * @return Executor
     */
    public function setTechnologiesUsing($technologiesUsing)
    {
        $this->technologiesUsing = $technologiesUsing;

        return $this;
    }

    /**
     * Get technologiesUsing
     *
     * @return string 
     */
    public function getTechnologiesUsing()
    {
        return $this->technologiesUsing;
    }

    /**
     * Add projects
     *
     * @param \Acme\DemoBundle\Entity\Project $projects
     * @return Executor
     */
    public function addProject(\Acme\DemoBundle\Entity\Project $projects)
    {
        $this->projects[] = $projects;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param \Acme\DemoBundle\Entity\Project $projects
     */
    public function removeProject(\Acme\DemoBundle\Entity\Project $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }
}
