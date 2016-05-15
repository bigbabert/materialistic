"use strict";

var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var livereload = require('gulp-livereload');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');


gulp.task('scripts:concat', function () {
	return gulp.src([
			'js/src/material/*js',
			'js/src/*js'
		])
		.pipe(concat('materialistic.js'))
		.pipe(uglify({
			output: {
				beautify: false
			}
		}))
		.pipe(gulp.dest('./js/'))
		.pipe(livereload());
});

gulp.task('scripts:	', function () {
	return gulp.src('js/material-at.js')
		.pipe(uglify())
		.pipe(gulp.dest('./js/'));
});

gulp.task('scripts:watch', function () {
	livereload.listen();
	gulp.watch('js/src/*js', [ 'scripts:concat' ]);
});

gulp.task('sass:compile', function () {
	return gulp
		.src('./sass/style.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'compressed',
			includePaths: [
				'./node_modules/compass-mixins/lib'
			]
		}).on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: [ 'last 2 version', 'ie 9' ]
		}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('./'))
		.pipe(livereload());
});


gulp.task('sass:watch', function () {
	livereload.listen();
	gulp.watch('./sass/**/*.scss', [ 'sass:compile' ]);
});


gulp.task('default', [ 'sass:compile', 'scripts:concat', 'sass:watch', 'scripts:watch' ]);
gulp.task('compile-only', [ 'sass:compile', 'scripts:concat' ]);
