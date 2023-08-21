<?php 

require get_template_directory() . '/inc/customizer.php';

function nttdata_load_scripts(){
   //inser style.css
   wp_enqueue_style( 'nttdata-style', get_stylesheet_uri(), array(), filemtime(
         get_template_directory() . '/style.css'), 'all');

   // insere font
   wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap', array(), null);

   //insere o js
   wp_enqueue_script( 'sendmessage', get_template_directory_uri() . '/js/sendmessage.js', array(), '1.0', true);


   // // JS do carrossel
   // wp_enqueue_script( 'tr-slider-options-js', TR_SLIDER_URL . 'vendor/flexslider/flexslider.js', array( 'jquery' ), TR_SLIDER_VERSION, true );
   // wp_localize_script( 'tr-slider-options-js', 'SLIDER_OPTIONS', array('controlNav' => true));
}
add_action('wp_enqueue_scripts', 'nttdata_load_scripts');

function nttdata_configs(){
   $textdomain = 'ntt-data';

   register_nav_menus(
      array(
         'ntt_data_main_menu' => esc_html__('Main Menu', 'ntt-data'),
         'ntt_data_produtos_menu' => esc_html__('Produtos Menu', 'ntt-data'),
         'ntt_data_informacoes_menu' => esc_html__('Informações Menu', 'ntt-data'),
         'ntt_data_categoria_menu' => esc_html__('Categorias Menu', 'ntt-data')
      )
      );

      add_theme_support('post-thumbnails');

      add_theme_support( 'custom-logo',array(
         'width' => 200,
         'height' => 110,
         'flex-height' => true,
         'flex-width' => true
      ));
         add_image_size('thumbnail-300x300', 300, 300, true); // Define a miniatura de 300x300 pixels

      
            
}
add_action('after_setup_theme', 'nttdata_configs', 0);



if( ! function_exists( 'wp_body_open' ) ){
   function wp_body_open(){
      do_action( 'wp_body_open' );
   }
}

