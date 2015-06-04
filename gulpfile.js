var fs = require('fs'),
    gm = require('gm'),
    gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat');

function css() {

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
            if ( !err ) console.log('Generated screenshot.png');
        });
}

function js() {

}

gulp.task('css', css);
gulp.task('screenshot', screenshot);
gulp.task('js', js);

gulp.task('default', ['screenshot', 'css', 'js']);
