<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notatka
 *
 * @ORM\Table(name="notatka")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NotatkaRepository")
 */
class Notatka
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Programista")
     * @ORM\JoinColumn(name="programista", referencedColumnName="id")
     */
    private $programista;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Zlecenie")
     * @ORM\JoinColumn(name="zlecenie", referencedColumnName="id")
     */
    private $zlecenie;

    /**
     * @var string
     *
     * @ORM\Column(name="notatka", type="string", length=255)
     */
    private $notatka;


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
     * Set programista
     *
     * @param integer $programista
     * @return Notatka
     */
    public function setProgramista($programista)
    {
        $this->programista = $programista;

        return $this;
    }

    /**
     * Get programista
     *
     * @return integer 
     */
    public function getProgramista()
    {
        return $this->programista;
    }

    /**
     * Set zlecenie
     *
     * @param integer $zlecenie
     * @return Notatka
     */
    public function setZlecenie($zlecenie)
    {
        $this->zlecenie = $zlecenie;

        return $this;
    }

    /**
     * Get zlecenie
     *
     * @return integer 
     */
    public function getZlecenie()
    {
        return $this->zlecenie;
    }

    /**
     * Set notatka
     *
     * @param string $notatka
     * @return Notatka
     */
    public function setNotatka($notatka)
    {
        $this->notatka = $notatka;

        return $this;
    }

    /**
     * Get notatka
     *
     * @return string 
     */
    public function getNotatka()
    {
        return $this->notatka;
    }
}
