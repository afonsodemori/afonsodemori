<?php

namespace App\Model;

// TODO: Using composer is failing in GitHub. Don't know why...
require_once __DIR__ . '/Certificate.php';

// TODO: THIS IS A MODEL, NOT A SERVICE!!! REFACTOR THE HELL OUT OF IT.
class Course implements \JsonSerializable
{
    private string $id;
    private string $name;
    private string $about = "";
    /** @var string[]  */
    private array $topics = [];
    /** @var Certificate[] $certificates */
    private array $certificates = [];

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function setAbout(string $about): self
    {
        $this->about = $about;
        return $this;
    }

    public function getAbout(): string
    {
        return $this->about;
    }

    public function addTopic(string $topic): self
    {
        $this->topics[] = $topic;
        return $this;
    }

    /** @return string[] */
    public function getTopics(): array
    {
        return $this->topics;
    }

    public function addCertificate(Certificate $certificate): self
    {
        $this->certificates[] = $certificate;
        return $this;
    }

    /** @noinspection PhpArrayShapeAttributeCanBeAddedInspection */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'certificates' => $this->certificates,
        ];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCertificates(): ?array
    {
        return $this->certificates;
    }

    public function getTotalDurationString(): string
    {
        $start = (new \DateTime())->setTime(0, 0, 0);
        $duration = (new \DateTime())->setTime(0, 0, 0);

        foreach ($this->certificates as $certificate) {
            $duration->add($certificate->getDuration());
        }

        $duration = $start->diff($duration);

        $hours = $duration->d * 24 + $duration->h;
        $minutes = $duration->i;

        $duration = [];

        if ($hours > 0) {
            $duration[] = "{$hours}h";
        }

        if ($minutes > 0) {
            $duration[] = "{$minutes}m";
        }

        return implode(' ', $duration);
    }
}
