<?php

namespace App\Entity;

use App\Repository\LevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LevelRepository::class)
 */
class Level
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomLevel;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="level")
     */
    private $idUser;

    public function __construct()
    {
        $this->idUser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Fonction qui permet de récupérer l'image associée à un niveau
     *
     * @return string|null
     * 
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Fonction qui permet de définir l'image associée à un niveau
     *
     * @param string $image
     * 
     * @return self
     * 
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Fonction qui permet de récupérer le nom d'un niveau
     *
     * @return string|null
     * 
     */
    public function getNomLevel(): ?string
    {
        return $this->nomLevel;
    }

    /**
     * Fonction qui permet de définir le nom d'un niveau
     *
     * @param string $nomLevel
     * 
     * @return self
     * 
     */
    public function setNomLevel(string $nomLevel): self
    {
        $this->nomLevel = $nomLevel;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getIdUser(): Collection
    {
        return $this->idUser;
    }

    public function addIdUser(User $idUser): self
    {
        if (!$this->idUser->contains($idUser)) {
            $this->idUser[] = $idUser;
            $idUser->setLevel($this);
        }

        return $this;
    }

    public function removeIdUser(User $idUser): self
    {
        if ($this->idUser->removeElement($idUser)) {
            // set the owning side to null (unless already changed)
            if ($idUser->getLevel() === $this) {
                $idUser->setLevel(null);
            }
        }

        return $this;
    }
}
