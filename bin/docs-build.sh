#!/bin/sh
cd $(dirname $0)/..
docker run --rm -it -p 3333:8000 -v ${PWD}/docs:/docs squidfunk/mkdocs-material build