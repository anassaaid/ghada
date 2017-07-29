<?php

namespace DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="DemoBundle\Repository\DepartementRepository")
 */
class Departement
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="Employer", mappedBy="departement")
     */
    private $employers;

    public function __construct()
    {
        $this->employers = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->libelle;
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

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Departement
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Add employer
     *
     * @param \DemoBundle\Entity\Employer $employer
     *
     * @return Departement
     */
    public function addEmployer(\DemoBundle\Entity\Employer $employer)
    {
        $this->employers[] = $employer;

        return $this;
    }

    /**
     * Remove employer
     *
     * @param \DemoBundle\Entity\Employer $employer
     */
    public function removeEmployer(\DemoBundle\Entity\Employer $employer)
    {
        $this->employers->removeElement($employer);
    }

    /**
     * Get employers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmployers()
    {
        return $this->employers;
    }
}
