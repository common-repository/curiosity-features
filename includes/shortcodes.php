<?php

/* ------------------------------------------------------- */
/* Remove automatics
/* ------------------------------------------------------- */
add_filter('the_content', 'curiosity_shortcode', 7);

// Allow Shortcodes in Widgets
add_filter('widget_text', 'curiosity_shortcode', 7);
if (!function_exists('curiosity_shortcode')){
function curiosity_shortcode($content){
	$shortcodes = 'column, align, highlight, br, clear, spacer, separator, heading, dropcap, map, contact, blockquote, flexslider, button, iconbox, icon, post';
	$shortcodes = explode(",",$shortcodes);
	$shortcodes = array_map("trim",$shortcodes);
	
	global $shortcode_tags;

    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
	$shortcode_tags = array();
	
	foreach ($shortcodes as $shortcode){
		add_shortcode($shortcode, $shortcode.'_shortcode');
	}	
	 // Do the shortcode (only the one above is registered)
    $content = do_shortcode($content);
 
    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;
 
    return $content;
}
}

function curiosity_plugin_clean_shortcodes($content){   
$array = array (
    '<p>[' => '[', 
    ']</p>' => ']', 
    ']<br>' => ']'
	
);
$content = strtr($content, $array);
return $content;
}
add_filter('the_content', 'curiosity_plugin_clean_shortcodes');



/* Columns */

if (!function_exists('column_shortcode')){
function column_shortcode($atts,$content = NULL){
	extract(shortcode_atts(array(
		'size'		=>  '',
		'last'		=>	'false',
	), $atts));

	if($last!='true')
	$return = '<div class="col-'.esc_attr($size).'">'.do_shortcode($content).'</div>';
	else
	$return = '<div class="col-'.esc_attr($size).'">'.do_shortcode($content).'</div><div class="clearfix"></div>';
	return $return;	
}
}

/* Align */

if (!function_exists('align_shortcode')){
function align_shortcode($atts,$content = NULL){
	extract(shortcode_atts(array(
		'align'		=>  '',
	), $atts));
	
	$align = trim($align);
	if ( $align!='center' && $align!='right' ) $align = 'left';
	
	$return = '<div class="align-'.esc_attr($align).'">' . do_shortcode($content) . '</div>';	
	return $return;	
}
}

/*  Highlight */

if (!function_exists('highlight_shortcode')){
function highlight_shortcode($atts,$content = NULL){
	extract(shortcode_atts(array(
		'style'		=>	1,
	), $atts));
	$return = '<span class="highlight style-'.esc_attr($style).'">'.do_shortcode($content).'</span>';
	return $return;	
}
}

/*  Br  */

if (!function_exists('br_shortcode')){
function br_shortcode($atts, $content = null ){
	return '<br />';
}
}

/*  Clear  */

if (!function_exists('clear_shortcode')){
function clear_shortcode($atts, $content = null ){
	return '<div class="clearfix"></div>';
}
}

/*  Spacer  */

if (!function_exists('spacer_shortcode')){
function spacer_shortcode($atts, $content = null ){
	extract(shortcode_atts(array(
		'height'		=>	'30',
	), $atts));
	
	$height = absint($height);	
	return '<div class="clearfix"></div><div class="spacer" style="height:'.esc_attr($height).'px"></div><div class="clearfix"></div>';
}
}


/*  Separator  */

if (!function_exists('separator_shortcode')){
function separator_shortcode($atts, $content = null ){
	return '<div class="clearfix"></div><div class="separator"></div><div class="clearfix"></div>';
}
}

/* Heading */

if (!function_exists('heading_shortcode')){
function heading_shortcode($atts,$content = NULL){
	extract(shortcode_atts(array(
		'h'				=>	'',
	), $atts));
	
	$h = strtolower( trim ($h) );
	if(!in_array($h,array('h1','h2','h3','h4','h5','h6'))) $h = 'h2';
	
	$return = '<div class="heading" align="center">';
	$return .= '<div class="heading-holder"><' . esc_attr($h) . ' class="h">' . trim($content) . '</' . esc_attr($h) . '></div>';
	$return .= '</div>';

	return $return;	
}
}


