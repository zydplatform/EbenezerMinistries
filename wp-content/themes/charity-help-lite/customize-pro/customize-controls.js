( function( api ) {
	// Extends our custom "charity-help-lite" section.
	api.sectionConstructor['charity-help-lite'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );