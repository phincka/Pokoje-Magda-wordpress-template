<?php
/**
 *
 * @package ths
 */

/**
 * Disable fucking gutenberg
 */
add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
/** 
* Disable default post editor
*/
add_action('init', 'init_remove_support',100);
function init_remove_support(){
    remove_post_type_support( 'post', 'editor');
    remove_post_type_support( 'page', 'editor');
    remove_post_type_support( 'opalhotel_room', 'editor');
    remove_post_type_support( 'opalhotel_room', 'comments');
    remove_post_type_support( 'opalhotel_room', 'author');
    remove_post_type_support( 'opalhotel_room', 'room');
}
/**
 * Add custom thumbnails size
 */
add_action('after_setup_theme', 'wpdocs_theme_setup');
function wpdocs_theme_setup()
{
    add_image_size('fullhd', 1920, 1080, true);
}

/**
 * Reguster post types
 *
 * @return void
 */

function postTypes()
{
    $args = array(
      'public' => true,
      'label'  => 'Pokoje',
      'supports' => array( 'title', 'thumbnail')
    );
    register_post_type( 'pokoje', $args );

    
}
add_action('init', 'postTypes', 0);

/**
 * Register menus and locations
 */
register_nav_menus(array(
    'header' => 'Główne',
    'footer' => 'Stopka'
));

/**
 * Include scripts and styles from dist folder to wp_footer
 */
function include_scripts()
{
    wp_enqueue_style('app', get_template_directory_uri() . '/dist/css/app.css', true, '1.0', 'all');
    /**
     * Adding Glide.js only when file is 'template-homepage.php'
    **/
    global $wp_query;
    $page_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true);
     
    if( $page_name == 'template_gallery.php' || $page_name == 'template_spa.php'){
        wp_enqueue_script('lightbox', get_template_directory_uri() . '/dist/js/fslightbox.js', '', '1.0', true);
    }
    wp_enqueue_script('mainjs', get_template_directory_uri() . '/dist/js/app.js', '', '1.0', true);
}
add_action('wp_footer', 'include_scripts');
/**
 * Return args of cpt
 *
 * @param String $plural name
 * @param String $singular name
 * @return void
 */
function postTypeArgs($plural, $singular)
{
    $labels = array(
        'name' => _x(ucfirst($plural) , ucfirst($plural) , 'thesigner') ,
        'singular_name' => _x(ucfirst($singular) , ucfirst($singular) , 'thesigner')
    );
    $args = array(
        'label' => __(ucfirst($singular) , 'thesigner') ,
        'labels' => $labels,
        'supports' => array(
            'title'
        ) ,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 3,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'taxonomies' => array(
            'category_' . strtolower($singular)
        )
    );
    return $args;
}

/**
 * Add thumbnail support
 */
add_theme_support('post-thumbnails');

/**
 * Register menus and locations
 */
register_nav_menus(array(
    'header' => 'Główne',
    'footer' => 'Stopka'
));

/**
 * Outputs the url of ACF image object
 * Usage: aImage('field', 'null/size')
 * @param String $field
 * @param String $type
 *
 * @return String
 */
function aImage($field, $option = null)
{

    $image = get_field($field);
    if (!$image)
    {
        $image = get_sub_field($field);
    }

    if ($option == 'option')
    {
        $image = get_field($field, 'option');
    }
    
    echo $image['url'];
}

/**
 * Outputs the alt of ACF image object
 * Usage: aAlt('field', 'null/type')
 * @param String $field
 *
 * @return String
 */
function aAlt($field, $option = null)
{
    $image = get_field($field);
    if (!$image)
    {
        $image = get_sub_field($field);
    }

    if ($option == 'option')
    {
        $image = get_field($field, 'option');
    }
    
    $alt = $image['alt'];
    echo $alt;
}

/**
 * Easy taking fields
 */
function getField($fieldName, $option = null){
    if($option == 'op'){
        echo get_field($fieldName, 'option');
    }else{
        echo get_field($fieldName);
    }
}

function getSub($fieldName, $option = null){
    if($option == 'op'){
        echo the_sub_field($fieldName, 'option');
    }else{
        echo the_sub_field($fieldName);
    }
}


add_filter('body_class', 'change_body_class');
function change_body_class($classes) {
	if (stripos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false && stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == false) {
		$classes[] = 'safari';
	}
	return $classes;
}
/**
 * Returns the String of the asset in dist folder
 */
function asset($asset)
{
    echo get_template_directory_uri() . '/dist/' . $asset;
}
/**
 * Remove wp version
 */
remove_action('wp_head', 'wp_generator');

/**
 * Remove default woocommerce styles
 * add_filter('woocommerce_enqueue_styles', '__return_empty_array');
 */

/**
 * Remove CF7 styles
 *
 */
function deregister_cf7styles()
{
    wp_deregister_style('contact-form-7');
}
add_action('wp_print_styles', 'deregister_cf7styles', 100);

 
/**
 * Remove wordpress stuff that we dont need
 */
function my_deregister_scripts()
{
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
remove_action('wp_head', 'wp_resource_hints', 2);
add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins))
    {
        return array_diff($plugins, array(
            'wpemoji'
        ));
    }
    else
    {
        return array();
    }
}
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type)
    {
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff($urls, array(
            $emoji_svg_url
        ));
    }
    return $urls;
}
if (function_exists('acf_add_options_page'))
{
    acf_add_options_page(array(
        'page_title' => 'Ogólne',
        'menu_title' => 'Ogólne',
        'redirect' => false
    ));
}

/**
 * Register default ACF fields
 * responsible for displaying title and description inputs (for seo)
 */
if (function_exists('acf_add_local_field_group')):
    acf_add_local_field_group(array(
        'key' => 'group_5b728f125850c',
        'title' => 'Seo',
        'fields' => array(
            array(
                'key' => 'field_5b728f2c041fc',
                'label' => 'Title',
                'name' => 'title-seo',
                'type' => 'text',
                'instructions' => 'Wpisz tytuł seo (ok. 60 znaków)'
            ) ,
            array(
                'key' => 'field_5b728f5a12993',
                'label' => 'Description',
                'name' => 'description-seo',
                'type' => 'text',
                'instructions' => 'Wpisz opis seo (ok. 170 znaków)'
            )
        ) ,
        'location' => array(
            array(
                array(
                    'param' => 'post_status',
                    'operator' => '!=',
                    'value' => 'trash'
                )
            )
        ) ,
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => 1
    ));
endif;

/**
 * Minify HTML output
 */
function compressHTML($str)
{
    return preg_replace(array(
        '/<!--(.*?)-->/s', // html comments
        '@\/\*(.*?)\*\/@s', // js comments
        '/\>[^\S ]+/s', // after ">"
        '/[^\S ]+\</s', // beofre ">"
        '/\>\s+\</', // between "><"
        '/\;[^\S ]+/s', // after ;
        '/\{[^\S ]+/s', // before {
        '/\}[^\S ]+/s', // before {
        '/[^\S ]+\}/s'
        // after }
        
    ) , array(
        '', /// html comments
        '', // js comments
        '>', // after ">"
        '<', // strips before tags, except space
        '><', // between "><"
        ';', // after ;
        '{', // before {
        '}', // before }
        '}'
        // after }
        
    ) , $str);
}

add_action('template_redirect', 'htmlStart', 0);
function htmlStart()
{
    ob_start('compress');
}

/**
 * 
 * 
 add_action('shutdown', 'htmlEnd', 1000);
 function htmlEnd()
 {
     ob_end_flush();
    }
*/

/**
 * Output the buffer
 */
function compress($buffer)
{
    return compressHTML($buffer);
}