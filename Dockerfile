FROM ubuntu:latest
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get upgrade -y
RUN apt-get install redis-tools -y
RUN apt-get install vim -y
RUN apt-get install git -y
RUN apt-get install wget -y
RUN wget https://raw.githubusercontent.com/Pushigoh/vimrc/master/.vimrc
RUN apt-get update && apt-get upgrade -y
RUN apt-get install man -y
RUN apt-get install curl -y
RUN apt-get install composer -y
RUN apt-get install php-curl -y

RUN apt-get install tzdata -y
RUN apt-get install php -y
RUN apt-get install apache2 -y
RUN composer require easypost/easypost-php
RUN echo "PS1='root@drone: '" >> ~/.bashrc
RUN mkdir /storage
