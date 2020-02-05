<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PolkaRepository")
 */
class Polka
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $czy_pelna;
	
	/**
     * @ORM\Column(type="integer", unique=true)
     */
    private $numer;
	
	/**
     * @ORM\ManyToOne(targetEntity="Mebel")
	 * @ORM\JoinColumn(name="mebel_id", referencedColumnName="id")
     */
    private $mebel_id;

    /**
     * @return mixed
     */
    public function getCzyPelna()
    {
        return $this->czy_pelna;
    }

    /**
     * @param mixed $czy_pelna
     */
    public function setCzyPelna($czy_pelna)
    {
        $this->czy_pelna = $czy_pelna;
    }

    /**
     * @return mixed
     */
    public function getNumer()
    {
        return $this->numer;
    }

    /**
     * @param mixed $numer
     */
    public function setNumer($numer)
    {
        $this->numer = $numer;
    }

    /**
     * @return mixed
     */
    public function getMebelId()
    {
        return $this->mebel_id;
    }

    /**
     * @param mixed $mebel_id
     */
    public function setMebelId($mebel_id)
    {
        $this->mebel_id = $mebel_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function __toString()
    {
        $nazwa = strval($this->numer);
        return $nazwa;
    }

}