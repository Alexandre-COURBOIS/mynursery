<?php
/**
 * mynursery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mynursery
 */

if ( ! function_exists( 'mynursery_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function mynursery_setup()  {

        load_theme_textdomain('mynursery', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');
    }

endif;

add_action( 'after_setup_theme', 'mynursery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mynursery_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'mynursery_content_width', 640 );
}
add_action( 'after_setup_theme', 'mynursery_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mynursery_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'mynursery' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'mynursery' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'mynursery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mynursery_scripts() {

    // css

/*    wp_enqueue_style('FILENAME', get_template_directory_uri() . 'FILEDIRECTORY',array(),'VERSIONFILE' );*/

    wp_enqueue_style( 'mynursery-style', get_stylesheet_uri(),array(),'1.0.0' );

    // js

/*    wp_enqueue_script('FILENAME',get_template_directory_uri().'FILEDIRECTORY',array(),'VERSIONOFFILE', true);*/

    wp_deregister_script('jquery');

    wp_enqueue_script('jquery',get_template_directory_uri().'/asset/js/vendor/jquery-3.4.1.min.js',array(),'3.4.1', true);

    wp_enqueue_script('main',get_template_directory_uri().'/asset/js/main.js',array(),'1.0.0', true);


}

add_action( 'wp_enqueue_scripts', 'mynursery_scripts' );


