var gulp = require('gulp'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    autoprefixer = require('gulp-autoprefixer'),
    rtlcss = require('gulp-rtlcss'),
    pckg = require('./package.json');
maps = require('gulp-sourcemaps');

gulp.task('styles', function () {
    return gulp.src('resources/assets/scss/bundle.scss', { base: '.' })
        .pipe(maps.init())
        .pipe(sass({
            precision: 8,
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: pckg.browserslist,
            cascade: false
        }))
        .pipe(rename('dashboard.css'))
        .pipe(maps.write())
        .pipe(gulp.dest('public/css/'))

        .pipe(rtlcss())
        .pipe(rename('dashboard.rtl.css'))
        .pipe(gulp.dest('public/css/'));
});

gulp.task('styles-plugins', function () {
    return gulp.src('public/plugins/**/plugin.scss', { base: '.' })
        .pipe(sass({
            precision: 6,
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: pckg.browserslist,
            cascade: false
        }))
        .pipe(rename(function (path) {
            path.extname = '.css';
        }))
        .pipe(gulp.dest('.'));
});

gulp.task('watch', ['styles', 'styles-plugins'], function () {
    gulp.watch('resources/assets/scss/**/*.scss', ['styles']);
    gulp.watch('resources/assets/plugins/**/*.scss', ['styles-plugins']);
});

gulp.task('move-bower-css', function () {
    gulp.src("./resources/vendors/**/css/**/*")
        .pipe(gulp.dest("./public/vendors/"));
});
gulp.task('move-bower-js', function () {
    gulp.src("./resources/vendors/**/js/**/*")
        .pipe(gulp.dest("./public/vendors/"));
});

gulp.task('build', ['styles', 'styles-plugins']);

gulp.task('default', ['build']);