<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
//bin/console doctrine:schema:update --dump-sql
//bin/console doctrine:schema:update --force
/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $titile;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $image;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="post")
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     */
    private $ilosc;

    /**
     * @ORM\Column(type="integer")
     */
    private $cena;

    /**
     * @ORM\Column(type="text")
     */
    private $opis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitile(): ?string
    {
        return $this->titile;
    }

    public function setTitile(string $titile): self
    {
        $this->titile = $titile;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getIlosc(): ?int
    {
        return $this->ilosc;
    }

    public function setIlosc(int $ilosc): self
    {
        $this->ilosc = $ilosc;

        return $this;
    }

    public function getCena(): ?int
    {
        return $this->cena;
    }

    public function setCena(int $cena): self
    {
        $this->cena = $cena;

        return $this;
    }

    public function getOpis(): ?string
    {
        return $this->opis;
    }

    public function setOpis(string $opis): self
    {
        $this->opis = $opis;

        return $this;
    }
}
