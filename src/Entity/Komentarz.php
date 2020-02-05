<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\KomentarzRepository")
 */
class Komentarz
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Dzielo")
	 * @ORM\JoinColumn(name="dzielo_id", referencedColumnName="id")
     */
    private $dzielo_id;
	
	/**
     * @ORM\ManyToOne(targetEntity="Uzytkownik")
	 * @ORM\JoinColumn(name="uzytkownik_id", referencedColumnName="id")
     */
    private $uzytkownik_id;
	
	/**
     * @ORM\Column(type="string", length = 255)
     */
    private $tresc;

    /**
     * @return mixed
     */
    public function getDzieloId()
    {
        return $this->dzielo_id;
    }

    /**
     * @param mixed $dzielo_id
     */
    public function setDzieloId($dzielo_id)
    {
        $this->dzielo_id = $dzielo_id;
    }

    /**
     * @return mixed
     */
    public function getUzytkownikId()
    {
        return $this->uzytkownik_id;
    }

    /**
     * @param mixed $uzytkownik_id
     */
    public function setUzytkownikId($uzytkownik_id)
    {
        $this->uzytkownik_id = $uzytkownik_id;
    }

    /**
     * @return mixed
     */
    public function getTresc()
    {
        return $this->tresc;
    }

    /**
     * @param mixed $tresc
     */
    public function setTresc($tresc)
    {
        $this->tresc = $tresc;
    }

    public function getId(): ?int
    {
        return $this->id;
    }


}
