<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\MebelRepository")
 */
class Mebel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ilosc_polek;

    /**
     * @return mixed
     */
    public function getIloscPolek()
    {
        return $this->ilosc_polek;
    }

    /**
     * @param mixed $ilosc_polek
     */
    public function setIloscPolek($ilosc_polek)
    {
        $this->ilosc_polek = $ilosc_polek;
    }

    /**
     * @return mixed
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * @param mixed $nazwa
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;
    }
	
	/**
     * @ORM\Column(type="string", length = 20, unique=true)
     */
    private $nazwa;
	
	/**
     * @ORM\ManyToOne(targetEntity="Pokoj")
	 * @ORM\JoinColumn(name="pokoj_id", referencedColumnName="id")
     */
    private $pokoj_id;

    /**
     * @return mixed
     */
    public function getPokojId()
    {
        return $this->pokoj_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setPokojId(?Pokoj $pokoj_id): self
    {
        $this->pokoj_id = $pokoj_id;

        return $this;
    }
    public function __toString()
    {
        return $this->nazwa;
    }



}