/*  Dropcap  */

if (!function_exists('dropcap_shortcode')){
function dropcap_shortcode($atts, $content = null ){	
	$return = '<span class="dropcap">' . trim($content). '</span>';
	return $return;
}
}


/* Google Map */

if (!function_exists('map_shortcode')){
function map_shortcode($atts,$content = NULL){
        
	return '<div class="google-map">'.do_shortcode($content).'</div>';
}
}

/* Contact */

if (!function_exists('contact_shortcode')){
function contact_shortcode($atts,$content = NULL){
	extract(shortcode_atts(array(
		'adress'=>	'',
		'phone'	=>	'',
        'email'	=>	'',
		'adress2'=>	'',
		'phone2'	=>	'',
        'email2'	=>	'',
	), $atts));
	
	$adress = trim($adress);
	$phone = trim($phone);
    $email = trim($email);
	$adress2 = trim($adress2);
	$phone2 = trim($phone2);
    $email2 = trim($email2);
        
	$return = '<div class="contact-shortcode">';
        $return .= '<ul class="contact-shortcode-ul">';
        if ( $adress ) $return .= '<li><div class="contact-icon"><i class="icon icon-map-marker"></i></div>' . esc_html($adress) . '</li>';
        if ( $adress2 ) $return .= '<li><div class="contact-icon"><i class="icon icon-map-marker"></i></div>' . esc_html($adress2) . '</li>';
        if ( $phone ) $return .= '<li><div class="contact-icon"><i class="icon icon-phone"></i></div>' . esc_html($phone) . '</li>';
        if ( $phone2 ) $return .= '<li><div class="contact-icon"><i class="icon icon-phone"></i></div>' . esc_html($phone2) . '</li>';
        if ( $email ) $return .= '<li><div class="contact-icon"><i class="icon icon-envelope"></i></div><a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a></li>';
        if ( $email2 ) $return .= '<li><div class="contact-icon"><i class="icon icon-envelope"></i></div><a href="mailto:' . esc_attr($email2) . '">' . esc_html($email2) . '</a></li>';
        $return .= '</ul>'; // contact-shortcode-ul
	$return .= '</div>'; // contact-shortcode 
	
	return $return;
        
}
}
 
/*  Blockquote  */
    
if (!function_exists('blockquote_shortcode')){
function blockquote_shortcode($atts,$content = NULL){

		extract(shortcode_atts(
						array(
			'style' => '',
			'author' => '',                            
						), $atts));


			$style = trim($style);
	        $author = trim($author);
                
                if ( $style != '2' ) {
		return '<div class="blockquote"><blockquote>' . do_shortcode($content) . '<cite class="quote-author">' . esc_html($author) . '</cite></blockquote></div>';
                } else {
                return '<div class="blockquote blockquote2"><blockquote>' . do_shortcode($content) . '<cite class="quote-author">' . esc_html($author) . '</cite></blockquote></div>';
                }
 }
}

/*  FlexSlider  */

