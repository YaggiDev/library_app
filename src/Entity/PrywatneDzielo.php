<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrywatneDzieloRepository")
 */
class PrywatneDzielo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Dzielo")
     * @ORM\JoinColumn(name="dzielo_id", referencedColumnName="id")
     */
    private $dzielo_id;

    /**
     * @ManyToOne(targetEntity="Uzytkownik")
     * @ORM\JoinColumn(name="uzytkownik_id", referencedColumnName="id")
     */
    private $uzytkownik_id;

    public function getId(): ?int
    {
        return $this->id;
    }

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
    public function setDzieloId($dzielo_id): void
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
    public function setUzytkownikId($uzytkownik_id): void
    {
        $this->uzytkownik_id = $uzytkownik_id;
    }

}
