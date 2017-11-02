'use strict';

var gulp = require('gulp'),
  prettyError = require('gulp-prettyerror'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  rename = require('gulp-rename'),
  cssnano = require('gulp-cssnano'),
  uglify = require('gulp-uglify'),
  eslint = require('gulp-eslint'),
  browserSync = require('browser-sync').create();

var supported = [
  'last 2 versions',
]

gulp.task('sass', function () {
  gulp.src('./sass/*.scss')
    .pipe(prettyError())
    .pipe(sass())
    .pipe(gulp.dest('./'))
    .pipe(cssnano({
      autoprefixer: {
        browsers: supported,
        add: true
      }
    }))
    .pipe(rename({
      extname: '.css'
    }))
    .pipe(gulp.dest('./'));

});

gulp.task('scripts', ['lint'], function () {
  gulp.src('./js/*.js')
    .pipe(uglify())
    .pipe(rename({
      extname: '.min.js'
    }))
    .pipe(gulp.dest('./build/js'))
});

gulp.task('lint', function () {
  return gulp.src(['./js/*.js'])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError())
});

gulp.task('browser-sync', function () {
  browserSync.init({
    proxy: 'localhost/wpcomp/wp/'
  });
  console.log('browser-sync is Top Hat! 🎩')
  gulp.watch(['./*.css', 'build/js/*.js', 'index.html']).on('change', browserSync.reload);
});

gulp.task('watch', function () {
  gulp.watch('sass/**/*.scss', ['sass']);
  gulp.watch('js/*.js', ['scripts']);
});

gulp.task('default', ['watch', 'browser-sync']);