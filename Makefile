help:
	@echo "TODO:"

docker-login:
	@docker login $(REGISTRY)

docker-image: docker-login
	@make .builder-create
	@docker buildx build --platform linux/amd64,linux/arm64 -t afonsodemori/afonso-dev:latest -f Dockerfile.build . --push

.builder-create:
	@docker buildx use multi_arch 2>/dev/null || docker buildx create --name multi_arch --use

.builder-delete:
	@docker builder rm multi_arch
