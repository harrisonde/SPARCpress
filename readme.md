# SPARCpress
A mo'better workflow

## Automagic Install
	1. Open Terminal and cd the SPARCpress directory
	2. Start the virtual machine 
		1. Vagrant up
	3. SSH 
		1. Vagrant ssh
	4. Deploy
		1. cd /vagrant && bash helpers/deploy.sh
	5. Open your favorite flavor of web browser and navigate to 10.0.0.10
	6. Complete the WordPress famous 5 minute install		

# Configurations
## Copy
[Grunt-copy](https://www.npmjs.com/package/grunt-copy) moves dependencies from bower_components to the proper WordPress directory e.g., core, pluings, and themes. If you plan to add or modify Bower dependencies, make sure to update the copy task.

## WordPress
SPARCpress ships with a loose WordPress configuration. If you plan to use SPARCpress outside a development environment you must tighten the configuration. The configuration settings are found in gruntfile.

## Pushing
### SFTP
SPARCpress uses a [sftp-deploy](https://www.npmjs.com/package/grunt-sftp-deploy) task for code deployment over the sftp protocol. Before deploy you need to update the sftp-deploy configuration in your grunt file. 

To deploy:
	1. Open Terminal and cd the SPARCpress directory
	2. $ vagrant ssh
	3. $ grunt sftp-deploy

Usernames, passwords, and private key references are stored as a JSON object either in a file named .ftppass. Please update this file with your username and password. 

By design the following default WordPress Theme(s) are part of the exclusions array: 
	* wordpress/wp-content/themes/twentyfourteen/*
	* wordpress/wp-content/themes/twentythirteen/*
	* wordpress/wp-content/themes/twentytwelve/*
	* wordpress/wp-content/themes/twentyeleven/*
	* wordpress/wp-content/themes/twentyten/*

### FTP
TBD

## Vagrant	
SPARCpress utilizes Vagrant to manage dependencies. Make sure you have [Vagrant](https://www.vagrantup.com/downloads.html) and [Virtualbox](https://www.virtualbox.org/wiki/Downloads) installed on your machine.

###Helpful Vagrant Commands
	1. Start a Vagrant box
		1. vagrant up
	2. Stop a Vagrant box
		1. vagrant halt
	2. Remove a Vagrant box
		1.Vagrant destroy
[More Vagrant goodness...](https://docs.vagrantup.com/v2/cli/index.html)
