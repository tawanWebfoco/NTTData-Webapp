# ARQUIVO FUNCTION.PHP
  * ## *existem varias funções/metodos padrões do WP, algumas para chamar o titulo, subtitulo, comentario, pagina, enfileirar, posts e muito mais*

   * Este arquivo é muito importante na criação de temas pois é nele em que adicionamos as ferramentas de edição ao dashboard do wordpress

   * nele é usado um sistema de "enfileiramento / pilhas de comando"
   
   * é com ele que inserimos também o nosso arquivo de estilo (css), e as interações (javascript)


   * utilizamos nesse arquivo uma função de nome add_action() que adiciona os nossos codigos a "fila" do tema
      - devemos passar pelo menos dois parametros
         - o primeiro se refere ao momento em que nosso codigo deve ser executado

            - devemos olhar na documentação do wordpress pois já existem esses momentos pré estabelecidos ( ou o arquivo script-loader.php)

            - os momentos mais utilizados são:
               ```php
                  wp_enqueue_scripts() // carregar o css e js
                  after_setup_theme() // adicionar algumas ferramentas de suporte ao tema
                  widgets_init() // adicionar os sidebar no tema
               ```
            

         - o segundo passamos o nosso codigo que encapsulamos em uma outra função
            - aqui neste exemplo irei associalos como uma classe ( pois possuí funções dentro dela )
            
            - como boas praticas nosso codigo leva o nome do tema no inicio e seu objetivo (resumido) por exemplo:

               ```php
                  function wptema_config()
                  function wptema_load_scripts()
                  function wptema_sidebars()
                  function wptema_config()

                  function wptema_codigo_encapsulado(){
                     //codigos aqui...
                  }
               ``` 
            - e chamamos ele assim
               ```php
                  add_action('momento_da_execução', 'wptema_codigo_encapsulado');
               ```
