<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\DzieloRepository")
 */
class Dzielo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length = 60)
     */
    private $tytul;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $kod_jezyka;
	
	/**
     * @ORM\Column(type="string", length=60)
     */
    private $rodzaj_dokumentu;
	
	/**
     * @ORM\Column(type="string", length=13)
     */
    private $kod_dziala;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $polozenie_pierwotne;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $polozenie_aktualne;
	
	/**
     * @ORM\Column(type="blob")
     */
    private $zdjecie;
	
	/**
     * @ORM\Column(type="boolean")
     */
    private $czy_wypozyczone;
	
	/**
     * @ORM\Column(type="datetime")
     */
    private $data_dodania;
	
	/**
     * @ORM\Column(type="datetime")
     */
    private $data_usuniecia;
	
	/**
     * @ORM\Column(type="boolean")
     */
    private $czy_prywatne;
	
	/**
     * @ORM\Column(type="boolean")
     */
    private $czy_dla_doroslych;

	/**
     * @ORM\ManyToOne(targetEntity="Polka")
	 * @ORM\JoinColumn(name="polka_id", referencedColumnName="id")
     */
    private $polka_id;

    /**
     * @ORM\ManyToOne(targetEntity="Kategoria")
     * @ORM\JoinColumn(name="kategoria_id", referencedColumnName="id")
     */
    private $kategoria_id;

    /**
     * @return mixed
     */
    public function getKategoriaId()
    {
        return $this->kategoria_id;
    }

    /**
     * @param mixed $kategoria_id
     */
    public function setKategoriaId($kategoria_id): void
    {
        $this->kategoria_id = $kategoria_id;
    }

    /**
     * @return mixed
     */
    public function getTytul()
    {
        return $this->tytul;
    }

    /**
     * @param mixed $tytul
     */
    public function setTytul($tytul)
    {
        $this->tytul = $tytul;
    }

    /**
     * @return mixed
     */
    public function getKodJezyka()
    {
        return $this->kod_jezyka;
    }

    /**
     * @param mixed $kod_jezyka
     */
    public function setKodJezyka($kod_jezyka)
    {
        $this->kod_jezyka = $kod_jezyka;
    }

    /**
     * @return mixed
     */
    public function getRodzajDokumentu()
    {
        return $this->rodzaj_dokumentu;
    }

    /**
     * @param mixed $rodzaj_dokumentu
     */
    public function setRodzajDokumentu($rodzaj_dokumentu)
    {
        $this->rodzaj_dokumentu = $rodzaj_dokumentu;
    }

    /**
     * @return mixed
     */
    public function getKodDziala()
    {
        return $this->kod_dziala;
    }

    /**
     * @param mixed $kod_dziala
     */
    public function setKodDziala($kod_dziala)
    {
        $this->kod_dziala = $kod_dziala;
    }

    /**
     * @return mixed
     */
    public function getPolozeniePierwotne()
    {
        return $this->polozenie_pierwotne;
    }

    /**
     * @param mixed $polozenie_pierwotne
     */
    public function setPolozeniePierwotne($polozenie_pierwotne)
    {
        $this->polozenie_pierwotne = $polozenie_pierwotne;
    }

    /**
     * @return mixed
     */
    public function getPolozenieAktualne()
    {
        return $this->polozenie_aktualne;
    }

    /**
     * @param mixed $polozenie_aktualne
     */
    public function setPolozenieAktualne($polozenie_aktualne)
    {
        $this->polozenie_aktualne = $polozenie_aktualne;
    }

    /**
     * @return mixed
     */
    public function getZdjecie()
    {
        return $this->zdjecie;
    }

    /**
     * @param mixed $zdjecie
     */
    public function setZdjecie($zdjecie)
    {
        $this->zdjecie = $zdjecie;
    }

    /**
     * @return mixed
     */
    public function getCzyWypozyczone()
    {
        return $this->czy_wypozyczone;
    }

    /**
     * @param mixed $czy_wypozyczone
     */
    public function setCzyWypozyczone($czy_wypozyczone)
    {
        $this->czy_wypozyczone = $czy_wypozyczone;
    }

    /**
     * @return mixed
     */
    public function getDataDodania()
    {
        return $this->data_dodania;
    }

    /**
     * @param mixed $data_dodania
     */
    public function setDataDodania($data_dodania)
    {
        $this->data_dodania = $data_dodania;
    }

    /**
     * @return mixed
     */
    public function getDataUsuniecia()
    {
        return $this->data_usuniecia;
    }

    /**
     * @param mixed $data_usuniecia
     */
    public function setDataUsuniecia($data_usuniecia)
    {
        $this->data_usuniecia = $data_usuniecia;
    }

    /**
     * @return mixed
     */
    public function getCzyPrywatne()
    {
        return $this->czy_prywatne;
    }

    /**
     * @param mixed $czy_prywatne
     */
    public function setCzyPrywatne($czy_prywatne)
    {
        $this->czy_prywatne = $czy_prywatne;
    }

    /**
     * @return mixed
     */
    public function getCzyDlaDoroslych()
    {
        return $this->czy_dla_doroslych;
    }

    /**
     * @param mixed $czy_dla_doroslych
     */
    public function setCzyDlaDoroslych($czy_dla_doroslych)
    {
        $this->czy_dla_doroslych = $czy_dla_doroslych;
    }

    /**
     * @return mixed
     */
    public function getPolkaId()
    {
        return $this->polka_id;
    }

    /**
     * @param mixed $polka_id
     */
    public function setPolkaId($polka_id)
    {
        $this->polka_id = $polka_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function __toString()
    {
        return $this->tytul;
    }

}
