<?php

namespace App\Model;

class ShortcutUrl
{
    private array $shortcuts;
    private string $longUrl;

    private function __construct() {
    }

    public static function fromCsvRow(array $data): self
    {
        $shortcutUrl = new static();

        $shortcuts = [];
        foreach (explode(',', $data[0]) as $short) {
            $shortcuts[] = trim($short);
        }

        $shortcutUrl->shortcuts = $shortcuts;
        $shortcutUrl->longUrl = $data[1];

        return $shortcutUrl;
    }

    /** @return string[] */
    public function getShortcuts(): array
    {
        return $this->shortcuts;
    }

    public function getLongUrl(): string
    {
        return $this->longUrl;
    }
}
