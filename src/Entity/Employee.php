<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
#[ORM\Table(name: 'employees')]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    private string $surname;

    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    private string $firstName;

    #[ORM\ManyToOne(targetEntity: Grade::class, inversedBy: 'employees')]
    private Grade $grade;

    #[ORM\ManyToOne(targetEntity: EmployeePosition::class, inversedBy: 'employee')]
    private EmployeePosition $employeePositions;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getGrade(): Grade
    {
        return $this->grade;
    }

    public function setGrade(Grade $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function __toString(): string
    {
        return  sprintf('%s %s', $this->getSurname(), $this->getFirstName());
    }
}
