#!/bin/bash

cp -RTv resources dist

if [ -z "$CACHE_HASH" ]; then
    echo '[WARNING] CACHE_HASH environment variable is not set.'
    CACHE_HASH='CACHE_HASH'
fi

sed -i "s/{{hash}}/$CACHE_HASH/g" dist/service-worker.js
