# CRIANDO MINIATURAS ( THUMBNAILS )
   * para criar miniaturas é necessario adicionar o 'METODO' add_theme_suppor() dentro da 'CLASSE' wptema_configs()
      ```php
         add_theme_support( 'post-thumbnails' );
      ```
   
   * depois precisamos informar onde queremos que seja exibido essas miniaturas no nosso tema
      - para isso devemos ir em nosso template e inserir o codigo
         ```php
         <?php the_post_thumbnail( array(275,275) ); ?>
         ```
      - este parametro é opcional e informa qual sera o tamanho da miniatura
      - caso não informe nenhum parametro ele recebera algum valor padrão pre-estabelecido no dashboard.