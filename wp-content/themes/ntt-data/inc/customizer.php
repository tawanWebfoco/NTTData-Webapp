<?php 

function nttdata_customizer( $wp_customize ){
   // 1 INFORMAÇÂO DE CONTATO 
   $wp_customize->add_section(
      'sec_nav_info',
      array(
         'title' => 'Informação de Contato',
         'description' => 'Insira suas informações de contato!'
      )
   );

         $wp_customize->add_setting(
            'set_nav_phone',
            array(
               'type' => 'theme_mod',
               'default' => '(11) 91234-1234',
               'sanitize_callback' => 'sanitize_text_field'
            )
         );
         $wp_customize->add_control(
            'set_nav_phone',
            array(
               'label' => 'Telefone de contato',
               'description' => 'Por favor, insira um numero de telefone.',
               'section' => 'sec_nav_info',
               'type' => 'text'
            )
         );

         $wp_customize->add_setting(
            'set_nav_email',
            array(
               'type' => 'theme_mod',
               'default' => 'seuemail@dominio.com',
               'sanitize_callback' => 'sanitize_text_field'
            )
         );
         $wp_customize->add_control(
            'set_nav_email',
            array(
               'label' => 'E-mail',
               'description' => 'Por favor, insira seu endereço de email.',
               'section' => 'sec_nav_info',
               'type' => 'text'
            )
         );

         $wp_customize->add_setting(
            'set_nav_adress',
            array(
               'type' => 'theme_mod',
               'default' => 'Rua teste, 123 - SBC - SP',
               'sanitize_callback' => 'sanitize_text_field'
            )
         );
         $wp_customize->add_control(
            'set_nav_adress',
            array(
               'label' => 'Endereço',
               'description' => 'Por favor, insira o seu endereço.',
               'section' => 'sec_nav_info',
               'type' => 'text'
            )
         );
         
         $wp_customize->add_setting(
            'set_nav_time',
            array(
               'type' => 'theme_mod',
               'default' => 'Das 18:00 às 18:00',
               'sanitize_callback' => 'sanitize_text_field'
            )
         );
         $wp_customize->add_control(
            'set_nav_time',
            array(
               'label' => 'Horário de funcionamento',
               'description' => 'Por favor, insira o horário de funcionamento.',
               'section' => 'sec_nav_info',
               'type' => 'text'
            )
         );

         $wp_customize->add_setting(
            'set_nav_icon',
            array(
               'type' => 'theme_mod',
               'default' => '<i class="fa-solid fa-print"></i> ',
               'sanitize_callback' => 'sanitize_text_field'
            )
         );
         $wp_customize->add_control(
            'set_nav_icon',
            array(
               'label' => 'Icone',
               'description' => 'Por favor, insira a classe do seu icone.',
               'section' => 'sec_nav_info',
               'type' => 'text'
            )
         );
         
   // 2 COPYRIGHT
   $wp_customize->add_section(
      'sec_copyright',
      array(
         'title' => __('Copyright','ntt-data'),
         'description' => __('Altere seu copyright','ntt-data')
      )
   );

         $wp_customize->add_setting(
            'set_copyright',
            array(
               'type' => 'theme_mod',
               'default' => __('Copyright &copy; - Todos os direitos reservados', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_copyright',
            array(
               'label' => __('Informações de Copyright','ntt-data'),
               'description' => __('Por favor, digite seu copyright aqui.', 'ntt-data'),
               'section' => 'sec_copyright',
               'type' => 'text'
            )
         );

   // 3 SOBRE MIM
   $wp_customize->add_section(
      'sec_sobre_nos',
      array(
         'title' => __('Sobre nós','ntt-data')
         // 'description' => __('Descrição sobre sua empresa','ntt-data')
      )
   );

         $wp_customize->add_setting(
            'set_sobre_nos',
            array(
               'type' => 'theme_mod',
               'default' => __('Somos uma empresa de personalizações a 2 anos no mercado.', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_sobre_nos',
            array(
               'label' => __('Descrição sobre sua empresa','ntt-data'),
               'description' => __('Por favor, digite sua descrição aqui.', 'ntt-data'),
               'section' => 'sec_sobre_nos',
               'type' => 'textarea'
            )
         );


         // 4 Midia Social
   $wp_customize->add_section(
      'sec_social_midia',
      array(
         'title' => __('Mídia social','ntt-data'),
         'description' => __('Altere seu copyright','ntt-data')
      )
   );

         // facebook
         $wp_customize->add_setting(
            'set_social_facebook',
            array(
               'type' => 'theme_mod',
               'default' => __('https://www.facebook.com/', 'ntt-data'),
               'sanitize_callback' => 'esc_url_raw'
            )
         );

         $wp_customize->add_control(
            'set_social_facebook',
            array(
               'label' => __('Facebook','ntt-data'),
               'description' => __('Informe o endereço do seu Facebook.', 'ntt-data'),
               'section' => 'sec_social_midia',
               'type' => 'url'
            )
         );

         // instagram
         $wp_customize->add_setting(
            'set_social_instagram',
            array(
               'type' => 'theme_mod',
               'default' => __('https://www.instagram.com/', 'ntt-data'),
               'sanitize_callback' => 'esc_url_raw'
            )
         );

         $wp_customize->add_control(
            'set_social_instagram',
            array(
               'label' => __('Instagram','ntt-data'),
               'description' => __('Informe o endereço do seu Instragram.', 'ntt-data'),
               'section' => 'sec_social_midia',
               'type' => 'url'
            )
         );

         // pinterest
         $wp_customize->add_setting(
            'set_social_pinterest',
            array(
               'type' => 'theme_mod',
               'default' => __('https://br.pinterest.com/', 'ntt-data'),
               'sanitize_callback' => 'esc_url_raw'
            )
         );

         $wp_customize->add_control(
            'set_social_pinterest',
            array(
               'label' => __('Pinterest','ntt-data'),
               'description' => __('Informe o endereço do seu Pinterest.', 'ntt-data'),
               'section' => 'sec_social_midia',
               'type' => 'url'
            )
         );

         // 4 Color Site
   $wp_customize->add_section(
      'sec_color_background',
      array(
         'title' => __('Cores do site','ntt-data'),
         'description' => __('Altere seu copyright','ntt-data')
      )
   );

         // header
         $wp_customize->add_setting(
            'set_color_header_background',
            array(
               'type' => 'theme_mod',
               'default' => __('#c9a6c8', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_color_header_background',
            array(
               'label' => __('Fundo do cabeçalho','ntt-data'),
               'description' => __('Informe a cor de fundo do cabeçalho: nome ou hexadecimal (red, #ffffff).', 'ntt-data'),
               'section' => 'sec_color_background',
               'type' => 'text'
            )
         );
         
         $wp_customize->add_setting(
            'set_color_header_font',
            array(
               'type' => 'theme_mod',
               'default' => __('#fff', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_color_header_font',
            array(
               'label' => __('Fonte do cabeçalho','ntt-data'),
               'description' => __('Informe a cor da fonte do cabeçalho: nome ou hexadecimal (red, #ffffff).', 'ntt-data'),
               'section' => 'sec_color_background',
               'type' => 'text'
            )
         );

         // header top
         $wp_customize->add_setting(
            'set_color_header_top_background',
            array(
               'type' => 'theme_mod',
               'default' => __('#E15A71', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_color_header_top_background',
            array(
               'label' => __('Fundo do topo do cabeçalho','ntt-data'),
               'description' => __('Informe a cor de fundo do topo abeçalho: nome ou hexadecimal (red, #ffffff).', 'ntt-data'),
               'section' => 'sec_color_background',
               'type' => 'text'
            )
         );
         
         // font header top
         $wp_customize->add_setting(
            'set_color_header_top_font',
            array(
               'type' => 'theme_mod',
               'default' => __('#fff', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_color_header_top_font',
            array(
               'label' => __('Fonte do topo do cabeçalho','ntt-data'),
               'description' => __('Informe a cor da fonte do topo abeçalho: nome ou hexadecimal (red, #ffffff).', 'ntt-data'),
               'section' => 'sec_color_background',
               'type' => 'text'
            )
         );

         // footer background
         $wp_customize->add_setting(
            'set_color_footer_background',
            array(
               'type' => 'theme_mod',
               'default' => __('#000', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_color_footer_background',
            array(
               'label' => __('Fundo do rodapé','ntt-data'),
               'description' => __('Informe a cor de fundo do rodapé: nome ou hexadecimal (red, #ffffff).', 'ntt-data'),
               'section' => 'sec_color_background',
               'type' => 'text'
            )
         );
         // footer title
         $wp_customize->add_setting(
            'set_color_footer_title_color',
            array(
               'type' => 'theme_mod',
               'default' => __('#fff', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_color_footer_title_color',
            array(
               'label' => __('Titulo do rodapé','ntt-data'),
               'description' => __('Informe a cor da fonte do titulo do rodapé: nome ou hexadecimal (red, #ffffff).', 'ntt-data'),
               'section' => 'sec_color_background',
               'type' => 'text'
            )
         );
         // footer text
         $wp_customize->add_setting(
            'set_color_footer_text_color',
            array(
               'type' => 'theme_mod',
               'default' => __('#b9babc', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_color_footer_text_color',
            array(
               'label' => __('Texto do rodapé','ntt-data'),
               'description' => __('Informe a cor do texto do rodapé: nome ou hexadecimal (red, #ffffff).', 'ntt-data'),
               'section' => 'sec_color_background',
               'type' => 'text'
            )
         );

           // icone titulo
           $wp_customize->add_setting(
            'set_color_footer_icon_title',
            array(
               'type' => 'theme_mod',
               'default' => __('#d10024', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_color_footer_icon_title',
            array(
               'label' => __('Icone do titulo','ntt-data'),
               'description' => __('Informe a cor do icone do titulo: nome ou hexadecimal (red, #ffffff).', 'ntt-data'),
               'section' => 'sec_color_background',
               'type' => 'text'
            )
         );

         // icon header and footer
         $wp_customize->add_setting(
            'set_color_footer_icon_header_footer',
            array(
               'type' => 'theme_mod',
               'default' => __('#d10024', 'ntt-data'),
               'sanitize_callback' => 'sanitize_text_field'
            )
         );

         $wp_customize->add_control(
            'set_color_footer_icon_header_footer',
            array(
               'label' => __('Icones cabeçalho e rodapé','ntt-data'),
               'description' => __('Informe a cor do icone do cabeçalho e rodapé: nome ou hexadecimal (red, #ffffff).', 'ntt-data'),
               'section' => 'sec_color_background',
               'type' => 'text'
            )
         );
       
}
add_action( 'customize_register', 'nttdata_customizer' );