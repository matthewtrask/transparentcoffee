var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('styles', function(){
	gulp.src('app/templates/default/scss/main.scss')
		.pipe(sass({
			errLogToConsole: true
		}))
		.pipe(gulp.dest('./css/'))

});

//watch task
gulp.task('default', function(){
	gulp.watch('app/templates/default/scss/main.scss', ['styles']);
});