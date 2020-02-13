<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KategoriaRepository")
 */
class Kategoria
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type= "string", unique = true, nullable = false)
     */
    private $nazwa;

    public function getId(): ?int
    {
        return $this->id;
    }


}
