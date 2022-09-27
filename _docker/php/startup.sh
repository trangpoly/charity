#!/bin/bash

#pm2 start /var/www/html/src/queue.example.yml

#cron -f &
docker-php-entrypoint php-fpm
