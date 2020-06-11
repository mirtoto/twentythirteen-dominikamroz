<?php

/**
 * Change content width to 910px.
 */
if ( ! isset( $content_width ) )
	$content_width = 910;

/**
 * Twenty Thirteen setup.
 */
function twentythirteen_child_setup() {
	set_post_thumbnail_size( 910, 270, true );
}
add_action( 'after_setup_theme', 'twentythirteen_child_setup' );

/**
 * Enqueue scripts and styles for the front end.
 */
function twentythirteen_child_scripts_styles() {
	// jQuery Lettering
	wp_enqueue_script( 'jquery.lettering', get_stylesheet_directory_uri() . '/js/jquery.lettering-0.6.1.min.js', array( 'jquery' ), '0.6.1', false );
	// jQuery dominikamroz.art.pl theme
	wp_enqueue_script( 'jquery.theme', get_stylesheet_directory_uri() . '/js/jquery-dominikamroz.js', array( 'jquery' ), '1.0.0', false );
	
	// Loads google fonts
	wp_enqueue_style( 'twentythirteen-googlefonts', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&subset=latin-ext', array(), null ); 
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_child_scripts_styles' );

/**
 * Register two widget areas.
 */
function twentythirteen_child_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Site Keywords' , 'twentythirteen' ),
		'id'            => 'site-keywords',
		'description'   => '',
        'class'         => '',
		'before_widget' => '<div id="%1$s" class="site-keywords"><small>',
		'after_widget'  => '</small></div><!-- .site-keywords -->',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentythirteen_child_widgets_init' );

/**
 * The Caption shortcode.
 */
function twentythirteen_child_img_caption_shortcode($output, $attr, $content) {
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr, 'caption'));

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px">'
	. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
} 
add_filter( 'img_caption_shortcode', 'twentythirteen_child_img_caption_shortcode', 10, 3 );

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/**
 * Unwrap Images from Paragraph Tags Start
 */
function twentythirteen_child_the_content($content) {
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'twentythirteen_child_the_content');
