# CRIANDO PAGINAS
   * para criar paginas com template diferentes é necessario criar um arquivo .php diferente
      - este deve seguir o padrão " page-{nome}.php " ex:
         - page-home.php 
         - page-contact.php
      
      - existe também outras paginas para exibição de templates
         - single.php
            - usado na visualização de post individual
         
         - search.php
            - usado na visualização da resposta de busca

         - archive.php
            - usado na visualização de arquivos de: autores, datas, categorias
            - ex: quando quisermos visualizar todos os post de um determinado autor

   * TAMBÉM PODEMOS CRIAR MODELOS DE PAGINAS
      - devemos criar um arquivo .php com qualquer nome
         "usar algum nome preferencialmente que remeta a tema ou template" ex:
            - general-template.php

      - dentro deste arquivo devemos abrir um comentario de multiplas linhas " /* */ " e colocar "Template Name: nome do template"
      ```php
      /* 
         Template Name: General Template
      */
      ```