if (!function_exists('flexslider_shortcode')){
function flexslider_shortcode($atts,$content = NULL){


	if (!preg_match_all("/(.?)\[(slide)\b(.*?)(?:(\/))?\](?:(.+?)\[\/slide\])?(.?)/s", $content, $matches)) :
		return do_shortcode($content);		
	else :
		
		$return = '<div class="curiosity-flexslider">';
		$return .= '<div class="flexslider"><ul class="slides">';
		
		for($i = 0; $i < count($matches[0]); $i++):
			
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
			$image = trim($matches[5][$i]);
			
			if ( $image ) {
				$img = '<img src="' . esc_url($image) . '" alt="'.basename($image).'" />';
			} else {
				$img = '';
			}
			
			$link = isset( $matches[3][$i]['link'] ) ? trim($matches[3][$i]['link']) : '';
			$target = isset( $matches[3][$i]['target'] ) ? trim($matches[3][$i]['target']) : '';
			if ( $target != '_blank') $target = '_self';
			if ( !$link ) $link = isset( $matches[3][$i]['url'] ) ? trim($matches[3][$i]['url']) : '';
			
			if ( $link ) {
				$open = '<a href="'.esc_url($link).'" target="'.$target.'">';
				$close = '</a>';
			} else {
				$open = '';
				$close = '';
			}
			
			$return .= '<li class="slide">' . $open . $img . $close. '</li>';

		endfor;
		
		$return .= '</ul></div></div>'; // flexslider		
		return $return;
		
	endif;
}
}

/*  Button  */

if (!function_exists('button_shortcode')){
function button_shortcode($atts,$content = NULL){
	extract(shortcode_atts(array(
		'link'			=>  '',
		'target'		=>	'_self',
		'icon'			=>	'',
		'icon_position'	=>	'right',
		'color'			=>	'',
        'align'			=>	'',
	), $atts));
		
	$button_class = '';

		/* icon */
	$icon_position = trim($icon_position);
	if ( $icon_position!='left' ) $icon_position = 'right';		
	$icon = trim($icon);
	if ( $icon ) {
		$ic = '<i class="icon-'.$icon.' '.$icon_position.'-icon"></i>';
		$button_class .= ' has_icon';
	} else $ic = '';
	
		/* color */
	$style = '';
	if ($color!='white' && $color!='none') $color = apply_filters('button_color',trim($color));
	if ( $color && $color != 'white' ) {
		$style .= 'background-color:'.$color.';';
	}		
	if ( $color == 'white' ) $button_class .= ' btn-white';
	
	if ( $style ) $style = ' style="'.$style.'"';
	
		/* link */
	$link = trim($link);
	if ( $link ) {
		if ( trim($target) == '_blank' ) $target = '_blank'; else $target = '_self';
		$target = ' target="'.$target.'"';
		$href = ' href="'.esc_url($link).'"';
	} else {
		$target = '';
		$href = '';
	}
	
		/* align */
	$align = trim($align);
	if ( $align!= 'right' && $align != 'center' ) $align = 'left';
	
	
		/* content */
	if ( !trim($content) ) $button_class .= ' no-content';
	
	$return = '<div class="button align-'.esc_attr($align).'">';
	$return .= '<a class="btn'.esc_attr($button_class).'"' . $href . $target . $style . '>';
	
	if ( $icon_position == 'left') $return .= $ic . '<span>' . trim($content) . '</span>';
	else $return .= '<span>' . trim($content) . '</span>' . $ic ;
	
	$return .= '</a></div>';
	
	return $return;
}
}

/*   Iconbox  */

if (!function_exists('iconbox_shortcode')){
function iconbox_shortcode($atts,$content = NULL){
	extract(shortcode_atts(array(
		'icon'			=>  'search',
		'name'			=>	'',
		'link'			=>	'',
		'title'			=>	'',	// alias of name
		'padding'			=>  '0',
	), $atts));
	
		/* name */
	$name = trim($name);
	if (!$name) $name = trim($title);
		
		/* icon */
	$icon = trim($icon);
	if ( strpos($icon,'//') !== false ) {
		$ic = '<img src="' . $icon . '" />';
		$ic_class = 'ic-image';
	}	else {
		$ic = '<i class="icon-'.$icon.'"></i>';
		$ic_class = 'ic-icon';
	}
	
	$return = '<div class="iconbox" style="padding: 0 ' . esc_attr($padding) . 'px">';
	
	if ( $link !='') { $return .= '<a href="' . esc_url($link) . '">'; }	
	$return .= '<div class="icon '.$ic_class.'">' . $ic . '</div>';
	if ( $link !='') { $return .= '</a>'; }	
	
	if ( $link !='') { $return .= '<a href="' . esc_url($link) . '">'; }	
	$return .= '<h4 class="name">' . esc_html($name) . '</h4>';
	if ( $link !='') { $return .= '</a>'; }	
	
	$return .= '<div class="desc"><p>' . do_shortcode( trim($content) ) . '</p></div>';
	
	$return .= '</div>'; 
	return $return;
}
}

