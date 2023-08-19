# CRIANDO CABECALHO COM IMAGEM
   * para adicionar uma imagem ou banner no cabecalho devemos inserir o 'METODO' add_theme_support() dentro da 'CLASSE' wptema_configs()
      ```php
         $args = array(
            'height' => 225,
            'width' => 1920
         );
         
         add_theme_support( 'custom-header', $args );
      ```
   * após isso será habilitado uma sessão na parte de customização do dashboard
      - dashboard > aparencia > customização