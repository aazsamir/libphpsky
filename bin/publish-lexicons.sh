#!/bin/sh

cd "$(dirname "$0")/.."

cd atproto
git checkout main
git pull
cd ..
cp -r atproto/lexicons ./