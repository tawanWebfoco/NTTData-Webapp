# O WORDPRESS TRABALHA COM UMA ESPECIE DE LOOP 
   * é como se todos os dados  **(nome do site, midia, informações, menus, paginas, posts...)** 
   que criassemos no dashboard fosse colocados dentro de um array e o wordpress usasse loop's  **(while, do while, foreach)** 
   para exibir
   ```php
         <!-- 
           if(have_posts()):
               while(have_posts()) : the_post();
                  ?>
                     <article>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content() ?>
                     </article>
                  <?php
               endwhile; 
      -->
   ```
   
   * é possivel criar um loop customizados
      - podemos fazer isto de algumas maneiras, porem
      devemos evitar usar a função "query_posts()" 

      - podemos usar a função "WP_Query()"
         ```php
            $args = array(
                     'post_type' => 'post',
                     'post_per_page' => 3, // quantidade de post por pagina
                     'category__in' => array( 6, 5 ,7), //atencao no nome abaixo possuí ( 2 underline )
                                                         /*
                                                         dentro deste array devemos passar o id das categorias que queremos adicionar.

                                                         para obter o id, devemos ir no dashboard > categorias e passar o mouse sobre os 
                                                         nomes, e no rodapé da pagina aparecerá o id
                                                         */
                     'category__not_in' => array(18) // aqui passamos as categorias que não queremos no loop
                  );

                  $postlist = new WP_Query( $args );
                     /*
                     if( $postlist->have_posts()):
                        while($postlist->have_posts()) : $postlist->the_post();
                           ?>
                              <article>
                                 <h1><?php the_title(); ?></h1>
                                 <?php the_content() ?>
                              </article>
                           <?php
                        endwhile; 
                        wp_reset_postdata(); //devemos sempre adicionar essa função para fechar o loop customizado, para evitar erros 
                     */
         ```
      
      - tambem podemos usar a função "get_posts()"
         - funciona de forma pareceida a "WP_Query()" mas alguns parametros ja vem com valores padronizados