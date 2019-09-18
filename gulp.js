const gulp = require('gulp')
const gulp_bootstrap_email = require('gulp-bootstrap-email')

gulp.task('email', () => {
  return gulp.src('./resources/views/templates/subscription/file.html').
    pipe(gulp_bootstrap_email()).pipe(gulp.dest('./resources/views/templates/subscription/template-subscription-html.blade.php'))
})