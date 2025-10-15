#!/bin/sh

cd "$(dirname "$0")/.."

git submodule update --init atproto
cp -r atproto/lexicons ./