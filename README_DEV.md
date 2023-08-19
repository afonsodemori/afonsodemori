# afonso.dev

This project is a mess. Basically a set of experiments in PHP, Java, CSS, Docker, etc.

There is no pattern for almost anything (translations, HTML generation, etc.).

## Building and hosting

Hosted in Cloudflare Pages.

Cloudflare Pages supports PHP 7.4 and Java 8 as the most recent versions of those languages, so there is a Dockerfile to generate the proper environment.

The build process at Cloudflare just runs `bin/build`.

* https://developers.cloudflare.com/pages/platform/language-support-and-tools/
