# SIDEBAR / WIDGETS
   * para criar a area de sidebar devemos criar uma nova 'CLASSE' e colocar todos os widgets como 'METODOS' dentro
      ```php
         function wptema_sidebars(){ // classe
            register_sidebar( // metodo
               array(
                  'name' => 'Blog Sidebar',
                  'id' => 'sidebar-blog',
                  'description' => 'This is the blog Sidebar, You can add your widgets here.',
                  'before_widget' => '<div class="widget-wrapper">',
                  'after_widget' => '</div>',
                  'before_title' => '<h4 class="widget-title">',
                  'after_title' => '</h4>',
               )
            )
            // para acrescentar mais widgets basta copiar o metodo acima e modificar as informações
         }
      ``` 
   * após isso colocaremos nossa 'CLASSE' na fila do wordpress no 'momento' widgets_ini()
      ```php
         add_action( 'widgets_init', 'wptema_sidebars' );
      ```