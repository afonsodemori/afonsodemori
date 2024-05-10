#!/bin/bash

npm run serve 2>/dev/null || npm ci && npm run serve
