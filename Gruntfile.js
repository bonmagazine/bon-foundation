module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // // grunt-sass options
    // sass: {
    //   options: {
    //     includePaths: ['bower_components/foundation/scss']
    //   },
    //   dist: {
    //     options: {
    //       outputStyle: 'compressed',
    //       sourceComments: 'map'
    //     },
    //     files: {
    //       'css/app.css': 'scss/app.scss'
    //     }        
    //   }
    // },

    // grunt-contrib-sass options
    sass: {
      dev: {
        options: {
          style: 'expanded',
          sourcemap: 'auto',
          loadPath: ['bower_components/foundation/scss']
        },
        files: {
          'css/app.css': 'scss/app.scss'
        }        
      },
      prod: {
        options: {
          style: 'compressed',
          sourcemap: 'none',
          loadPath: ['bower_components/foundation/scss']
        },
        files: {
          'css/app.css': 'scss/app.scss'
        }        
      }
    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },

      php: {
        files: ['**/*.php'],
        options: {
          livereload: true
        }
      },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass'],
        options: {
          livereload: true
        }
      }
    }
  });

  // grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('build', ['sass:prod']);
  grunt.registerTask('default', ['sass:dev','watch']);
}