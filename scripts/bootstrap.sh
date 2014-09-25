#! /usr/bin/env bash

##
# SPARCpress Bootstrap.sh
# Provision a Ubuntu, Apache, MySQL, and PHP stack for use with WordPress
##

echo "Starting WordPress bootstrap ..."

# Resources
# -------------

# WordPress Core
RES_WPCORE="https://github.com/WordPress/WordPress/archive/master.zip"

# Configuration
source /vagrant/helpers/wp-config.sh

# Plugin(s)
source /vagrant/helpers/wp-plugin.sh

# Theme(s)
source /vagrant/helpers/wp-themes.sh

# WordPress
# -------------
cd /vagrant
wget "$RES_WPCORE" && unzip master.zip && rm master.zip
cd /vagrant/WordPress-master && sudo cp wp-config-sample.php wp-config.php
sed -i 's/database_name_here/'"$WP_DB_NAME"'/g' wp-config.php && sed -i 's/username_here/'"$WP_DB_USER"'/g' wp-config.php  && sed -i 's/password_here/'"$WP_DB_PASSWORD"'/g' wp-config.php

# PACKAGE
# -------------
fetchPackage(){
	counter=1
	for i in "${RES[@]}"
	do	   
		wStat=$(wget -qO RES_$counter $i)
		if [ $(stat -c%s "RES_$counter") -eq 0 ];
		then
			rm RES_$counter
			echo "Fetch error. Please check plugin URI @" $i
		else
			unzip RES_$counter
			rm RES_$counter									
		fi
			
		# Update the counter, used to unique file name
		counter=$((counter + 1))
	done
}

# THEME
# -------------
echo "Fetch WordPress Theme(s) ... "
cd /vagrant/WordPress-master/wp-content/themes
RES=("${RES_THEME[@]}")
fetchPackage $RES

# PLUGIN(S)
# -------------
echo "Fetch WordPress plugins ... "
cd /vagrant/WordPress-master/wp-content/plugins
RES=("${RES_PLUGIN[@]}")
fetchPackage $RES

# CLEAN UP
# -------------
cd /vagrant/ 
if [  -d wordpress ]; then
	echo "WordPress directory exists !!!"
else
	echo "Creating clean WordPress directory ..."
	sudo cp -r WordPress-master/* wordpress && rm -fr WordPress-master
fi 

# MYSQL
# -------------
# Set up the database
mysql --user="$WP_DB_USER" --password="$WP_DB_PASSWORD" --execute="CREATE DATABASE IF NOT EXISTS $WP_DB_NAME;"
echo "WordPress DB provisioned ..." && echo "WordPress bootstrap complete."