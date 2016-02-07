<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Klient
 *
 * @ORM\Table(name="klient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KlientRepository")
 */
class Klient
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
     * @ORM\Column(name="imie", type="string", length=40)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwisko", type="string", length=100)
     */
    private $nazwisko;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=255)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="miasto", type="string", length=50)
     */
    private $miasto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=10)
     */
    private $telefon;




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
     * @return Klient
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
     * @return Klient
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
     * @return Klient
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
     * @return Klient
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
     * Set telefon
     *
     * @param string $telefon
     * @return Klient
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string 
     */
    public function getTelefon()
    {
        return $this->telefon;
    }
}
