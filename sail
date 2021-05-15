#!/bin/bash

export APP_SERVICE="web"

if [ "$1" == "build" ]; then
     shift 1
      ./vendor/bin/sail build --build-arg UID=$(id -u) "$@"
     exit
fi

./vendor/bin/sail "$@"
