<?php

namespace App\Model;

class Url
{
    public function __construct(
        readonly private string $url,
    ) {
    }

    public function __toString(): string
    {
        return sprintf(
            '%s://%s%s',
            $this->getScheme(),
            $this->getHost(),
            $this->getFullPath()
        );
    }

    public function getScheme(): string
    {
        return parse_url($this->url, PHP_URL_SCHEME);
    }

    public function getHost(bool $removeWww = false): string
    {
        $host = parse_url($this->url, PHP_URL_HOST);

        if (
            $removeWww
            && $this->startsWithWww()
        ) {
            return substr($host, 4);
        }

        return $host;
    }

    public function getFullPath(): string
    {
        return explode($this->getHost(), $this->url, 2)[1] ?? '/';
    }

    public function startsWithWww(): bool
    {
        return str_starts_with($this->getHost(), 'www.');
    }
}
