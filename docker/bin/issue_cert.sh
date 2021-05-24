#!/bin/bash

/acme/acme.sh --issue -d dart-vaders.eu -w /var/www/dartVaders/public \
&& cp /root/.acme.sh/dart-vaders.eu/fullchain.cer /etc/nginx/ssl/letsencrypt/dart-vaders.eu/dart-vaders.eu.cer \
&& cp /root/.acme.sh/dart-vaders.eu/dart-vaders.eu.key /etc/nginx/ssl/letsencrypt/dart-vaders.eu/dart-vaders.eu.key \
&& nginx -s reload
