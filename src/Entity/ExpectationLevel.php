<?php

namespace App\Entity;

use App\Repository\ExpectationLevelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpectationLevelRepository::class)]
class ExpectationLevel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $score;

    #[ORM\OneToOne(targetEntity: Competence::class, inversedBy: 'expectationLevel')]
    private $competence;

    #[ORM\OneToMany(targetEntity: EmployeePosition::class, mappedBy: 'expectationLevel')]
    private $employeePositions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score): void
    {
        self::assertScoreIsCorrect($score);

        $this->score = $score;
    }

    public function getCompetence()
    {
        return $this->competence;
    }

    public function setCompetence($competence): void
    {
        $this->competence = $competence;
    }

    private static function assertScoreIsCorrect(int $score): void
    {
        if ($score < 0 || $score > 4) {
            throw new \DomainException("Значение должно быть в пределах от 1 до 4");
        }
    }
}
