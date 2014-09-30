#! /usr/bin/env bash

##
# SPARCpress deploy.sh
##

# Bower
bower install --config.interactive=false

# Grunt
cd /vagrant && npm install grunt --save-dev && npm install && grunt