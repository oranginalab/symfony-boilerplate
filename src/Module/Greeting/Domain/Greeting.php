<?php

namespace App\Module\Greeting\Domain;

use App\Module\Shared\Domain\UuidGeneratorServiceInterface;

class Greeting
{

    private string $id;

    private string $message;

    private \DateTime $createdAt;

    public function __construct(string $id, string $message)
    {
        $this->id = $id;
        $this->message = $message;
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

}
