/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'fr';
	config.uiColor = '#ffffff';
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Source,Save,Preview,Print';
};

CKEDITOR.on( 'instanceReady', function( ev ) {
	var writer = ev.editor.dataProcessor.writer;
	writer.indentationChars = '\t';
	writer.selfClosingEnd = ' />';
	writer.lineBreakChars = '\n';
	writer.setRules( 'p', {
		indent: true,
		breakBeforeOpen: true,
		breakAfterOpen: true,
		breakBeforeClose: false,
		breakAfterClose: true
	} );
});

CKEDITOR.on( 'instanceCreated', function( event ) {
	var editor = event.editor,
		element = editor.element;
	if ( element.is( 'h1', 'h2', 'h3' ) || element.getAttribute( 'id' ) == 'taglist' ) {
		editor.on( 'configLoaded', function() {
			editor.config.removePlugins = 'colorbutton,find,font,' +
				'forms,iframe,image,newpage,removeformat,' +
				'smiley,specialchar,stylescombo,templates';
			editor.config.toolbarGroups = [
				{ name: 'editing',		groups: [ 'basicstyles', 'links' ] },
				{ name: 'undo' },
				{ name: 'clipboard',	groups: [ 'selection', 'clipboard' ] },
				{ name: 'about' }
			];
		});
	}
});
