<?php
/**
 * Wayup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wayup
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wayup_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wayup_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Wayup, use a find and replace
		 * to change 'wayup' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wayup', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-header' => esc_html__( 'Header navigation', 'wayup' ),
				'menu-footer-1' => esc_html__( 'Footer navigation 1', 'wayup' ),
				'menu-footer-2' => esc_html__( 'Footer navigation 2', 'wayup' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wayup_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		//Размеры для картинок
		add_image_size( 'testimonial-thumb', 225, 231, true );
	}
endif;
add_action( 'after_setup_theme', 'wayup_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wayup_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wayup_content_width', 640 );
}
add_action( 'after_setup_theme', 'wayup_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wayup_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wayup' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wayup' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wayup_widgets_init' );


add_action( 'wp_enqueue_scripts', 'wayup_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/*наш код ниже


/**
 * Настройки для Options Panel
 */
require get_template_directory() . '/inc/options-panel-redux.php';
/**
 * Подключаем хлебные крошки
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Подключаем метабоксы
 */
require get_template_directory() . '/inc/metaboxes.php';
/**
 * 
 * 
 * 
 * Enqueue scripts and styles.
 */
function wayup_scripts() {
	//Подключение CSS
	wp_enqueue_style( 'wayup-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'wayup-main', get_template_directory_uri(). '/assets/css/main.min.css', array(), '1.0');
	wp_enqueue_style( 'wayup-vendor', get_template_directory_uri(). '/assets/css/vendor.min.css', array(), '1.0');

	wp_style_add_data( 'wayup-style', 'rtl', 'replace' );

	//Подключение JS
	
	wp_enqueue_script('jquery3.1.1', 'http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');
	wp_enqueue_script('goodshare', 'https://cdn.jsdelivr.net/npm/goodshare.js@4/goodshare.min.js', array(), '', true );

	wp_enqueue_script('wayup-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), '1.0', true );
	wp_enqueue_script('wayup-common', get_template_directory_uri() . '/assets/js/common.min.js', array(), '1.0', true );
	
	
	wp_enqueue_script('wayup-svg-sprite', get_template_directory_uri() . '/assets/img/svg-sprite/svg-sprite.js', array(), '1.0', false );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
function wayup_admin_scripts($hook) {


	// Add scripts for metaboxes
  	if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php' ) {
		wp_enqueue_style( 'wayup-metabox', get_template_directory_uri(). '/assets/css/libs/metabox.css', array(), '1.0');
		wp_enqueue_script( 'wayup_metaboxes', get_template_directory_uri() . '/assets/js/libs/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
  	}
	

}
add_action( 'admin_enqueue_scripts', 'wayup_admin_scripts', 10 );


/* 
Класс для body для специфической страницы*/

add_filter( 'body_class', 'wayup_body_class' );
function wayup_body_class( $classes ) {
    if ( is_page_template( 'template-home.php' ) ) {
        $classes[] = 'is-home';
    } else {
		$classes [] = 'inner-page';
	}
    return $classes;
}


/**
 *Регистрируем посттайп для Testimonials
 */
function wayup_register_custom_post_type() {

 
    register_post_type( 'testimonial', array(
        'labels'             => array(
			'name'                  => 'Отзывы',
			'singular_name'         => 'Отзыв',
			'add_new'               => 'Добавить новый',
		),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'      	 => 'dashicons-format-quote',
        'supports'           => array( 'title', 'editor', 'thumbnail'),
	) );

	register_post_type( 'service', array(
        'labels'             => array(
			'name'                  => 'Услуги',
			'singular_name'         => 'Услуга',
			'add_new'               => 'Добавить новую',
		),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'services' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'      	 => 'dashicons-admin-tools',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
	) );
	register_post_type( 'news', array(
        'labels'             => array(
			'name'                  => 'Новости',
			'singular_name'         => 'Новость',
			'add_new'               => 'Добавить новую',
		),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'news' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'      	 => 'dashicons-format-aside',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
	) );
	register_post_type( 'feature', array(
        'labels'             => array(
			'name'                  => 'Кейсы',
			'singular_name'         => 'Кейс',
			'add_new'               => 'Добавить новый',
		),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'feature' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'      	 => 'dashicons-dashboard',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
	) );
	
	add_image_size( 'testimonial-thumb', 225, 231, true );
}
 
add_action( 'init', 'wayup_register_custom_post_type' );


function aletheme_metaboxes($meta_boxes) {
	
	$meta_boxes = array();

    $prefix = "wayup_";

    $meta_boxes[] = array(
        'id'         => 'testimonial_metaboxes',
        'title'      => 'Данные для отзыва',
        'pages'      => array( 'testimonial', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-press.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => 'Социальная сеть',
                'desc' => 'Введите ссылку на соц сеть',
                'id'   => $prefix . 'social_link',
                'type' => 'text',
			),
			array(
                'name' => 'Дата отзыва',
                'desc' => 'Введите дату отзыва',
                'id'   => $prefix . 'testy_date',
                'type' => 'text_date',
            ),
           
        )
    );

	$meta_boxes[] = array(
        'id'         => 'testimonial_metaboxes',
        'title'      => 'Данные для отзыва',
        'pages'      => array( 'service', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-press.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => '1',
                'desc' => 'Введите ссылку на соц сеть',
                'id'   => $prefix . 'social_link1',
                'type' => 'text',
			),
			array(
                'name' => '1',
                'desc' => 'Введите дату отзыва',
                'id'   => $prefix . 'testy_date2',
                'type' => 'text_date',
            ),
           
        )
    );


	return $meta_boxes;
}
//Количество постов на странице архива 



function wayup_posts_per_archiepage ( $query ) {
	
	global $wayup_options;
	

	$posts_per_page_testy = -1;
	if($wayup_options['testimonial_posts']) 
		{ $posts_per_page_testy = $wayup_options['testimonial_posts']; 
	}
	
    if (is_post_type_archive('testimonial')) {
        $query->set( 'posts_per_page', $posts_per_page_testy );
    }
}
add_action( 'pre_get_posts', 'wayup_posts_per_archiepage' );



function wayup_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}