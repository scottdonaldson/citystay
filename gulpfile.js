var fs = require('fs'),
    gm = require('gm'),
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    autoprefixer = require('autoprefixer-core')('last 2 versions'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat');

function css() {

    gulp.src('./style.scss')
        .pipe(sass({
            outputStyle: 'compressed'
        }))
        .pipe(postcss([autoprefixer]))
        .pipe(gulp.dest('./css'));
}

function screenshot() {
    var screenshotBase = gm(__dirname + '/screenshot-base.png'),
        css = fs.readFileSync(__dirname + '/style.css', 'utf8'),
        version;

    // break into array of lines
    css = css.split('\n');
    // find the line that starts with "Version:"
    css.forEach(function(line) {
        if ( !!line.match(/Version: /) ) return version = line.slice(9);
    });

    screenshotBase
        .font(__dirname + '/fonts/23e801_6_0-webfont.ttf', 32)
        .drawText(24, 44, 'v' + version, 'NorthEast')
        .write(__dirname + '/screenshot.png', function(err) {
            if ( err ) console.log(err);
        });
}

function js() {

}

function watch() {
    gulp.watch( './style.scss', ['screenshot', 'css'] );
}

gulp.task('css', css);
gulp.task('screenshot', screenshot);
gulp.task('js', js);
gulp.task('watch', watch);

gulp.task('default', ['screenshot', 'css', 'js', 'watch']);
