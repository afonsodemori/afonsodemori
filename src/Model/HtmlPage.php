<?php

namespace App\Model;

class HtmlPage
{
    public const LANGUAGES = ['en', 'es', 'pt'];

    private string $id;
    private string $path;
    private string $lang;

    public function __construct(string $id, string $path = null)
    {
        $this->id = $id;
        $this->path = $path ?? str_replace('.', '/', $id);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTranslations(): string
    {
        return sprintf(
            '%s/translations/%s/%s.php',
            dirname(__DIR__, 2),
            $this->lang,
            $this->id
        );
    }

    public function getTemplate(): string
    {
        return sprintf(
            '%s/templates/%s.php',
            dirname(__DIR__, 2),
            $this->id
        );
    }

    public function getOutputPath(): string
    {
        return str_replace(
            '//',
            '/',
            sprintf(
                '%s/dist/%s/%s.html',
                dirname(__DIR__, 2),
                trim($this->path, '/'),
                $this->lang
            )
        );
    }

    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }
}
