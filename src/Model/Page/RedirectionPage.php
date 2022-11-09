<?php

namespace App\Model\Page;

// TODO: Using composer is failing in GitHub. Don't know why...
require __DIR__ . '/AbstractPage.php';

class RedirectionPage extends AbstractPage
{
    public string $printableUrl;

    public function __construct(
        string $title,
        string $description,
        string $url,
        string $iconPath,
        string $printableUrl
    ) {
        $this->printableUrl = $printableUrl;
        parent::__construct(
            $title,
            $description,
            $url,
            $iconPath,
        );
    }
}
