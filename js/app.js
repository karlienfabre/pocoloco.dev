/* ///////////////////////////////////////////////////////////////////////////
 * APP JS INITIALIZER
 *
 * Contains all JS events for the project specificly.
 *
 * @author 	remipelhate
 * @project	Copii - Interactive tv remote for kids
 * ///////////////////////////////////////////////////////////////////////////
 */

$(window).load( function() {

/*
| ----------------------------------------------------------------------------
| Imports
| ----------------------------------------------------------------------------
|
| The files below are getting imported and compilded using the dsheiko/jsic
| Grunt plugin.
|
| @info https://github.com/dsheiko/grunt-jsic
|
*/
	$import( "imports/objects.js" );



/*
| ----------------------------------------------------------------------------
| Configuration
| ----------------------------------------------------------------------------
|
*/
var Settings = {

	window : {
		height 	: $(window).height(),
		width 	: $(window).width()
	},
	animSpeed : 100,
	colors : {
		black : '#222222'
	},
	bp : {
		i21	: '2360px',
		i19	: '1890px',
		i18 	: '1760px',
		i17	: '1600px',
		i15	: '1440px',
		i14	: '1360px',
		i13	: '1280px',
		i12	: '1120px',
		i11	: '960px',
		i10	: '800px',
		i9 	: '640px',
		i8 	: '480px'
	}

};


/*
| ----------------------------------------------------------------------------
| DOM Events
| ----------------------------------------------------------------------------
|
*/
	/* Window events */
	$(window).resize( function() {
		windowResize();
	});

	function windowResize() {
		
	}


	/* Init */
	function init() {
		windowResize();
	}

	init();
		
});