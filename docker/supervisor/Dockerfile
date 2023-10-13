FROM php:8.1-fpm

ARG APP_ROOT
ARG COMMAND
ARG OPTIONS

ENV APP_ROOT=${APP_ROOT}
ENV COMMAND=${COMMAND}
ENV OPTIONS=${OPTIONS}

RUN apt-get update && apt-get install -y --no-install-recommends supervisor

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /us/bin/
RUN docker-php-ext-install pcntl

RUN mkdir -p "/etc/supervisor/logs"
COPY supervisord.conf /etc/supervisord.conf

ENTRYPOINT [ "/usr/bin/supervisord",  "--nodemon", "--configuration", "/etc/supervisord.conf"]