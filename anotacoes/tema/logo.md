# CRIANDO LOGO
   * para criar o logo também adicionar o 'METODO' add_theme_suppor() dentro da 'CLASSE' wptema_configs()
      ```php
         add_theme_support( 'custom-logo',array(
            'width' => 200,
            'height' => 110,
            'flex-height' => true,
            'flex-width' => true
         ));
      ```
      - estes parametros indica o tamanho ideal do logo, porem permitem alteração.

   * após isso será habilitado uma sessão na parte de customização do dashboard
      - dashboard > aparencia > customização > identificação do site
