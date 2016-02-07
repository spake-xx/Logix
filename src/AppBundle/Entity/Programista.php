<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programisci
 *
 * @ORM\Table(name="programisci")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProgramistaRepository")
 */
class Programista
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
     * @ORM\Column(name="imie", type="string", length=30)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwisko", type="string", length=80)
     */
    private $nazwisko;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=140)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="miasto", type="string", length=40)
     */
    private $miasto;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Technologia")
     * @ORM\JoinColumn(name="technologia", referencedColumnName="id")
     */
    private $technologia;



    function __toString(){
        return $this->imie. " ". $this->nazwisko;
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
     * Set imie
     *
     * @param string $imie
     * @return Programisci
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string 
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     * @return Programisci
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    /**
     * Get nazwisko
     *
     * @return string 
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Set adres
     *
     * @param string $adres
     * @return Programisci
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string 
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set miasto
     *
     * @param string $miasto
     * @return Programisci
     */
    public function setMiasto($miasto)
    {
        $this->miasto = $miasto;

        return $this;
    }

    /**
     * Get miasto
     *
     * @return string 
     */
    public function getMiasto()
    {
        return $this->miasto;
    }

    /**
     * Set technologia
     *
     * @param integer $technologia
     * @return Programisci
     */
    public function setTechnologia($technologia)
    {
        $this->technologia = $technologia;

        return $this;
    }

    /**
     * Get technologia
     *
     * @return integer 
     */
    public function getTechnologia()
    {
        return $this->technologia;
    }
}
