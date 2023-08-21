<!DOCTYPE html>
<html <?php language_attributes() ;?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ;?>
    <title><?php esc_html(bloginfo()); ?></title>
       <?php include_once('style-customizer.php'); ?>

       <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

       <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/cron.css">
       
       <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
       
</head>
<body <?php body_class(); ;?>>
<?php wp_body_open()  ;?>


      <!-- HEADER -->
      <header class="header">

        
         <div class="main-header">
            <div class="main-header-container">
               <a href="#" id="brand">
                  <?php 
                  if(has_custom_logo()){
                     the_custom_logo() ;
                  }else{
                     esc_html(bloginfo());
                  }
                   ?> 

                   <i class="<?php echo esc_html(get_theme_mod( 'set_nav_icon', '' )) ?>">
                  </i>
               </a>
   
            </div>
        </div>
    </header>
