FROM php:fpm-alpine3.12

WORKDIR /var/www/dartVaders

COPY ./bin/composer.phar /usr/bin/composer

RUN apk add nginx tzdata npm git mysql-client bash\
  && cp /usr/share/zoneinfo/Europe/Berlin /etc/localtime \
  && echo "Europe/Berlin" > /etc/timezone \
  && chmod u+x /usr/bin/composer


RUN set -xe \
    && apk add pcre-dev ${PHPIZE_DEPS} \
    && pecl install redis \
    && pecl install pcov \
    && docker-php-ext-enable redis \
    && docker-php-ext-enable pcov \
    && apk del pcre-dev ${PHPIZE_DEPS} \
    && rm -rf /tmp/pear \
    && apk --no-cache update \
    && apk --no-cache upgrade \
    && apk add --no-cache --virtual .persistent-deps freetds unixodbc \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS unixodbc-dev freetds-dev \
    && docker-php-source extract \
    && docker-php-ext-install pdo_dblib pdo pdo_mysql \
    && apk add zlib-dev libpng-dev freetype-dev libjpeg-turbo-dev \
    && docker-php-ext-configure gd --with-libdir=/usr/include/ --with-jpeg  --with-freetype \
    && docker-php-ext-install gd \
    && docker-php-ext-install exif \
    && apk del .build-deps


##setup nginx
RUN mkdir /etc/nginx/sites-enabled
COPY ./conf/nginx.conf /etc/nginx/conf.d/default.conf
COPY ./conf/nginx_base.conf /etc/nginx/nginx.conf
RUN chown -R nginx:www-data /var/lib/nginx
RUN chmod -R 0770 /var/lib/nginx/tmp

ARG UID
RUN addgroup -S sail && adduser -S sail -G sail -u $UID
RUN echo 'export PS1="\u@\w:>"' > /home/sail/.bashrc


COPY ./entrypoints/rundev.sh /rundev.sh
ENTRYPOINT ["/rundev.sh"]

RUN apk add netcat-openbsd bc curl wget git bash openssl libressl
RUN mkdir /acme && cd /acme && git clone https://github.com/Neilpang/acme.sh.git .
RUN mkdir -vp /var/www/dartVaders/.well-known/acme-challenge/ \
 && chown -R nginx:nginx /var/www/dartVaders/.well-known/acme-challenge/ \
 && chmod -R 0555 /var/www/dartVaders/.well-known/acme-challenge/ \
 && mkdir -p /etc/nginx/ssl/letsencrypt/dart-vaders.eu \
 && cd /etc/nginx/ssl/letsencrypt/dart-vaders.eu \
 && openssl dhparam -dsaparam -out dhparams.pem 4096 \
 && openssl req -x509 -nodes -subj '/C=DE/ST=MD/L=MD/O=DV/CN=dart-vaders.eu' -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/letsencrypt/dart-vaders.eu/dart-vaders.eu.key -out /etc/nginx/ssl/letsencrypt/dart-vaders.eu/dart-vaders.eu.cer

COPY ./cron/cron.cnf /etc/crontab/nginx
COPY ./cron/main.cnf /etc/crontab/root


