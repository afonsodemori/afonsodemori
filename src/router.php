<?php

/**
 * This is not intended to be used in production. There are several problems in the way this "router" works.
 * Anyway, its enough during the development stage.
 */

class Route {
    private string $route;

    private function __construct(string $requestUri) {
        $this->route = $requestUri;
    }

    final public static function fromRequestUri(string $requestUri): self {
        return new static($requestUri);
    }

    final public function getRoute(): string {
        return $this->route;
    }

    final public function getFilepath(): string {
        if ($this->isAsset()) {
            return realpath("{$this->getBaseDir()}/{$this->route}");
        }

        $tryPaths = [
            "{$this->getBaseDir()}/{$this->route}",
            "{$this->getBaseDir()}/{$this->route}.html",
            "{$this->getBaseDir()}/{$this->route}/index.html",
        ];

        foreach ($tryPaths as $tryPath) {
            if (is_file($tryPath)) {
                return realpath($tryPath);
            }
        }

        throw new RuntimeException("Not found");
    }

    final public function isAsset(): bool {
        if (substr($this->route, -5) === '.html') {
            return false;
        }

        if (!is_file("{$this->getBaseDir()}/{$this->route}")) {
            return false;
        }

        return strpos($this->route, '.');
    }

    final public function getMimeType(): string {
        # There are problems if CSS files have text/plain header
        if (substr($this->route, -4) === '.css') {
            return 'text/css; charset=utf-8';
        }

        return mime_content_type($this->getFilepath());
    }

    final public function getBaseDir(): string {
        return realpath(__DIR__ . '/../dist');
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
    header('HTTP/1.0 404 Not Found');
    echo "Not found";
    exit();
}
