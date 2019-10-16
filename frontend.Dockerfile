# Stage 0, build-stage, based on Node.js, to build and compile the frontend
FROM node:lts-alpine as build-stage

WORKDIR /var/www/frontend


# install and cache app dependencies
COPY sources/frontend/package.json /var/www/frontend/package.json
RUN npm install
RUN npm install @vue/cli@3.7.0 -g



