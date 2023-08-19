# INSERIR O CSS E O JAVASCRIPT
   *  inserir o CSS e os JavaScript no tema é feito de forma diferente;
      - Primeiro devemos criar uma 'CLASSE' e inserir alguns 'METODOS'
         - o nome desta classe deve seguir a boas praticas.. ex:
            ```php
               function wptema_load_scripts()
            ```

      - Segundo devemos enfileirar ele no 'momento'  wp_enqueue_scripts() 
   
      * inserindo o style.css
         - é necessario criar um METODO padrão do wordpress que chama " wp_enqueue_style() " e passar alguns parametros

         ```php
               wp_enqueue_style( 'wptema-style', get_stylesheet_uri(), array(), filemtime(
                  get_template_directory() . '/style.css'), 'all');
         ```
      
      * inserindo o script.js
         - é necessario criar um METODO padrão do wordpress que chama " wp_enqueue_script() " e passar alguns parametros

         ```php
            wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true);
            // para que o script seja inserido no final da pagina e não no <head> é necessario passar o parametro true 
         ```

   * depois de criar nossos metodos do CSS e JS devemos colocar nossa 'CLASSE' na fila do wordpress
      ```php
         add_action('wp_enqueue_scripts', 'wptema_load_scripts');
      ``` 