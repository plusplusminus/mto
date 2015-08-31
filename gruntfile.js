module.exports = function(grunt) {
  grunt.initConfig({
    less: {
      development: {
        options: {
          compress: true,
          yuicompress: true,
          optimization: 2
        },
        files: {
          // target.css file: source.less file
          "wp-content/themes/mto/library/css/style.css": "wp-content/themes/mto/library/less/style.less",
        }
      }
    },
    watch: {
      styles: {
        files: ['wp-content/themes/mto/library/less/*.less',"wp-content/themes/mto/library/less/**/*.less",], // which files to watch
        tasks: ['less'],
        options: {
          nospawn: true,
          livereload:true
        }
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-ftp-deploy');


  grunt.registerTask('default', ['watch']);
};