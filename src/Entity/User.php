<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $summoner_lol;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_banned;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $ban_date_start;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $ban_date_end;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getSummonerLol(): ?string
    {
        return $this->summoner_lol;
    }

    public function setSummonerLol(string $summoner_lol): self
    {
        $this->summoner_lol = $summoner_lol;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getIsBanned(): ?bool
    {
        return $this->is_banned;
    }

    public function setIsBanned(bool $is_banned): self
    {
        $this->is_banned = $is_banned;

        return $this;
    }

    public function getBanDateStart(): ?\DateTimeInterface
    {
        return $this->ban_date_start;
    }

    public function setBanDateStart(?\DateTimeInterface $ban_date_start): self
    {
        $this->ban_date_start = $ban_date_start;

        return $this;
    }

    public function getBanDateEnd(): ?\DateTimeInterface
    {
        return $this->ban_date_end;
    }

    public function setBanDateEnd(?\DateTimeInterface $ban_date_end): self
    {
        $this->ban_date_end = $ban_date_end;

        return $this;
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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}