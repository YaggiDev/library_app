<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\Autor_DzieloRepository")
 */
class Autor_dzielo
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
     * @ORM\ManyToOne(targetEntity="Autor")
	 * @ORM\JoinColumn(name="autor_id", referencedColumnName="id")
     */
    private $autor_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDzieloId(): ?Dzielo
    {
        return $this->dzielo_id;
    }

    public function setDzieloId(?Dzielo $dzielo_id): self
    {
        $this->dzielo_id = $dzielo_id;

        return $this;
    }

    public function getAutorId(): ?Autor
    {
        return $this->autor_id;
    }

    public function setAutorId(?Autor $autor_id): self
    {
        $this->autor_id = $autor_id;

        return $this;
    }
}
