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
    	}	
  });

	// Load the Grunt plugins.
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-text-replace')
    grunt.loadNpmTasks('grunt-shell');
    
	// Default task(s).
    grunt.registerTask('default', [

  	// default actions go here
  	'copy',
  	'replace',
  	'shell'
  	]);

};