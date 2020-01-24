var gulp = require('gulp');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');

gulp.task('compress', function() {
	return gulp.src('js/jquery.responsive-dom.js')
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(rename({
			extname: '.min.js'
		}))
		.pipe(sourcemaps.write('./'))

		.pipe(gulp.dest('js'));
});
