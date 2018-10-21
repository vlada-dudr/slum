var gulp                    = require('gulp');

var sass                    = require('gulp-sass');

var autoprefixer            = require('gulp-autoprefixer');

var concat                  = require('gulp-concat');

var browserSync             = require('browser-sync');


gulp.task('sass', function() {
    return gulp.src("./scss/*.scss")
        .pipe(sass())
        .pipe(autoprefixer('last 4 versions'))
        .pipe(gulp.dest("./css"))
        .pipe(browserSync.stream())

});

gulp.task('js', function() {
    return gulp.src("scripts/lib/*.js")
        .pipe(concat("scripts/main.js"))
        .pipe(gulp.dest(''))

});

gulp.task('watch', ['browser-Sync'], function() {
    gulp.watch('./scripts/lib/*.js', ['js']);
    gulp.watch("./scss/**/*.scss", ['sass']);
    gulp.watch("./*.html").on('change', browserSync.reload);
    gulp.watch("./*.php").on('change', browserSync.reload);
});

gulp.task('browser-Sync', function() {
    browserSync.init({
        injectChanges: true,
        proxy: 'localhost/slum/index.php',
        port: 88
    });
});

gulp.task('default', ['watch', 'js', 'sass', 'browser-Sync']);
