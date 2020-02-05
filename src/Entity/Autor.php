<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\AutorRepository")
 */
class Autor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length = 30)
     */
    private $imie;

    /**
     * @ORM\Column(type="string", length = 30)
     */
    private $nazwisko;

    /**
     * @return mixed
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * @param mixed $imie
     */
    public function setImie($imie)
    {
        $this->imie = $imie;
    }

    /**
     * @return mixed
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * @param mixed $nazwisko
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

}