# Stage 0, build-stage, based on Node.js, to build and compile the frontend
FROM node:lts-alpine as build-stage

WORKDIR /var/www/frontend


# install and cache app dependencies

RUN npm install @vue/cli -g



