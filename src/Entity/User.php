<?php


namespace App\Entity;


use App\Security\Role;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface;


class User implements UserInterface
{
    protected ?string $id;
    protected string $name;
    protected string $email;
    protected string $password;
    protected array $roles;
    protected \DateTime $createdAt;
    protected \DateTime $updatedAt;

    /**
     * @throws \Exception
     */
    public function __construct(string $name, string $email, string $id=null)
    {
        $this->id = $id ?? Uuid::uuid4()->toString();
        $this->name = $name;
        $this->email = $email;
        $this->roles= Role::ROLE_USER;  // clase abstracta generada previamente
        $this->createdAt= new \DateTime();
        $this->markAsUpdated();
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array|string
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function markAsUpdated(){
        $this->updatedAt = new \DateTime();
    }
    public function getSalt(): void
    {
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
    }
}