# CRIANDO MENU
   * para criar o menu é necessario criar uma 'CLASSE'
      - também utilizaremos essa classe para configurar ferramentas do tema por isso chamaremos ela de:
      ```php
         wptema_configs()
      ```

   * após criar a 'CLASSE' precisamos inserir um 'METODO' padrão do WP, e nela passar um array como parametro sendo cada indice um menu
      ```php
         register_nav_menus(
            array(
               'wp_tema_main_menu' => 'Main Menu',
               'wp_tema_footer_menu' => 'Footer Menu'
            )
         );    
      ```

   * após criar esse array nosso menu já aparecerá no dashboard do WP