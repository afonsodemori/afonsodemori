help:
	@echo "TODO:"

up:
	@docker compose -f compose.dev.yml up -d

down:
	@docker compose -f compose.dev.yml kill --remove-orphans
	@docker compose -f compose.dev.yml rm -f

docker/login:
	@docker login $(REGISTRY)

docker/image: docker/login
	@make .builder-create
	@docker buildx build --platform linux/amd64,linux/arm64 -t afonsodemori/afonso-dev:latest -f Dockerfile . --push

.docker/builder-create:
	@docker buildx use multi_arch 2>/dev/null || docker buildx create --name multi_arch --use

# For reference. Not used.
.docker/builder-delete:
	@docker builder rm multi_arch

clean:
# @rm -rf node_modules
	@rm -rf dist
	@rm -rf build

ci:
	@npm ci

assets:
	@npm run install-assets

resumes:
	@npm run import-resumes

pages:
	@npm run generate-pages

shortcuts:
	@npm run generate-shortcuts

replace:
	@npm run replace-cv-text

.PHONY: build
build:
	@which pdftoppm > /dev/null || (echo "pdftoppm not found. Try running inside the dev container." && exit 1)
	@make clean ci resumes pages shortcuts
	@./bin/convert-cv.sh

serve:
	@npm run serve
