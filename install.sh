#!/bin/bash

echo "Creating PHP directory..."
mkdir -p /var/www/php

if [[ ! -e /var/www/database.ini ]]; then
    echo "Installing database.ini..."
    install -D database.ini /var/www -m 644
fi

echo "Installing webpages..."
install -D html/*.php /var/www/html -m 644

echo "Installing PHP scripts..."
install -D php/*.php /var/www/php -m 644
