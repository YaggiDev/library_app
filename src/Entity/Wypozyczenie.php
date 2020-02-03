<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\WypozyczenieRepository")
 */
class Wypozyczenie
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
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data_wypozyczenia;
	
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
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDataWypozyczenia()
    {
        return $this->data_wypozyczenia;
    }

    /**
     * @param mixed $data_wypozyczenia
     */
    public function setDataWypozyczenia($data_wypozyczenia)
    {
        $this->data_wypozyczenia = $data_wypozyczenia;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->$id = $id;
        return $this;
    }
    public function getDzieloId(): ?Dzielo
    {
        return $this->dzielo_id;
    }

    public function setDzieloId(Dzielo $dzielo_id)
    {
        $this->dzielo_id = $dzielo_id;

        return $this;
    }

    public function getUzytkownikId(): ?Uzytkownik
    {
        return $this->uzytkownik_id;
    }

    public function setUzytkownikId(Uzytkownik $uzytkownik_id)
    {
        $this->uzytkownik_id = $uzytkownik_id;

        return $this;
    }

}