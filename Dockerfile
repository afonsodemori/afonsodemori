FROM mcr.microsoft.com/devcontainers/base:ubuntu
RUN sudo apt update
RUN sudo apt install software-properties-common -y
RUN sudo add-apt-repository ppa:ondrej/php -y
RUN sudo apt update
RUN sudo apt install php7.4-cli -y
RUN sudo update-alternatives --set php /usr/bin/php7.4 --quiet
RUN sudo apt install php-xdebug -y
RUN sudo apt install openjdk-8-jdk -y
