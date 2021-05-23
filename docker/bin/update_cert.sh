#!/bin/bash

/acme/acme.sh --renew -d dart-vaders.eu \
--keypath /etc/nginx/ssl/letsencrypt/dart-vaders.eu/dart-vaders.eu.key \
--fullchainpath /etc/nginx/ssl/letsencrypt/dart-vaders.eu/dart-vaders.eu.cer \
--reloadcmd 'nginx -s reload'
