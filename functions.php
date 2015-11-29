<?php
/*
Author: Eddie Machado
URL: http://themble.com/sp/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD sp CORE (if you remove this, the theme will break)
require_once( 'library/sp.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH sp
Let's get everything up and running.
*********************/

function sp_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'sptheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'sp_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'sp_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'sp_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'sp_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'sp_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'sp_scripts_and_styles', 999 );
  // ie conditional wrapper
  add_theme_support( 'post-thumbnails' );

  // launching this stuff after theme setup
  sp_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'sp_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'sp_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'sp_excerpt_more' );


} /* end sp ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'sp_ahoy' );

add_image_size( 'featured-thumb', 500, 500, true ); // (cropped)

function limit_posts_per_page() {
	if ( is_category() )
		return 12;
	else
		return 12; // default: 5 posts per page
}
add_filter('pre_option_posts_per_page', 'limit_posts_per_page');

function limit_posts_per_archive_page() {
	if ( is_category() )
		set_query_var('posts_per_archive_page', 'posts_per_page'); // or use variable key: posts_per_page
}
add_filter('pre_get_posts', 'limit_posts_per_archive_page');


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'sp-thumb-600', 600, 150, true );
add_image_size( 'sp-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'sp-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'sp-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'sp_custom_image_sizes' );

function sp_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'sp-thumb-600' => __('600px by 150px'),
        'sp-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/*
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function sp_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  $wp_customize->get_section('colors')->title = __( 'Background Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );

  /****   Welcome Section Settings  ****/
  $wp_customize->add_section(
        'welcome_section_settings',
        array(
            'title' => 'Welcome Section Settings',
            'description' => 'This is where you edit your welcome section settings.',
            'priority' => 35,
        )
  );
  $wp_customize->add_setting(
    'sp_welcome_title',
    array(
        'default' => 'Welcome!',
    )
  );
  $wp_customize->add_control(
    'sp_welcome_title',
    array(
        'label' => 'Welcome Title',
        'section' => 'welcome_section_settings',
        'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'sp_welcome_textbox',
    array(
        'default' => 'Add your welome message here!',
    )
  );
  $wp_customize->add_control(
    'sp_welcome_textbox',
    array(
        'label' => 'Welcome Text',
        'section' => 'welcome_section_settings',
        'type' => 'textarea',
    )
  );
  $wp_customize->add_setting(
    'sp_welcome_img',
    array(
        'default' => '',
    )
  );
  $wp_customize->add_control(
  	new WP_Customize_Upload_Control(
  	$wp_customize,
  	'sp_welcome_img',
  	array(
  		'label'      => __( 'Welcome Image', sptheme ),
  		'section'    => 'welcome_section_settings',
      'description' => 'Best image size is 150px X 150px.',
  		'settings'   => 'sp_welcome_img',
  	) )
  );
  $wp_customize->add_setting(
    'sp_welcome_url',
    array(
        'default' => '',
    )
  );
  $wp_customize->add_control(
    'sp_welcome_url',
    array(
        'label' => 'Learn More URL',
        'section' => 'welcome_section_settings',
        'description' => 'A link to an about page for example. Leave blank for no link.',
        'type' => 'url',
    )
  );

  /**** Theme Branding ****/
  $wp_customize->add_section(
        'theme_branding',
        array(
            'title' => 'Theme Branding',
            'description' => 'This is where you edit your theme branding settings.',
            'priority' => 35,
        )
  );
  $wp_customize->add_setting( 'sp_primary_color', array(
    'default' => '#7BCFDF'
    ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sp_primary_color', array(
  	'label'        => __( 'Primary Color', sptheme ),
  	'section'    => 'theme_branding',
  	'settings'   => 'sp_primary_color',
  ) ) );
  $wp_customize->add_setting( 'sp_secondary_color', array(
    'default' => '#6DAEB9'
    ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sp_secondary_color', array(
  	'label'        => __( 'Secondary Color', sptheme ),
  	'section'    => 'theme_branding',
  	'settings'   => 'sp_secondary_color',
  ) ) );
  $wp_customize->add_setting( 'sp_logo', array(
    'default' => ''
    ) );
  $wp_customize->add_control(
  	new WP_Customize_Upload_Control(
  	$wp_customize,
  	'sp_logo',
  	array(
  		'label'      => __( 'Logo', sptheme ),
  		'section'    => 'theme_branding',
      'description' => 'Best image size is 200px X 200px.',
  		'settings'   => 'sp_logo',
  	) )
  );
  $wp_customize->add_setting( 'sp_read_more_img', array(
    'default' => ''
    ) );
  $wp_customize->add_control(
  	new WP_Customize_Upload_Control(
  	$wp_customize,
  	'sp_read_more_img',
  	array(
  		'label'      => __( 'Read More Tag Image', sptheme ),
  		'section'    => 'theme_branding',
      'description' => 'Best image size is 200px X 200px.',
  		'settings'   => 'sp_read_more_img',
  	) )
  );
  $wp_customize->add_setting(
    'sp_read_more_text',
    array(
        'default' => '',
    )
  );
  $wp_customize->add_control(
    'sp_read_more_text',
    array(
        'label' => 'Read More Tag Text',
        'section' => 'theme_branding',
        'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'sp_copyright_text',
    array(
        'default' => '',
    )
  );
  $wp_customize->add_control(
    'sp_copyright_text',
    array(
        'label' => 'Copyright Text',
        'description' => 'Change the text in the right hand section of the bottom bar.',
        'section' => 'theme_branding',
        'type' => 'text',
    )
  );

  /****  Slider Settings  ****/
  $wp_customize->add_section(
        'slider_settings',
        array(
            'title' => 'Slider Settings',
            'description' => 'This is where you edit the settings for the content slider on the main page.',
            'priority' => 35,
        )
  );
  $wp_customize->add_setting(
    'sp_slider_height',
    array(
        'default' => 535,
    )
  );
  $wp_customize->add_control(
    'sp_slider_height',
    array(
        'label' => 'Slider Height',
        'section' => 'slider_settings',
        'type' => 'range',
        'description' => '500px -> 900px, steps of 50px',
        'input_attrs' => array(
          'min'   => 500,
          'max'   => 900,
          'step'  => 50,
        ),
    )
  );
  $wp_customize->add_setting(
    'sp_slider_width',
    array(
        'default' => 900,
    )
  );
  $wp_customize->add_control(
    'sp_slider_width',
    array(
        'label' => 'Slider Width',
        'section' => 'slider_settings',
        'type' => 'range',
        'description' => '500px -> 900px, steps of 50px',
        'input_attrs' => array(
          'min'   => 500,
          'max'   => 900,
          'step'  => 50,
        ),
    )
  );
  $wp_customize->add_setting(
    'sp_img_adjust',
    array(
        'default' => 0,
    )
  );
  $wp_customize->add_control(
    'sp_img_adjust',
    array(
        'label' => 'Image Adjust',
        'section' => 'slider_settings',
        'description' => '-500px <- 0 -> 500px, steps of 50px',
        'type' => 'range',
        'input_attrs' => array(
          'min'   => -500,
          'max'   => 500,
          'step'  => 50,
        ),
    )
  );
  $wp_customize->add_setting(
    'sp_img_number',
    array(
        'default' => 5,
    )
  );
  $wp_customize->add_control(
    'sp_img_number',
    array(
        'label' => 'Number of Slides',
        'section' => 'slider_settings',
        'description' => '2 -> 6, steps of 1',
        'type' => 'range',
        'input_attrs' => array(
          'min'   => 2,
          'max'   => 6,
          'step'  => 1,
        ),
    )
  );

  /****  Pinterest Settings  ****/
  $wp_customize->add_section(
        'pinterest_settings',
        array(
            'title' => 'Pinterest Footer Settings',
            'description' => 'This is where you edit the settings for the Pinterest footer area.',
            'priority' => 35,
        )
  );
  $wp_customize->add_setting(
    'sp_pinterest_title',
    array(
        'default' => 'Pinterest Finds',
    )
  );
  $wp_customize->add_control(
    'sp_pinterest_title',
    array(
        'label' => 'Title',
        'section' => 'pinterest_settings',
        'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'sp_pinterest_url',
    array(
        'default' => 'https://www.pinterest.com/pinterest/',
    )
  );
  $wp_customize->add_control(
    'sp_pinterest_url',
    array(
        'label' => 'Pinterest User URL',
        'section' => 'pinterest_settings',
        'type' => 'text',
    )
  );

  /****  Nav Settings  ****/
  /************************/

  /**** Main Nav ****/
  $wp_customize->add_section(
        'nav_settings',
        array(
            'title' => 'Main Nav Settings',
            'description' => 'This is where you edit the settings for the main navigation.',
            'priority' => 35,
        )
  );
  $wp_customize->add_setting(
    'sp_center_nav',
    array(
        'default' => '',
    )
  );
  $wp_customize->add_control(
    'sp_center_nav',
    array(
        'label' => 'Center',
        'section' => 'nav_settings',
        'description' => 'Check to center the navigation menu.',
        'type' => 'checkbox',
    )
  );

  $wp_customize->add_setting( 'sp_nav_item_color', array(
    'default' => '#000000'
    ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sp_nav_item_color', array(
  	'label'        => __( 'Nav Item Color', sptheme ),
  	'section'    => 'nav_settings',
    'description' => 'This setting also applies to the footer nav area.',
  	'settings'   => 'sp_nav_item_color',
  ) ) );

  /****  Off-Nav Settings  ****/
  $wp_customize->add_section(
        'offcanvas_nav_settings',
        array(
            'title' => 'Off-Canvas Nav Settings',
            'description' => 'This is where you edit the settings for the off-canvas navigation.',
            'priority' => 35,
        )
  );
  $wp_customize->add_setting(
    'sp_oc_nav_background_color',
    array(
        'default' => '#eee',
    )
  );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sp_oc_nav_background_color', array(
    'label'        => __( 'Off-Canvas Background Color', sptheme ),
    'section'    => 'offcanvas_nav_settings',
    'settings'   => 'sp_oc_nav_background_color',
  ) ) );

  $wp_customize->add_setting( 'sp_oc_nav_item_color', array(
    'default' => '#000000'
    ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sp_oc_nav_item_color', array(
    'label'        => __( 'Off-Canvas Menu Item Color', sptheme ),
    'section'    => 'offcanvas_nav_settings',
    'settings'   => 'sp_oc_nav_item_color',
  ) ) );

}

