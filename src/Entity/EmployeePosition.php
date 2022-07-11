<?php

namespace App\Entity;

use App\Repository\EmployeePositionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeePositionRepository::class)]
class EmployeePosition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $finalScore;

    #[ORM\ManyToOne(targetEntity: ExpectationLevel::class, inversedBy: 'employeePosition')]
    public $expectationLevel;

    #[ORM\ManyToOne(targetEntity: Employee::class, inversedBy: 'employeePositions')]
    public $employee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFinalScore() {
        return $this->finalScore;
    }

    public function setFinalScore($finalScore): void
    {
        self::assertFinalScoreIsCorrect($finalScore);

        $this->finalScore = $finalScore;
    }

    public function getExpectationLevel()
    {
        return $this->expectationLevel;
    }

    public function setExpectationLevel($expectationLevel): void
    {
        $this->expectationLevel = $expectationLevel;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    private static function assertFinalScoreIsCorrect($finalScore)
    {
        if ($finalScore < 0 || $finalScore > 4) {
            throw new \DomainException("Значение должно быть в пределах от 1 до 4");
        }
    }
}
