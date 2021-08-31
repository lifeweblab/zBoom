<?php

// include redux fremwork
// require_once('lib/redux-core/framework.php');
// require_once('lib/sample/config.php');

function zboom_default_functions(){

    add_theme_support('title-tag'); 
    add_theme_support('post-thumbnails'); 
    add_theme_support('custom-background');
    load_theme_textdomain('zboom', get_template_directory_uri().'/languages');



    if(function_exists('register_nav_menu')){
	register_nav_menu('main-menu', __('Main Menu', 'zboom'));
    }
// Post Read More Function
    function read_more($limit){
        $post_content = explode(" ", get_the_content());
        
         $less_content = array_slice($post_content, 0, $limit);
         echo implode(" ", $less_content);
        // print_r($post_content);
    }

    // register postss
    register_post_type( 'zboomslider', array(
        'labels' => array(
            'name' => 'Sliders',
            'add_new_item' => 'Add New Slider'
        ),
        'public' => true,
        'supports' => array('title', 'thumbnail') 
        
        ));

    register_post_type( 'zboomservices', array(
        'labels' => array(
            'name' => 'Blocks',
            'add_new_item' => __('Add New Blocks', 'zboom')
        ),
        'public' => true,
        'supports' => array('title','editor') // Link of wordPress Documents for support array https://developer.wordpress.org/reference/functions/register_post_type/#supports
        
        ));
        register_post_type('woman', array(
            'labels' => array(
                'name' => 'Men Shop',
                'add_new_item' => 'Add New Men Shop'


            ),
            'public' => true,
            'supports' => array('title','thumbnail')




        ));




}
add_action( 'after_setup_theme','zboom_default_functions');

function zboom_css_and_js(){
    wp_register_style('zerogrid', get_template_directory_uri().'/css/zerogrid.css');
    wp_register_style('style', get_template_directory_uri().'/css/style.css');
    wp_register_style('responsive', get_template_directory_uri().'/css/responsive.css');
    wp_register_style('responsiveslides', get_template_directory_uri().'/css/responsiveslides.css');

    wp_register_script('responsiveslides', get_template_directory_uri().'/js/responsiveslides.js');

     

    wp_enqueue_style('zerogrid');
    wp_enqueue_style('style');
    wp_enqueue_style('responsive');
    wp_enqueue_style('responsiveslides');

    wp_enqueue_script('responsiveslides');



    
}
add_action( 'wp_enqueue_scripts', 'zboom_css_and_js');








//Right Sidebar Register 
function zboom_right_sidebar(){
    register_sidebar(array(
        'name' => __('Right Sidebar', 'zboom'),
        'description' => __('Add Your right sidebar widget','zboom'),
        'id' => 'right-sidebar',
        'before_widget' => '<div class="box right-sidebar">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="heading"><h2>',
        'after_title' => '</h2></div><div class="content">',
    ));    
    register_sidebar(array(
        'name' => __('Footer Widgets', 'zboom'),
        'description' => __('Add Your Footer Widgets','zboom'),
        'id' => 'footer-widget',
        'before_widget' => '<div class="col-1-4"><div class="wrap-col"><div class="box">',
        'after_widget' => '</div></div></div></div>',
        'before_title' => '<div class="heading"><h2>',
        'after_title' => '</h2></div><div class="content">',
    ));  
}
add_action('widgets_init','zboom_right_sidebar');





/*
$createuser = wp_create_user('deep', 'password', 'deeplive@gmail.com');
$createbyme = new WP_User($createuser);
$createbyme -> set_role('administrator');
*/
/*
$newuser = new WP_User(wp_create_user('sarabhai', 'password', 'deep@gmail.com'));
$newuser->set_role('administrator');
*/


/* customizer API */
add_action('customize_register', 'customizekorbo');
function customizekorbo($customizekorbo){

    $customizekorbo->add_section('header_section', array(
        'title' => 'Header Options',
        'description' => 'Please Upload your Logo Image'
    ));

    $customizekorbo->add_setting('logo_image', array(  
        'default' => '2021',
        'transport' => 'refresh'
    ));
    
    /*    $customizekorbo->add_control('copyright_text', array(
        'label' => 'Upload Your Logo',
        'section' => 'header_section',
        'type' => 'text'
    ));
    */
    $customizekorbo->add_control(
         new WP_Customize_Image_Control($customizekorbo,'logo_image', array(
        'label' => 'Upload Your Logo',
        'section' => 'header_section',
        'settings' => 'logo_image'
        )));
}
add_action('customize_register', 'customizekorbo');



































































