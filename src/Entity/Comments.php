<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoryy", inversedBy="comments")
     * // @ORM\JoinColumn(nullable=false)
     * @ORM\JoinColumn(name="categoryy_id", referencedColumnName="id")
     * 
     */
    private $categoryy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comments")
     * //@ORM\JoinColumn(nullable=false)
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    public $user;
  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getCategoryy(): ?Categoryy
    {
        return $this->categoryy;
    }

    public function setCategoryy(?Categoryy $categoryy): self
    {
        $this->categoryy = $categoryy;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
