FROM mcr.microsoft.com/devcontainers/java:8-bullseye
RUN sudo apt update
RUN sudo apt install php7.4-cli -y
RUN sudo apt install php-xdebug -y
