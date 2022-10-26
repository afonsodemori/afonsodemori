<?php

namespace App\Model;

// TODO: Using composer is failing in GitHub. Don't know why...
require_once __DIR__ . '/Certificate.php';

// TODO: THIS IS A MODEL, NOT A SERVICE!!! REFACTOR THE HELL OUT OF IT.
class Course implements \JsonSerializable
{
    public string $id;
    public string $name;
    public string $about = "";
    /** @var string[] */
    public array $topics = [];
    /** @var Certificate[] $certificates */
    public array $certificates = [];

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
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
            'about' => $this->about,
            'certificates' => $this->certificates,
            'topics' => $this->topics,
        ];
    }
}