function sp_customizer_css() {
    ?>
    <style type="text/css">
        h4, .subscribe-box > form > input[type="submit"], .cat-title > h2, a, .button, .archive-title { color: <?php echo get_theme_mod( 'sp_primary_color' ); ?>; }
        .top-bar, .top-bar ul, footer, .title-bar { background-color: <?php echo get_theme_mod( 'sp_primary_color' ); ?>; }
        .bottom-bar, li.active {background-color: <?php echo get_theme_mod( 'sp_secondary_color' ); ?>;}
        .orbit-image {max-height: <?php echo get_theme_mod( 'sp_slider_height'); ?>px; max-width: <?php echo get_theme_mod( 'sp_slider_width'); ?>px;}
        .orbit-image { bottom: <?php echo get_theme_mod( 'sp_img_adjust' ); ?>px;}
        .dropdown > li > a, footer, footer .widgettitle, footer a, .title-bar {color: <?php echo get_theme_mod('sp_nav_item_color', '#000'); ?>;}
        .dropdown.menu .has-submenu.is-down-arrow > a::after { border-color: <?php echo get_theme_mod('sp_nav_item_color', '#000'); ?> transparent transparent;}
        .off-canvas, .is-drilldown-submenu {background-color: <?php echo get_theme_mod('sp_oc_nav_background_color'); ?>;}
        .off-canvas a {color: <?php echo get_theme_mod('sp_oc_nav_item_color'); ?>;}
        @media screen and (min-width: 0em) and (max-width: 31.9375em) {
          header a {
            color:white;
          }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'sp_customizer_css' );

add_action( 'customize_register', 'sp_theme_customizer' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     $classes[] = "secondary-font";
     return $classes;
}

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function sp_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => 'Right Sidebar Widget Area',
		'description' => 'Primary Sidebar Widget Area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

  register_sidebar(array(
		'id' => 'footer',
		'name' => 'Footer Widget Area',
		'description' => 'Footer Widget Area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
  register_sidebar(array(
		'id' => 'topbar',
		'name' => 'Topbar Widget Area',
		'description' => 'Topbar Widget Area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'sptheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'sptheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function sp_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'sptheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'sptheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'sptheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'sptheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

function catch_that_image($my_postid) {
  $first_img = '';
  ob_start();
  ob_end_clean();
  $content_post = get_post($my_postid);
  $content = $content_post->post_content;
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "";
  }
  return $first_img;
}

function register_my_scripts() {
  wp_deregister_script('jquery');
  wp_register_script('jquery', "http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js", array(),'2.1.0',false);
  wp_register_script('modernizer', get_template_directory_uri()."/js/libs/modernizr.custom.min.js",array(),'', false);

  wp_enqueue_script(array('jquery','modernizer'));
}

add_action('wp_print_scripts','register_my_scripts');

class F_Dropdown_Walker extends Walker_Nav_Menu {

    // add needed classes to submenus
    // @see Walker::start_lvl()
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"menu\">\n";
    }

    // add active class to active li to use in styling
    // @see Walker::display_element()
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}

class F_Drilldown_Walker extends Walker_Nav_Menu {

    // add needed classes to submenus
    // @see Walker::start_lvl()
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"vertical submenu menu\">\n";
    }

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}

// /**
//  * Top Bar Walker
//  *
//  * @since 1.0.0
//  */
// class Top_Bar_Walker extends Walker_Nav_Menu {
//
//   /**
//   * @see Walker_Nav_Menu::start_lvl()
//  * @since 1.0.0
//  *
//  * @param string $output Passed by reference. Used to append additional content.
//  * @param int $depth Depth of page. Used for padding.
// */
//   function start_lvl( &$output, $depth = 0, $args = array() ) {
//       $output .= "\n<ul class=\"vertical submenu\">\n";
//   }
//
//   /**
//    * @see Walker_Nav_Menu::start_el()
//    * @since 1.0.0
//    *
//    * @param string $output Passed by reference. Used to append additional content.
//    * @param object $item Menu item data object.
//    * @param int $depth Depth of menu item. Used for padding.
//    * @param object $args
//    */
//
//   function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
//       $item_html = '';
//       parent::start_el( $item_html, $object, $depth, $args );
//
//       $output .= ( $depth == 0 ) ? '' : '';
//
//       $classes = empty( $object->classes ) ? array() : $object->classes = array();
//
//       if ( in_array('label', $classes) ) {
//           $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '<label>$1</label>', $item_html );
//       }
//
//       if ( in_array('divider', $classes) ) {
//         $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
//       }
//
//       $output .= $item_html;
//   }
//
// /**
//    * @see Walker::display_element()
//    * @since 1.0.0
//  *
//  * @param object $element Data object
//  * @param array $children_elements List of elements to continue traversing.
//  * @param int $max_depth Max depth to traverse.
//  * @param int $depth Depth of current element.
//  * @param array $args
//  * @param string $output Passed by reference. Used to append additional content.
//  * @return null Null on failure with no changes to parameters.
//  */
//   function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
//       $element->has_children = !empty( $children_elements[$element->ID] );
//       $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
//       $element->classes[] = ( $element->has_children ) ? '' : '';
//
//       parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
//   }
//
// }



/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function sp_fonts() {
  wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'sp_fonts');

/* DON'T DELETE THIS CLOSING TAG */ ?>
