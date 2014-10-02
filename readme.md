# SPARCpress
Va​grant and WordPress Pro​visioning Bash Scripts
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
[Vagrant](https://www.vagrantup.com/downloads.html) and [Virtualbox](https://www.virtualbox.org/wiki/Downloads) are required ahead of the automagic install!

SPARCpress ships with a loose WordPress configuration. If you plan to use SPARCpress outside a development environment you must tighten the configuration. The configuration settings are found in gruntfile.js

Helpful Vagrant Commands
	1. Start a Vagrant box
		1. vagrant up
	2. Stop a Vagrant box
		1. vagrant halt
	2. Remove a Vagrant box
		1.Vagrant destroy
[More Vagrant goodness...](https://docs.vagrantup.com/v2/cli/index.html)
