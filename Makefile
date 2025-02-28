help:
	echo "TODO"

clean:
	@rm -rf \
		bin/*.js public/_redirects public/docs/cv-*afonso_de_mori.* \
		dist .output/ .nuxt/ .wrangler/ \
		node_modules

install:
	npm ci

dev:
	npx nuxt dev --host 0.0.0.0

generate: install
	npx nuxt generate

preview: generate
	npx wrangler pages dev dist/ --ip 0.0.0.0 --compatibility-date=2025-03-08

shortcuts:
	npm run build:shortcuts

cv-import:
	npm run build:cv-import

cv-html:
	npm run build:cv-html

build: clean install shortcuts cv-import cv-html
