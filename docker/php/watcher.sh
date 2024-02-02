#!/bin/sh

while true; do
  inotifywait -r -e modify,create,delete,move /watch
  cp -f /watch/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
  cp -f /watch/opcache-default.blacklist /usr/local/etc/php/conf.d/opcache-default.blacklist
done
