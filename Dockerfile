FROM php:8.2-fpm-alpine

RUN apk add --no-cache nginx wget nodejs-current npm

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /app
COPY . /app
#COPY ./src /app

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"
RUN cd /app/system && \
    /usr/local/bin/composer install --no-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql


RUN cd /app/system npm install

RUN chown -R www-data: /app

CMD sh /app/docker/startup.sh
