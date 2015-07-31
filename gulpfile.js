var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');

//Sass Task
gulp.task('styles', function(){
	gulp.src('public/app/templates/default/scss/*.scss')
		.pipe(sass({
			errLogToConsole: true
		}))
		.pipe(gulp.dest('public/app/templates/default/css/'))

});

//watch task
gulp.task('default', function(){
	gulp.watch('public/app/templates/default/scss/*.scss', ['styles']);
});

//Minify Task
gulp.task('minify-css', function(){
	return gulp.src('styles/*.css')
		.pipe(minifyCss({compatibilty: 'ie8'}))
		.pipe(gulp.dest('dist'));
})
