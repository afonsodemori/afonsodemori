<?php

namespace App\Model;

// TODO: THIS IS A MODEL, NOT A SERVICE!!! REFACTOR THE HELL OUT OF IT.
class Certificate implements \JsonSerializable
{
    public string $id;
    public string $title;
    private \DateInterval $duration;
    public string $durationString;
    /** @var string[] */
    public array $images;
    public string $link;

    public function __construct(string $title, string $duration, array $images, string $link)
    {
        $this->title = $title;
        $this->images = $images;
        $this->link = $link;

        [$hh, $mm, $ss] = explode(':', $duration);
        $this->duration = new \DateInterval(sprintf('PT%dH%dM%dS', $hh, $mm, $ss));

        $this->fillId();
        $this->fillDurationString();
    }

    public function fillId(): void
    {
        $parts = explode('/', $this->link);
        $this->id = end($parts);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDuration(): \DateInterval
    {
        return $this->duration;
    }

    /** @return string[] */
    public function getImages(): array
    {
        return $this->images;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    /** @noinspection PhpArrayShapeAttributeCanBeAddedInspection */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'images' => $this->images,
            'link' => $this->link,
            'durationString' => $this->durationString,
        ];
    }

    private function fillDurationString(): void
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

        $this->durationString = implode(' ', $duration);
    }
}
