module.exports = function(grunt){
    require('jit-grunt')(grunt);

    var conf = {};

    conf['less'] = {
        development : {
            options: {
                compress: true,
                yuicompress: true,
                optimiation: 2
            },
            files: {
                'assets/css/bootstrap.css': 'assets/less/bootstrap/bootstrap.less'
            }
        }
    };

    conf['watch'] = {
        styles : {
            files: ['assets/**/*.less'],
            tasks: ['less'],
            options: {
                nospawn: true
            }
        }
    }

    grunt.initConfig(conf);
    grunt.registerTask('default', ['less', 'watch']);

}
