'use strict';
var path = require('path');
var lrSnippet = require('grunt-contrib-livereload/lib/utils').livereloadSnippet;

var folderMount = function folderMount(connect, point) {
  return connect.static(path.resolve(point));
};


module.exports = function(grunt) {

	grunt.initConfig({
		sass: {
      dist: {
      options: {                       // Target options
        noCache: true,
      },                         
        files: {                        
          'wp-content/themes/krunch/css/style.css': 'wp-content/themes/krunch/css/style.scss' 
        },
        sourcemap: true
      }
		},
    imagemin: {                          // Task
      dynamic: {                         // Another target
        files: [{
          expand: true,                  // Enable dynamic expansion
          cwd: 'wp-content/themes/krunch/img/',                   // Src matches are relative to this path
          src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
          dest: 'wp-content/themes/krunch/img/' // Destination path prefix
        }]
      }
    },
    cssmin: {
      target: {
        files: {
        'wp-content/themes/krunch/css/style.min.css': ['wp-content/themes/krunch/css/style.css']
        }
      }
    },
    uglify: {
      my_target: {
        files: {
          'wp-content/themes/krunch/js/krunch.min.js': ['wp-content/themes/krunch/js/krunch.js']
        }
      }
    },
		watch: {
    	 	css: {
      			files: ['wp-content/themes/krunch/css/*.scss','wp-content/themes/krunch/css/includes/*.scss'],
      			tasks: ['sass', 'cssmin'],
      			options: {
       				 // Start a live reload server on the default port 35729
        			livereload: 8080,
      			},
    		},
        scripts: {
          files: ['wp-content/themes/krunch/js/*.js'],
          options: {
               // Start a live reload server on the default port 35729
              livereload: 8080,
            },
        },
    		html: {
  				files: ['wp-content/themes/krunch/*.php','wp-content/themes/krunch/blocks/*.php'],
          tasks: ['sass', 'cssmin', 'uglify'],
  				options: {
               // Start a live reload server on the default port 35729
            livereload: 8080,
          },
  			}
    		
		 }
  	});
    grunt.loadNpmTasks('grunt-contrib-livereload');
  	grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
  	grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');


    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['imagemin', 'cssmin', 'uglify']);
  
};