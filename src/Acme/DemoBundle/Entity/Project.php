<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Projects
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity()
 */
class Project
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
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\Category", inversedBy="projects")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    protected $category;

    /**
     * @var string
     *
     * @Assert\Length(min = "3", minMessage = "Too short name")
     * @ORM\Column(name="name", type="string", length=200)
     */
    protected $name;

     /**
     * @var \Date
     *
     * @Assert\NotBlank(message = "This field should not be empty")
     * @ORM\Column(name="createdAt", type="date")
     */
    protected $createdAt;

    /**
     * @var string
     *
     * @Assert\Length(min = "3", minMessage = "Too short name")
     * @ORM\Column(name="clientCompany", type="string", length=200)
     */
    protected $clientCompany;


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
     * Set name
     *
     * @param string $name
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Project
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set clientCompany
     *
     * @param string $clientCompany
     * @return Project
     */
    public function setClientCompany($clientCompany)
    {
        $this->clientCompany = $clientCompany;

        return $this;
    }

    /**
     * Get clientCompany
     *
     * @return string 
     */
    public function getClientCompany()
    {
        return $this->clientCompany;
    }

    /**
     * Set category
     *
     * @param \Acme\DemoBundle\Entity\Category $category
     * @return Project
     */
    public function setCategory(\Acme\DemoBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Acme\DemoBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
