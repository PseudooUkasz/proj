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

    /**
     * @ORM\Column(type="integer")
     */
    private $userid;

    /**
     * @ORM\Column(type="integer")
     */
    private $categoryyid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;
  
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

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(int $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getCategoryyid(): ?int
    {
        return $this->categoryyid;
    }

    public function setCategoryyid(int $categoryyid): self
    {
        $this->categoryyid = $categoryyid;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
    
}
