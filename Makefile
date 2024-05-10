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
