<?php
/**
 * @package 
 */


if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'switch_setup' ) ) :

function switch_setup() {


	load_theme_textdomain( 'switch', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'switch' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );


	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	
	add_theme_support( 'custom-background', apply_filters( 'switch_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; 
add_action( 'after_setup_theme', 'switch_setup' );

/**
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function switch_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'switch' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'switch_widgets_init' );


function switch_scripts() {
	
    wp_enqueue_style( 'switch-style', get_stylesheet_uri() );

    wp_enqueue_style('megafolio-settings', get_template_directory_uri() . "/css/settings.min.css");
	wp_enqueue_script( 'switch-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
    wp_enqueue_script( 'switch-modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', array(), '', true );
    wp_enqueue_script( 'switch-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
    wp_enqueue_script( 'switch-smooth', get_template_directory_uri() . '/js/smooth-scroll.js', array(), '', true );
    wp_enqueue_script( 'switch-isotope', get_template_directory_uri() . '/js/isotope.min.js', array(), '', true );
    wp_enqueue_script( 'switch-hoverdir', get_template_directory_uri() . '/js/jquery.hoverdir.js', array(), '', true );
    wp_enqueue_script( 'switch-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '', true );
    wp_enqueue_script( 'switch-nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), '', true );
    wp_enqueue_script( 'switch-wow', get_template_directory_uri() . '/js/wow.min.js', array(), '', true );
    wp_enqueue_script( 'switch-owl', get_template_directory_uri() . '/js/owl.carousel.js', array(), '', true );
    wp_enqueue_script( 'switch-main', get_template_directory_uri() . '/js/main.js', array(), '', true );

	wp_enqueue_script( 'switch-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'switch_scripts' );


require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/extras.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/jetpack.php';


if ( !class_exists( 'ReduxFramework' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxCore/framework.php' );
}

if ( !isset( $redux_demo ) ) {
    require_once( dirname( __FILE__ ) . '/admin/admin_setting.php' );
}

function tx_switch_cmb()
{
    $prefix = "_tx_";
    $meta_boxes[] = array(
        'id' => 'feature',
        'title' => __('Opciones de la sesion',"tx_switch"),
        'pages' => array('Sesion 2'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, 
        'fields' => array(
           
            array(
                'name' => __('Icono ',"tx_switch"),
                'id' => $prefix . 'exp_url',
                'type' => 'file'
            ),
           
           
            array(
                'name' => __('Texto',"tx_switch"),
                'id' => $prefix . 'exp_description',
                'type' => 'textarea'
            ),
        )
    );



    $meta_boxes[] = array(
        'id' => 'testimonial',
        'title' => __('Opciones de la sesion',"tx_switch"),
        'pages' => array('Sesion 4'), 
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, 
        'fields' => array(
            array(
                'name' => __('Imagen ',"tx_switch"),
                'id' => $prefix . 'test_image',
                'type' => 'file'
            ),
            array(
                'name' => __('Nombre ',"tx_switch"),
                'id' => $prefix . 'test_name',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Subtitulo',"tx_switch"),
                'id' => $prefix . 'test_designation',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Texto',"tx_switch"),
                'id' => $prefix . 'test_description',
                'type' => 'wysiwyg'
            ),
        )
    );

   
    
        $meta_boxes[] = array(
        'id' => 'Sesion 5',
        'title' => __('Opciones de la sesion',"tx_switch"),
        'pages' => array('team'), 
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, 
        'fields' => array(
            array(
                'name' => __('Imagen ',"tx_switch"),
                'id' => $prefix . 'team_img',
                'type' => 'file'
            ),
            
            
            
            array(
                'name' => __('Texto',"tx_switch"),
                'id' => $prefix . 'team_description',
                'type' => 'wysiwyg',

            ),
            array(
                'name' => __('Facebook Link',"tx_switch"),
                'id' => $prefix . 'team_facebook_link',
                'type' => 'text',

            ),
            array(
                'name' => __('Twitter Link',"tx_switch"),
                'id' => $prefix . 'team_twitter_link',
                'type' => 'text',

            ),
            array(
                'name' => __('Linkedin Link',"tx_switch"),
                'id' => $prefix . 'team_linkedin_link',
                'type' => 'text',

            ),
            array(
                'name' => __('Dribbble Link',"tx_switch"),
                'id' => $prefix . 'team_dribbble_link',
                'type' => 'text',

            ),
        )
    );


    

    $meta_boxes[] = array(
        'id' => 'postfolio',
        'title' => __('Ingresa las imagenes del portafolio',"tx_switch"),
        'pages' => array('portfolio'), 
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, 
        'fields' => array(
            array(
                'name' => __('Link',"tx_switch"),
                'id' => $prefix . 'portfolio_link',
                'type' => 'text_medium'
            ),

            array(
                'name' => __('Imagen pequeña',"tx_switch"),
                'id' => $prefix . 'portfolio_img',
                'type' => 'file'
            ),

            array(
                'name' => __('Imagen Grande',"tx_switch"),
                'id' => $prefix . 'large_portfolio_img',
                'type' => 'file'
            ),
        )
    );
    return $meta_boxes;
}

add_filter('cmb_meta_boxes', 'tx_switch_cmb');




add_action('init', 'tx_initialize_cmb_meta_boxes', 9999);
function tx_initialize_cmb_meta_boxes()
{
    if (!class_exists('cmb_Meta_Box')) {
        require_once('libs/cmb/init.php');
    }
}

function tx_switch_fields()
{

    $labels1 = array(
        'name' => _x('Sesion 2', 'Post Type General Name', 'tx_switch'),
        'singular_name' => _x('Sesion 2', 'Post Type Singular Name', 'tx_switch'),
        'menu_name' => __('Sesion 2', 'tx_switch'),
        'parent_item_colon' => __('Parent feature:', 'tx_switch'),
         'all_items' => __('Todas las opciones', 'tx_switch'),
        'view_item' => __('Ver opcion', 'tx_switch'),
        'add_new_item' => __('Añadir opcion', 'tx_switch'),
        'add_new' => __('Nueva opcion', 'tx_switch'),
        'edit_item' => __('Editar opcion', 'tx_switch'),
        'update_item' => __('Actualizar opcion', 'tx_switch'),
        'search_items' => __('Buscar opcion', 'tx_switch'),
        'not_found' => __('Opcion no encontra', 'tx_switch'),
        'not_found_in_trash' => __('Sin opciones en papelera', 'tx_switch'),
    );
    $args1 = array(
        'label' => __('Sesion 2', 'tx_switch'),
        'description' => __('Sesion 2', 'tx_switch'),
        'labels' => $labels1,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/images/menu-icon/feature.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('feature', $args1);


    $labels4 = array(
    'name' => _x('Sesion 4', 'Post Type General Name', 'tx_switch'),
    'singular_name' => _x('Sesion 4', 'Post Type Singular Name', 'tx_switch'),
    'menu_name' => __('Sesion 4', 'tx_switch'),
    'parent_item_colon' => __('Parent Testimonial:', 'tx_switch'),
    'all_items' => __('Todas las opciones', 'tx_switch'),
    'view_item' => __('Ver opcion', 'tx_switch'),
    'add_new_item' => __('Añadir opcion', 'tx_switch'),
    'add_new' => __('Nueva opcion', 'tx_switch'),
    'edit_item' => __('Editar opcion', 'tx_switch'),
    'update_item' => __('Actualizar opcion', 'tx_switch'),
    'search_items' => __('Buscar opcion', 'tx_switch'),
    'not_found' => __('Opcion no encontra', 'tx_switch'),
    'not_found_in_trash' => __('Sin opciones en papelera', 'tx_switch'),
    );
    $args4 = array(
        'label' => __('Sesion 4', 'tx_switch'),
        'description' => __('Sesion 4', 'tx_switch'),
        'labels' => $labels4,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/images/menu-icon/testimonial.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('testimonial', $args4);

    
    $labels1 = array(
        'name' => _x('Sesion 5', 'Post Type General Name', 'tx_switch'),
        'singular_name' => _x('Seion 5', 'Post Type Singular Name', 'tx_switch'),
        'menu_name' => __('Sesion 5', 'tx_switch'),
        'parent_item_colon' => __('Parent team:', 'tx_switch'),
        'all_items' => __('Todas las opciones', 'tx_switch'),
        'view_item' => __('Ver opcion', 'tx_switch'),
        'add_new_item' => __('Añadir opcion', 'tx_switch'),
        'add_new' => __('Nueva opcion', 'tx_switch'),
        'edit_item' => __('Editar opcion', 'tx_switch'),
        'update_item' => __('Actualizar opcion', 'tx_switch'),
        'search_items' => __('Buscar opcion', 'tx_switch'),
        'not_found' => __('Opcion no encontra', 'tx_switch'),
        'not_found_in_trash' => __('Sin opciones en papelera', 'tx_switch'),
        
    );
    $args1 = array(
        'label' => __('Sesion 5', 'tx_switch'),
        'description' => __('Sesion 5', 'tx_switch'),
        'labels' => $labels1,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/images/menu-icon/team.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('team', $args1);



    $labels2 = array(
        'name' => _x('Portafolio', 'Post Type General Name', 'tx_switch'),
        'singular_name' => _x('Portafolio', 'Post Type Singular Name', 'tx_switch'),
        'menu_name' => __('Portafolio', 'tx_switch'),
        'parent_item_colon' => __('Parent Portfolio:', 'tx_switch'),
        'all_items' => __('Todas las imagenes', 'tx_switch'),
        'view_item' => __('Ver opcion', 'tx_switch'),
        'add_new_item' => __('Añadir opcion', 'tx_switch'),
        'add_new' => __('Nueva opcion', 'tx_switch'),
        'edit_item' => __('Editar opcion', 'tx_switch'),
        'update_item' => __('Actualizar opcion', 'tx_switch'),
        'search_items' => __('Buscar opcion', 'tx_switch'),
        'not_found' => __('Opcion no encontra', 'tx_switch'),
        'not_found_in_trash' => __('Sin opciones en papelera', 'tx_switch'),
    );
    $args2 = array(
        'label' => __('Portafolio', 'tx_switch'),
        'description' => __('Portafolio', 'tx_switch'),
        'labels' => $labels2,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/images/menu-icon/portfolio.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('Portfolio', $args2);

}

add_action('init', 'tx_switch_fields', 0);


add_action( 'init', 'register_taxonomy_filters' );

 function register_taxonomy_filters() {
  $labels = array(
   'name' => __( 'Filters', 'webdgallery' ),
   'singular_name' => __( 'Filter', 'webdgallery' ),
   'search_items' => __( 'Search Filters', 'webdgallery' ),
   'popular_items' => __( 'Popular Filters', 'webdgallery' ),
   'all_items' => __( 'All Filters', 'webdgallery' ),
   'parent_item' => __( 'Parent Filter', 'webdgallery' ),
   'parent_item_colon' => __( 'Parent Filter:', 'webdgallery' ),
   'edit_item' => __( 'Edit Filter', 'webdgallery' ),
   'update_item' => __( 'Update Filter', 'webdgallery' ),
   'add_new_item' => __( 'Add New Filter', 'webdgallery' ),
   'new_item_name' => __( 'New Filter', 'webdgallery' ),
   'separate_items_with_commas' => __( 'Separate Filters with commas', 'webdgallery' ),
   'add_or_remove_items' => __( 'Add or remove Filters', 'webdgallery' ),
   'choose_from_most_used' => __( 'Choose from the most used Filters', 'webdgallery' ),
   'menu_name' => __( 'Filters', 'webdgallery' ),
  );

  $args = array(
   'labels' => $labels,
   'public' => true,
   'show_in_nav_menus' => false,
   'show_ui' => true,
   'show_tagcloud' => false,
   'hierarchical' => true,

   'rewrite' => true,
   'query_var' => true
  );

  register_taxonomy( 'filters', array('portfolio'), $args );
}


add_filter( 'post_class', 'theme_t_wp_taxonomy_post_class', 10, 3 );
function theme_t_wp_taxonomy_post_class( $classes, $class, $ID ) {
    $taxonomy = 'filters';
    $terms = get_the_terms( (int) $ID, $taxonomy );
    if( !empty( $terms ) ) {
        foreach( (array) $terms as $order => $term ) {
            if( !in_array( $term->slug, $classes ) ) {
                $classes[] = $term->slug;
            }
        }
    }
    return $classes;
}

require_once get_template_directory() . '/example.php';