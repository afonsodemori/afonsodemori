<?php

namespace App\Model\Page;

abstract class AbstractPage
{
    public string $title;
    public string $description;
    public string $url;
    public string $iconPath;

    public function __construct(
        string $title,
        string $description,
        string $url,
        string $iconPath
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->iconPath = $iconPath;
    }
}
