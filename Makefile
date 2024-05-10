help:
	@echo "TODO:"

up:
	@docker-compose -f compose.dev.yml up -d

down:
	@docker-compose -f compose.dev.yml down --remove-orphans

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
	@cp -R resources dist

build: clean ci resumes pages shortcuts
	@./bin/convert-cv.sh

ci:
	@npm ci

resumes:
	@npm run import-resumes

pages:
	@npm run generate-pages

shortcuts:
	@npm run generate-shortcuts

replace:
	@npm run replace-cv-text

serve:
	@npm run serve
