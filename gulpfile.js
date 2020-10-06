var AppName = 'semanawp';

var gulp         = require( 'gulp' ),
	sass         = require( 'gulp-sass' ),
	autoprefixer = require( 'gulp-autoprefixer' ),
	plumber      = require( 'gulp-plumber' ),
	concat       = require( 'gulp-concat' ),
	notify       = require( 'gulp-notify' ),
	sourcemaps   = require( 'gulp-sourcemaps' );

sass.compiler = require('node-sass');

/** SCSS Task **/
gulp.task( 'public-scss', function() {
	return gulp.src( './sass/style.scss' )
		.pipe( sourcemaps.init() )
		.pipe( sourcemaps.identityMap() )
		.pipe( plumber() )
		.pipe( concat('style.css') )
		.pipe( autoprefixer( 'last 2 versions', '> 5%', 'not ie 6-9') )
		.pipe( sass({outputStyle: 'compressed'}).on( 'error', sass.logError ) )
		.pipe( sourcemaps.write( './maps' ) )
		.pipe( gulp.dest( './' ) )
		.pipe( notify( {
			title: 'Result Gulp Task CSS:',
			message: 'Created: ./style.css',
			onLast: true
		} ) );
} );

gulp.task( 'watch', function() {
	// Inspect changes in all scss files.
	gulp.watch( './sass/**/*.scss', gulp.series( 'public-scss' ) );
} );

gulp.task( 'default', gulp.parallel( 'watch', 'public-scss' ) );
