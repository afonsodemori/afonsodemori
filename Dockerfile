FROM node:20-bookworm-slim
RUN apt update \
    && apt install -y --no-install-recommends \
    poppler-utils \
    webp \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && rm -rf /tmp/*
WORKDIR /app
