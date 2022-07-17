<?php

namespace App\Model\Page;

abstract class AbstractPage
{
    public function __construct(
        readonly public string $title,
        readonly public string $description,
        readonly public string $url,
        readonly public string $iconPath,
    ) {
    }
}
