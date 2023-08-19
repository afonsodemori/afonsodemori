<?php

/**
 * This is not intended to be used in production. There are several problems in the way this "router" works.
 * Anyway, its enough during the development stage.
 */

final class Route
{
    public const BASE_DIR = '/workspaces/afonsodemori/dist';

    private string $route;

    private function __construct(string $requestUri)
    {
        $this->route = $requestUri;
    }

    final public static function fromRequestUri(string $requestUri): self
    {
        return new static($requestUri);
    }

    final public function getRoute(): string
    {
        return $this->route;
    }

    final public function getFilepath(): string
    {
        if ($this->isAsset()) {
            return realpath(self::BASE_DIR . "/{$this->route}");
        }

        $tryPaths = [
            self::BASE_DIR . "/{$this->route}",
            self::BASE_DIR . "/{$this->route}.html",
            self::BASE_DIR . "/{$this->route}/index.html",
        ];

        foreach ($tryPaths as $tryPath) {
            if (is_file($tryPath)) {
                return realpath($tryPath);
            }
        }

        throw new RuntimeException('Not Found', 404);
    }

    final public function isAsset(): bool
    {
        if (substr($this->route, -5) === '.html') {
            return false;
        }

        if (!is_file(self::BASE_DIR . "/{$this->route}")) {
            return false;
        }

        return strpos($this->route, '.');
    }

    final public function getRedirectionIfExists(): ?array
    {
        $redirect = null;

        if (!($redirectsResource = fopen(self::BASE_DIR . '/_redirects', 'r'))) {
            throw new RuntimeException('_redirects file not found', 404);
        }

        while (($line = fgets($redirectsResource)) !== false) {
            list($shortcut, $longUrl, $httpCode) = explode(' ', $line);

            if ($this->route === $shortcut) {
                $redirect = compact('shortcut', 'longUrl', 'httpCode');
                break;
            }
        }

        fclose($redirectsResource);

        return $redirect;
    }

    final public function getMimeType(): string
    {
        // There are problems if CSS files have text/plain header
        if (substr($this->route, -4) === '.css') {
            return 'text/css; charset=utf-8';
        }

        return mime_content_type($this->getFilepath());
    }
}

$route = Route::fromRequestUri($_SERVER["SCRIPT_NAME"]);

if ($route->isAsset()) {
    header('Cache-Control: max-age=86400');
    header("Content-type: {$route->getMimeType()}");
    require_once $route->getFilepath();
    exit();
}

try {
    require_once $route->getFilepath();
} catch (Exception $e) {
    $datetime = (new DateTime())->format(DateTimeInterface::RSS);

    try {
        if (!is_null($redir = $route->getRedirectionIfExists())) {
            echo <<<END
                <title>Redirection {$redir['shortcut']}</title>
                <h1>Redirection</h1>
                <ul>
                    <li><strong>Shortcut:</strong> {$redir['shortcut']}</li>
                    <li><strong>Long URL:</strong> <a href="{$redir['longUrl']}">{$redir['longUrl']}</a></li>
                    <li><strong>HTTP Code:</strong> {$redir['httpCode']}</li>
                </ul>
                <address>$datetime</address>
            END;
            exit();
        }
    } catch (Exception $e) {
        // Will be handled above
    }

    header('HTTP/1.0 404 Not Found');
    echo <<<END
        <title>{$e->getMessage()}</title>
        <h1>{$e->getMessage()}</h1>
        <address>$datetime</address>
    END;
    exit();
}
