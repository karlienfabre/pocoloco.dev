module.exports = function (grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON("package.json"),
		
		sass: {
			dist: {
				options: {
					banner	 : "/* Distribution Build - <%= grunt.template.today() %> */",
					style		 : "compressed",
					debugInfo : true,
					trace		 : true,
					require	 : "sass-globbing"
				},
				files: {
					"css/app.css" : "sass/app.scss"
				}
			}
		},

		jsic: {
			dev: {
				files: {
					"js/temp/app.js" : "js/app.js",
				}
			}
		},

		uglify: {
			dev: { // Development Builds
				options: {
					banner				: "/* Development Build - <%= grunt.template.today() %> */",
					preserveComments	: true,
					mangle				: false
				},
				files: {
					"js/builds/min.app.js"		: "js/temp/app.js",
					"js/builds/min.plugins.js"	: "js/vendor/*.js",
				}
			},
			dist: { // Distribution Builds
				options: {
					banner : "/* Distribution Build - <%= grunt.template.today() %> */",
					compress: {
						drop_console: true
					},
					mangle: true
				},
				files: {
					"js/builds/mangle.app.js"		: "js/temp/app.js",
					"js/builds/mangle.plugins.js"	: "js/vendor/*.js",
				}
			}
		},
		
		watch: {
			sass: {
				files	: [
					"sass/*",
					"sass/imports/*",
					"sass/vendor/*",
					"sass/models/*",
					"sass/pages/*"
				],
				tasks: ["sass"]
			},
			scripts: {
				files	: [
					"js/*.js",
					"js/imports/*.js"
				],
				tasks: ["jsic", "uglify"]
			}
		}
	});

	// Load plugins
	grunt.loadNpmTasks("grunt-contrib-watch");
	grunt.loadNpmTasks("grunt-contrib-uglify");
	grunt.loadNpmTasks("grunt-contrib-sass");
	grunt.loadNpmTasks("grunt-contrib-jsic");

	// Register tasks
	grunt.registerTask("default", ["watch"]);

}