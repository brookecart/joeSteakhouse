jQuery(document).ready(function($) {

function show_boxes(){

	//POST FORMAT GALLERY METABOXES
	if ( $('input#post-format-gallery').is(':checked') ) {
		$('#gallery_metabox').show();
	}
	else {
		$('#gallery_metabox').hide();
	}
	
	
	//POST FORMAT LINK METABOXES
	if ( $('input#post-format-link').is(':checked') ) {
		$('#link_metabox').show();
	}
	else {
		$('#link_metabox').hide();
	}
	
	
	//POST FORMAT QUOTE METABOXES
	if ( $('input#post-format-quote').is(':checked') ) {
		$('#quote_metabox').show();
	}
	else {
		$('#quote_metabox').hide();
	}
	
	
	//POST FORMAT IMAGE METABOXES
	if ( $('input#post-format-image').is(':checked') ) {
		$('#image_metabox').show();
	}
	else {
		$('#image_metabox').hide();
	}
	
	
	//POST FORMAT VIDEO METABOXES
	if ( $('input#post-format-video').is(':checked') ) {
		$('#video_metabox').show();
	}
	else {
		$('#video_metabox').hide();
	}
	
	
	//POST FORMAT ASIDE METABOXES
	if ( $('input#post-format-aside').is(':checked') ) {
		$('#aside_metabox').show();
	}
	else {
		$('#aside_metabox').hide();
	}
	
	
	//POST FORMAT STATUS METABOXES
	if ( $('input#post-format-status').is(':checked') ) {
		$('#status_metabox').show();
	}
	else {
		$('#status_metabox').hide();
	}
	
	
	//POST FORMAT AUDIO METABOXES
	if ( $('input#post-format-audio').is(':checked') ) {
		$('#audio_metabox').show();
	}
	else {
		$('#audio_metabox').hide();
	}
	
	
	//POST FORMAT CHAT METABOXES
	if ( $('input#post-format-chat').is(':checked') ) {
		$('#chat_metabox').show();
	}
	else {
		$('#chat_metabox').hide();
	}
	
	
	//CONTACT PAGE METABOXES
	if ( $('select#page_template :selected').val() == 'page-contact.php' ) {
		$('#contact_metabox').show();
	}
	else {
		$('#contact_metabox').hide();
	}
	
	
	//CONTACT PAGE METABOXES
	if ( $('select#page_template :selected').val() == 'page-about.php' ) {
		$('#about_metabox').show();
	}
	else {
		$('#about_metabox').hide();
	}
	
	
	//HOME PAGE METABOXES
	if ( $('select#page_template :selected').val() == 'page-home.php' ) {
		$('#home_metabox').show();
	}
	else {
		$('#home_metabox').hide();
	}
	
	//PORTFOLIO PAGE METABOXES
	if ( $('select#page_template :selected').val() == 'page-portfolio-1column.php' ) {
		$('#portfolio_pages_metabox').show();
	} 
	else {
		$('#portfolio_pages_metabox').hide();
	}
};

function hide_boxes(){
	if ( $('#icon-edit').hasClass('icon32-posts-portfolio') ) {
		$('input#post-format-quote, label[for="post-format-quote"], input#post-format-aside, label[for="post-format-aside"], input#post-format-link, label[for="post-format-link"], input#post-format-status, label[for="post-format-status"], input#post-format-0, label[for="post-format-0"], input#post-format-chat, label[for="post-format-chat"]').hide();
		$('#post-formats-select br').hide();
		$('#post-formats-select input').css({ marginLeft : '10px' });
	}
};

//CALL SHOW_BOXES
show_boxes();

hide_boxes();

//CALL SHOW_BOXES AGAIN ON INPUT CLICK
$('input').click(function(){
	show_boxes();
});

$('select#page_template').change(function(){
	show_boxes();
});
	
});