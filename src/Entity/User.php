<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
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
     * @ORM\Column(type="string", length=11)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=ImportOrder::class, mappedBy="ImUser", orphanRemoval=true)
     */
    private $UserIm;

    /**
     * @ORM\OneToMany(targetEntity=ExportOrder::class, mappedBy="ExUser", orphanRemoval=true)
     */
    private $UserEx;

    public function __construct()
    {
        $this->UserIm = new ArrayCollection();
        $this->UserEx = new ArrayCollection();
    }

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
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
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
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, ImportOrder>
     */
    public function getUserIm(): Collection
    {
        return $this->UserIm;
    }

    public function addUserIm(ImportOrder $userIm): self
    {
        if (!$this->UserIm->contains($userIm)) {
            $this->UserIm[] = $userIm;
            $userIm->setImUser($this);
        }

        return $this;
    }

    public function removeUserIm(ImportOrder $userIm): self
    {
        if ($this->UserIm->removeElement($userIm)) {
            // set the owning side to null (unless already changed)
            if ($userIm->getImUser() === $this) {
                $userIm->setImUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ExportOrder>
     */
    public function getUserEx(): Collection
    {
        return $this->UserEx;
    }

    public function addUserEx(ExportOrder $userEx): self
    {
        if (!$this->UserEx->contains($userEx)) {
            $this->UserEx[] = $userEx;
            $userEx->setExUser($this);
        }

        return $this;
    }

    public function removeUserEx(ExportOrder $userEx): self
    {
        if ($this->UserEx->removeElement($userEx)) {
            // set the owning side to null (unless already changed)
            if ($userEx->getExUser() === $this) {
                $userEx->setExUser(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
