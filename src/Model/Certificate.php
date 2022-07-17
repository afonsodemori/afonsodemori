<?php

namespace App\Model;

// TODO: THIS IS A MODEL, NOT A SERVICE!!! REFACTOR THE HELL OUT OF IT.
class Certificate implements \JsonSerializable
{
    private string $title;
    private \DateInterval $duration;
    private string $image;
    private string $link;

    public function __construct(string $title, string $duration, string $image, string $link)
    {
        $this->title = $title;
        $this->image = $image;
        $this->link = $link;

        [$hh, $mm, $ss] = explode(':', $duration);
        $this->duration = new \DateInterval(sprintf('PT%dH%dM%dS', $hh, $mm, $ss));
    }

    public function getId(): string
    {
        $parts = explode('/', $this->link);
        return end($parts);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDuration(): \DateInterval
    {
        return $this->duration;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    /** @noinspection PhpArrayShapeAttributeCanBeAddedInspection */
    public function jsonSerialize(): array
    {
        return [
            'title' => $this->title,
            'image' => $this->image,
            'link' => $this->link,
        ];
    }

    public function getDurationString(): string
    {
        $hours = $this->duration->d * 24 + $this->duration->h;
        $minutes = $this->duration->i;

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
