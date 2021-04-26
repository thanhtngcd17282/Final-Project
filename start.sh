#!/usr/bin/env bash

set +e

while true; do
	php artisan convert:video
	sleep 60
done
