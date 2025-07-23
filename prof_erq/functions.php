<?php 

// show_admin_bar( false );


include 'inc/gutenberg.php';
include 'inc/kama_pagenavi.php';
include 'inc/ajax.php';

add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script(){
	wp_enqueue_style('my-reset', get_stylesheet_directory_uri() . '/css/reset.css');
    wp_enqueue_style('my-swiper', get_stylesheet_directory_uri() . '/css/swiper-bundle.min.css');
    wp_enqueue_style('my-fancybox', get_stylesheet_directory_uri() . '/css/fancybox.css');
    wp_enqueue_style('my-style', get_stylesheet_directory_uri() . '/css/style.css');
    wp_enqueue_style('my-style-main', get_stylesheet_directory_uri() . '/style.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('my-maps', 'https://api-maps.yandex.ru/2.1/?apikey=fd996bf6-11fe-4079-a1e2-5c6efd7723af&lang=ru_RU', array(), false, true);
    wp_enqueue_script('my-modal', get_stylesheet_directory_uri() . '/js/modal.js', array(), false, true);
    wp_enqueue_script('my-swiper', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.js', array(), false, true);
    wp_enqueue_script('my-fancybox', get_stylesheet_directory_uri() . '/js/fancybox.umd.js', array(), false, true);
    wp_enqueue_script('my-script', get_stylesheet_directory_uri() . '/js/script.js', array(), false, true);
    wp_enqueue_script('my-add', get_stylesheet_directory_uri() . '/js/add.js', array(), false, true);

    $data_add = array(
        'lat' => get_field('map_22', 'option')['lat'],
        'lng' => get_field('map_22', 'option')['lng'],
        'marker' => get_field('address_hm', 'option')['text'],
        'zoom' => get_field('map_22', 'option')['zoom'],
        'catalog_link' => get_permalink(48),
    );
    wp_localize_script('my-add', 'php_vars_add', $data_add);
}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header-1' => 'Меню в шапке 1',
        'header-2' => 'Меню в шапке 2',
        'footer-3' => 'Меню в футере 3',
        'footer-2' => 'Меню в футере 2',
        'footer-1' => 'Меню в футере 1',
        'footer-4' => 'Меню в футере 4',
    ) );
});


add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' ); 


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Настройки темы',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


add_filter('tiny_mce_before_init', 'override_mce_options');
function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}


add_action('acf/input/admin_head', 'my_acf_admin_head');
function my_acf_admin_head() {
    $siteURL = get_bloginfo('stylesheet_directory').'/img/acf/';
    ?>
    <style>
        .imagePreview { position:absolute; right:100%; bottom:0; z-index:999999; border:1px solid #f2f2f2; box-shadow:0 0 3px #b6b6b6; background-color:#fff; padding:20px;}
        .imagePreview img { width:500px; height:auto; display:block; }
        .acf-tooltip li:hover { background-color:#0074a9; }
    </style>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var waitForEl = function(selector, callback) {
                if (jQuery(selector).length) {
                    callback();
                } else {
                    setTimeout(function() {
                        waitForEl(selector, callback);
                    }, 100);
                }
            };
            $(document).on('click', 'a[data-name=add-layout]', function() {
                waitForEl('.acf-tooltip li', function() {
                    $('.acf-tooltip li a').hover(function() {
                        var imageTP = $(this).attr('data-layout');
                        var imageFormt = '.png';
                        $(this).append('<div class="imagePreview"><img src="<?php echo $siteURL; ?>'+ imageTP + imageFormt+'"></div>');
                    }, function() {
                        $('.imagePreview').remove();
                    });
                });
            })
        })
    </script>
    <?php
}


function add_class_content($string, $p_class='', $h_class='') {

    if (str_contains($string, '<h') && $h_class) {
        foreach (range(1,6) as $i) {
            $from[] = "<h$i";
            $to[] = '<h'. $i .' class="'. $h_class . '"';
        }
    } 
    if (str_contains($string, '<p') && $p_class){
        $from[] = "<p";
        $to[] = '<p class="'. $p_class . '"';
    }

    return str_replace ($from, $to, $string);

}


function checkArrayForValues($arr) {
    foreach ($arr as $value) {
        if (is_array($value)) {
            if (checkArrayForValues($value)) {
                return true;
            }
        } else {
            if (!empty($value)) {
                return true;
            }
        }
    }
    return false;
}


function track_post_views($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '1');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}
function get_post_views($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        return 0;
    }
    return $count;
}


add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{
    if(in_array('home', $type))
    {
        $title = 'Главная';
    }
    return $title;
}


add_action('pre_get_posts','custom_posts_per_page');
function custom_posts_per_page($query){
    if ( $query->query_vars['post_type'] == 'sale' )  $query->query_vars['posts_per_page'] = 6;
    if ( $query->query_vars['post_type'] == 'object' )  $query->query_vars['posts_per_page'] = 12;
}

// код добавляет каноникал на страницы пагинации (ставить в function.php)
add_filter('wpseo_canonical', 'removeCanonicalArchivePagination');
    function removeCanonicalArchivePagination($link) {
$link = preg_replace('#\\??/page[\\/=]\\d+#', '', $link);
    return $link;
}