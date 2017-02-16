/**
 * Created by Nabeel on 2016-02-02.
 */
(function ( w, $, undefined ) {
	"use strict";

	$( function () {
		// vars
		var file_frame,
		    selected_file_url;

		// select handler
		var on_file_select = function ( $button ) {
			return function () {
				// fetch selected file
				selected_file_url = file_frame.state().get( 'selection' ).first().toJSON().url;

				// set linked field input new value
				$button.closest( '.acf-input' ).find( '.acf-url input[type=url]' ).val( selected_file_url ).trigger( 'change' );
			};
		};

		// media library button clicked
		$( '.acf-postbox' ).on( 'click', '.acf-media-library-button', function ( e ) {
			// prevent default behavior
			e.preventDefault();

			// close frame if open
			if ( typeof file_frame != 'undefined' ) {
				file_frame.close();
			}

			// create and open new file frame
			file_frame = wp.media( {
				//Title of media manager frame
				title   : acf_pro_media_button.i18n.frame_title,
				button  : {
					//Button text
					text: acf_pro_media_button.i18n.select_button
				},
				// single file selection
				multiple: false
			} );

			// callback for selected file
			file_frame.on( 'select', on_file_select( $( this ) ) );

			// open file frame
			file_frame.open();
		} );
	} );
})( window, jQuery );