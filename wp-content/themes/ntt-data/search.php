<?php get_header() ;?>

<div class="products-grid">
   <h2><?php esc_html_e('Resultado da pesquisa por', 'ntt-data') ;?>: <?php echo get_search_query() ;?></h2>
        <div class="products-grid-container">
  
         <?php 
         $preco = get_post_meta(get_the_ID(), 'produtos_person_preco', true);
         $descricao = get_post_meta(get_the_ID(), 'produtos_person_descricao', true) === '' ? ' - ' : get_post_meta(get_the_ID(), 'produtos_person_descricao', true) ;


            while( have_posts()):
               the_post();

               $infos = array(
                  'id' => get_the_ID(),
                  'title' => get_the_title(),
                  'descricao' => $descricao,
                  'preco' => $preco,
               );
               
               ?>

<div class="products-grid-card">
           <?php if( has_post_thumbnail() ){
                the_post_thumbnail('thumb');
            }; ?>
            <p class="category"><?php the_category(); ?></p>
            <h3 class="product-name"><?php the_title(); ?></h3>
            <h6 class="description"><?php echo esc_html($descricao); ?></h6>
            <p class="product-price">R$: <?php echo esc_html($preco); ?></p>
            <!-- <div class="rating-box">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div> -->
            <button class="btn" onclick="sendMessage(`<?php print_r($infos['id']);?>`,`<?php print_r($infos['title']);?>`,`<?php print_r($infos['preco']);?>`,`<?php print_r($infos['descricao']);?>`)">Comprar</button>
        </div>

               <?php
            endwhile;
     
            the_posts_pagination();

         ;?>
      
   </div>
</div>

<?php get_footer() ;?>
