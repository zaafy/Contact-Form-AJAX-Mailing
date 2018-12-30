/*-------------------------------------
	Register NPM Modules
-------------------------------------*/
const gulp = require('gulp');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');


/*-------------------------------------
	Compile and process CSS
-------------------------------------*/
gulp.task('sass', function () {
	// take files with extension .scss from /scss folder
	return gulp.src('scss/*.scss')
		// use scss module on it
		.pipe(sourcemaps.init())
		.pipe(sass({

        	}).on('error', sass.logError)
		)
		.pipe(sourcemaps.write('.'))
		// return into css folder
		.pipe(gulp.dest('css/'))
});

gulp.task('minify-css', () => {
	return gulp.src('css/*.css')
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(gulp.dest('css/'));
});

/*-------------------------------------
	watch
-------------------------------------*/
// on specific file change execute task
gulp.task('watch', function() {
	// watch .scss files - on file-change execute css task (compile scss)
	gulp.watch('scss/**/*.scss', ['sass', 'minify-css']);
});

/*-------------------------------------
	default tasks
-------------------------------------*/
// when calling
// > gulp
// execute css & watch tasks.
gulp.task('default', ['sass', 'watch']);
