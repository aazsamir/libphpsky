#!/bin/sh

DIR="/tmp/symfony-cache"

if [ -d "$DIR" ]; then
    rm -rf "$DIR"
    echo "Cache cleared."
else
    echo "Cache directory does not exist."
fi