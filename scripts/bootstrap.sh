#! /usr/bin/env bash

##
# SPARCpress bootstrap.sh
##

# Node
apt-get -y install npm
ln -s /usr/bin/nodejs /usr/bin/node

# Bower
npm install -g bower

# Grunt
npm install -g grunt-cli
npm i -g grunt-init