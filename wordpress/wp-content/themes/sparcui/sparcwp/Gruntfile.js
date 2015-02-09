module.exports = function(grunt) {
 
 // Create config
 grunt.initConfig({
 	// read in a package.json file for node
   pkg: grunt.file.readJSON('package.json'),

   // less task
   less: {
     style: {
       options: {
         compress: true
       },
       files: {
         "css/sparcwp.css": "css/sparcwp.less",
         "css/pattern-library.css": "css/pattern-library.less",
         "css/vendor.css": "css/vendor.less"
       }
     }
   },

   // watch task
   watch: {
     css: {
       files: ['css/less/**/*.less', 'css/*.less'],
       tasks: ['less:style'],
       options: {
         livereload: true
       }
     }
   }
 });

 // Load the grunt modules
 grunt.loadNpmTasks('grunt-contrib-less');
 grunt.loadNpmTasks('grunt-contrib-watch');

 // Register tasks
 grunt.registerTask('default', [ 'less', 'watch' ]);

};