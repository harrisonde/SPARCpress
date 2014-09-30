#! /usr/bin/env bash

##
# SPARCpress Bootstrap.sh
# Provision a box for use with WordPress
##

# Bower
bower install --config.interactive=false

# Grunt
cd /vagrant && npm install grunt --save-dev && npm install && grunt