/*  Icon */

if (!function_exists('icon_shortcode')){
function icon_shortcode($atts, $content = null ){
	extract(shortcode_atts(array(
		'icon'		=>	'',
	), $atts));	
		
		/* icon */
	$icon = trim($icon);
	

	$return = '<i class="icon-shortcode icon-'.esc_attr($icon).'"></i>';

	return $return;
			
}
}

/*  Post  */

if (!function_exists('post_shortcode')){
function post_shortcode($atts, $content = null ){ 
	extract(shortcode_atts(array(
		'title'		=>	'',
	), $atts));

	$title = trim($title);


$readmoretext = get_theme_mod( 'default_read_more_text' );
if ($readmoretext == '')  {
$readmoretext = __( 'Read more', 'namaste' ) ;
}
        
$postmiracle = array(
        'posts_per_page' => 1,
        'name' => '' . sanitize_title($title) . '');

$postmiracle = new WP_Query( $postmiracle ); 
while ($postmiracle->have_posts()) : $postmiracle->the_post(); 

$permalink = get_permalink();
$title = get_the_title() ;
$author = get_the_author();
$excerpt = substr(get_the_excerpt(), 0,210);
$taglist = get_the_tag_list( '<span class="tag-list">', '</span><span class="tag-list"> ', '</span>' ) ;

$return =  '<div class="post-shortcode"><div class="entry-elements">' ;

        $category_list = get_the_category_list( __( ', ', 'curiosity' ) );

$return .=  '<span class="category-list">' . $category_list . '</span>';                   
         
        
$return .=  '</div>

        <h1 class="entry-title"><a href="' . esc_url($permalink) . '">' . esc_html($title) . '</a></h1>
        <p class="entry-meta"><span><a rel="author">' . esc_html($author) . '</a></span></p>' ;

        if (has_post_thumbnail( $postmiracle->ID ) ){  
        $image = wp_get_attachment_url( get_post_thumbnail_id($postmiracle->ID), 'medium' ) ; 
        
$return .=  '<div class="small-thumb-holder"><div class="small-thumb-overlay">
                <a href="' . esc_url($permalink) . '">    
                    <div class="small-thumb" style="background-image: url(' . esc_url($image) . ')"></div>
                </a>
             </div></div>' ;
         }    

$return .=  '<div class="entry-content">' . esc_html($excerpt) . '...        
             <div class="clearfix"></div>
             <div class="entry-footer continue-reading">
             <a href="' . esc_url($permalink) . '" title="' . __('Continue Reading ', 'curiosity') . esc_attr($title) . '">' . esc_html($readmoretext) . '</a>
             </div>
             <div class="clearfix"></div>' ;   
             $tag = get_the_tags(); 
             if (! $tag) { } else { 
 $return .=  '<div class="home-tags">' . $taglist . '</div>' ; } 
 $return .=  '</div></div>' ;

endwhile;        
wp_reset_query();
return $return;
   
}
}


$shortcodes = 'column, align, highlight, br, clear, spacer, separator, heading, dropcap, map, contact, blockquote, flexslider, button, iconbox, icon, post';

$shortcodes = explode(",",$shortcodes);
$shortcodes = array_map("trim",$shortcodes);

foreach ($shortcodes as $shortcode){
	add_shortcode($shortcode, $shortcode.'_shortcode');
}