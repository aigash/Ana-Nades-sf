<?php

namespace App\Entity;

use App\Repository\SpotRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpotRepository::class)
 */
class Spot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlPos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlAim;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlLand;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getUrlPos(): ?string
    {
        return $this->urlPos;
    }

    public function setUrlPos(string $urlPos): self
    {
        $this->urlPos = $urlPos;

        return $this;
    }

    public function getUrlAim(): ?string
    {
        return $this->urlAim;
    }

    public function setUrlAim(string $urlAim): self
    {
        $this->urlAim = $urlAim;

        return $this;
    }

    public function getUrlLand(): ?string
    {
        return $this->urlLand;
    }

    public function setUrlLand(string $urlLand): self
    {
        $this->urlLand = $urlLand;

        return $this;
    }
}
