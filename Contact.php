<?php
/**
 * @author Jocelyn Flament
 * @since 17/07/2024
 */

class Contact
{
    private int $id;
    private string $name;
    private string $email;
    private string $phone_number;

    public function __construct(int $id, string $name, string $email, string $phone_number)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone_number = $phone_number;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPhoneNumber(string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function __toString(): string
    {
        return sprintf("%d) %s %s %s\n", $this->id, $this->name, $this->email, $this->phone_number);
    }
}