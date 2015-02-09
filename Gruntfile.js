module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    	pluginDir: 'wordpress/wp-content/plugins',
    	themeDir: 'wordpress/wp-content/themes',
    	wordpressConfig : {
    		db_name : "wordpress",
    		db_usr : "root",
    		db_pwd : "root"
    	},
    	copy: {
			core: {
				files: [
					{
						expand: true,
						cwd: 'bower_components/wordpress/',
						src: ['**/*'],
						dest: 'wordpress/',
						flatten: false
					}
				]
			},
			plugins:{
				files: [
					{
						expand: true,
						cwd: 'bower_components/woocommerce/',
						src: ['**/*'],
						dest: '<%=pluginDir%>/woocommerce/',
						flatten: false	
					}
				]
			},
			themes:{
				files: [
					{
						expand: true,
						cwd: 'bower_components/sparcui/',
						src: ['**/*'],
						dest: '<%=themeDir%>/sparcui/',
						flatten: false	
					}
				]
			}
		},
		replace: {
			example: {
				src: ['wordpress/wp-config-sample.php'],             // source files array (supports minimatch)
				dest: 'wordpress/wp-config.php',             // destination directory or file
				replacements: [
					{
						from: 'database_name_here',                   // string replacement
						to: '<%=wordpressConfig.db_name%>'
					},
					{
						from: 'username_here',                   // string replacement
						to: '<%=wordpressConfig.db_usr%>'
					},
					{
						from: 'password_here',                   // string replacement
						to: '<%=wordpressConfig.db_pwd%>'
					}
				]
			}
		},
		shell: {
        	wpsql: {
            	command: 'mysql --user="<%=wordpressConfig.db_usr%>" --password="<%=wordpressConfig.db_pwd%>" --execute="CREATE DATABASE IF NOT EXISTS <%=wordpressConfig.db_name%>;"'
        	}
    	},
    	//Deployment over SFTP
    	'sftp-deploy': {
			build: {
			auth: {
			 	host: '50.116.17.29', //server.com the name or the IP address of the server we are deploying to
			  	port: 22, // the port that the sftp service is running on
			  	authKey: 'key1' // a key for looking up the saved credentials
			},
			cache: 'sftpCache.json',
			src: 'wordpress', // the source location, the local folder that we are transferring to the server
			dest: '/', // the destination location, the folder on the server we are deploying to
			exclusions: [
				'wordpress/**/.DS_Store', 
				'wordpress/**/Thumbs.db', 
				'wordpress/wp-config.php',
				'wordpress/.htaccess',
				'wordpress/wp-admin/*',
				'wordpress/index.php',
				'wordpress/license.txt',
				'wordpress/readme.html',
				'wordpress/wc-logs/*',
				'wordpress/wp-activate.php',
				'wordpress/wp-blog-header.php',
				'wordpress/wp-comments-post.php',
				'wordpress/wp-config-sample.php',
				'wordpress/wp-config.php',
				'wordpress/wp-cron.php',
				'wordpress/wp-includes/*',
				'wordpress/wp-links-opml.php',
				'wordpress/wp-load.php',
				'wordpress/wp-login.php',
				'wordpress/wp-mail.php',
				'wordpress/wp-settings.php',
				'wordpress/wp-signup.php',
				'wordpress/wp-trackback.php',
				'wordpress/xmlrpc.php',
				'wordpress/wp-content/index.php',
				'wordpress/wp-content/uploads/',
				'wordpress/wp-content/blogs.dir/',
				'wordpress/wp-content/upgrade/*',
				'wordpress/wp-content/backup-db/*',
				'wordpress/wp-content/advanced-cache.php',
				'wordpress/wp-content/wp-cache-config.php',
				'wordpress/wp-content/cache/*',
				'wordpress/wp-content/cache/supercache/*',
				'wordpress/wp-content/themes/index.php',
				'wordpress/wp-content/themes/twentyfourteen/*',
				'wordpress/wp-content/themes/twentythirteen/*',
				'wordpress/wp-content/themes/twentytwelve/*',
				'wordpress/wp-content/themes/twentyeleven/*',
				'wordpress/wp-content/themes/twentyten/*'
			],
			concurrency: 4,
			progress: true
			}
		}
  	});

	// Load the Grunt plugins.
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-text-replace')
    grunt.loadNpmTasks('grunt-shell'); 
    grunt.loadNpmTasks('grunt-sftp-deploy'); 

	// Default task(s).
    grunt.registerTask('default', [

  		// default actions go here
  		'copy',
  		'replace',
  		'shell'
  	]);

  	// Deploy task(s).
    grunt.registerTask('deploy-sftp', [

  		// default actions go here
  		'sftp-deploy'
  	]);
};