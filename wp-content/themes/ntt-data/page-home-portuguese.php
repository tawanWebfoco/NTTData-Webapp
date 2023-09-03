<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>NTT DATA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/home.css">
    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KMN7QKBD');</script>
<!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KMN7QKBD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php wp_body_open(); ?>
    <div class="header">
        <div class="container">
            <div class="logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Logo-NTTData.svg" alt="Logo NTTData">
            </div>

            <nav class="menu">
                <a href="#txpt">A Ação</a>
                <a href="#svpt">NTT DATA Team</a>
                <form action="" method="post">
                <select class="language" name="language">
                    <option name="espanish" id="espanish"  >Español</option>
                    <option name="portuguese" id="portuguese" selected >Português</option>
                    <option name="english" id="english"  >English</option>    
                </select>

                </form>
               
                <a id="login" class="disabled">Login</a>
                <img class="disabled" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/profile.svg" alt="icone perfil">
            </nav>
        </div>
    </div>

    <script>
  const selectElement = document.querySelector(".language");
  const formElement = document.querySelector(".menu form");

  selectElement.addEventListener("change", function () {
    formElement.submit();
  });
</script>

    <div class="main">
        <section id="banner" class="banner">

            <div class="video">
                <div class="header">
                    <video autoplay="" muted autoplay muted="" playsinline="" loop="" src="https://moveforthesdg.com/wp-content/uploads/2023/08/video-banner.mp4"></video>
                </div>

                <div class="content">
                    <div class="title">MOVA-SE PELOS ODS</div>
                    <a href="#banner"><img id="player" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/play-circle-solid.png" alt="play"></a>
                </div>
            </div>

    

        </section>

        <script>
                let bannerPlayer = document.querySelector(' #player')
                let banner = document.querySelector('.banner .video')
                let html = document.querySelector('html');



                bannerPlayer.addEventListener('click' , function(){
                    const container = document.createElement('div');
                    const video = document.createElement('video');

                    container.className = 'bannerContainerVideo';
                    video.className = 'bannerVideo';
                    video.setAttribute('src','https://moveforthesdg.com/wp-content/uploads/2023/08/MoveForThe-SDG-PT.mp4');
                    video.setAttribute('autoplay','');
                    video.setAttribute('playsinline','');
                    video.setAttribute('controls','');
                    html.classList.toggle('disabled');

                    container.appendChild(video);
                    banner.appendChild(container)

                    container.addEventListener('click', function(event){
                    if(event.target.className == 'bannerContainerVideo'){
                        container.remove();
                        html.classList.toggle('disabled');
                    }
                
                })
                });
            </script>
 
 <section class="downbanner">
            <div class="left">
                <p>Acompanhe nossa contagem e prepare-se para somar pontos:</p>
            </div>
            <div class="right">
                <div class="day">
                    <div class="number">00</div>
                    <div class="desc">Dias</div>
                </div>
                <div class="hours">
                    <div class="number">00</div>
                    <div class="desc">Horas</div>
                    
                </div>
                <div class="separate">
                    <div class="number">:</div>
                    <div class="desc"></div>
                </div>
                <div class="minute">
                    <div class="number">00</div>
                    <div class="desc">Minutos</div>
                    
                </div>
                <div class="separate">
                    <div class="number">:</div>
                    <div class="desc"></div>
                </div>
                <div class="second">
                    <div class="number">00</div>
                    <div class="desc">Segundos</div>
                </div>
            </div>
        </section>
        <script>
        function iniciarContagemRegressiva(dataFinal) {
                    const contador = setInterval(function() {
                    const agora = new Date().getTime();
                    dataFinal = new Date(dataFinal);
                    const diferenca = dataFinal - agora;

                    const day = document.querySelector('.downbanner .right .day .number');
                    const hours = document.querySelector('.downbanner .right .hours .number');
                    const minute = document.querySelector('.downbanner .right .minute .number');
                    const second = document.querySelector('.downbanner .right .second .number');

                if (diferenca < 0) {
                    clearInterval(contador);
                    document.querySelector('.downbanner p').innerHTML = "Tempo Expirado!";
                } else {
                    let dias = Math.floor(diferenca / (1000 * 60 * 60 * 24));
                    let horas = Math.floor((diferenca % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    let minutos = Math.floor((diferenca % (1000 * 60 * 60)) / (1000 * 60));
                    let segundos = Math.floor((diferenca % (1000 * 60)) / 1000);


                   
                    if(dias < 10){
                        dias = '0' + dias;
                    }
                    if(horas < 10){
                        horas = '0' + horas;
                    }
                    if(minutos < 10){
                        minutos = '0' + minutos;
                    }
                    if(segundos < 10){
                        segundos = '0' + segundos;
                    }
                    day.innerHTML = `${dias}`;
                    hours.innerHTML = `${horas}`;
                    minute.innerHTML = `${minutos}`;
                    second.innerHTML = `${segundos}`;
                   
                }
            }, 1000); 
        }
        iniciarContagemRegressiva('2023-09-04T00:00:00');
    </script>
        <section id="txpt" class="textOne">
            <div class="container">
                <div class="top">
                    <div class="left">
                        <div class="titleOne">Faça parte do grande movimento da NTT DATA</div>
                        <div class="description">
                            <p>Tudo começa com um movimento. E queremos que você seja parte dessa iniciativa que visa unir mais uma vez nossa região em prol dos Objetivos de Desenvolvimento Sustentável da ONU.<br>Nosso propósito é contribuir para uma sociedade melhor para todos, valorizando e apoiando as ações que promovem a saúde e o bem-estar físico e mental de todos.<br>
                                Corra, dance, pule, medite, brinque com os filhos no parque, faça esgrima, pádel, vôlei, jogue futebol com os colegas do trabalho, ande de skate, leve seu animal de estimação para passear... Movimente-se! Cuide do corpo e da mente, incentive o seu entorno a fazer o mesmo e participe da nossa ação!</p>

                            <span>Todo <strong>movimento</strong> conta.</span>

                        </div>

                    </div>
                    <div class="right">
                         <img id="roda" src="https://moveforthesdg.com/wp-content/uploads/2023/08/Roda_ODS_PT.png" alt="Objetivos de desenvolvimento sustentável">
                        
                    </div>
                </div>

            </div>



        </section>
        <section class="sectionCards">
            <div class="container">
                <div class="left">
                    <div class="cards">
                    <?php 
                            $ods = [
                                ['3', 'Saúde e bem-estar', 'Promover bem-estar e uma vida saudável para todas as pessoas, de todas as idades, com indicadores para avaliar o progresso.'],
                                ['4', 'Educação de qualidade', 'Garantir uma educação inclusiva, equitativa e de qualidade, e promover oportunidades de aprendizagem ao longo da vida para todos.'],
                                ['5', 'Igualdade de gênero', 'Alcançar a igualdade de gênero e empoderar todas as mulheres e meninas.'],
                                ['8', 'Trabalho decente e crescimento econômico', 'Promover o crescimento econômico inclusivo e sustentável, o emprego e o trabalho decente para todos.'],
                                ['9', 'Indústria, inovação e infraestruturas', 'Construir infraestruturas resilientes, promover a industrialização sustentável e fomentar a inovação.'],
                                ['10', 'Redução das desigualdades', 'Reduzir a desigualdade dentro e entre os países.'],
                                ['11', 'Cidades e comunidades sustentáveis', 'Tornar as cidades mais inclusivas, seguras, resilientes e sustentáveis.'],
                                ['13', 'Ação pelo clima', 'Adotar medidas urgentes para combater as mudanças climáticas e seus efeitos.'],
                                ['17', 'Alianças para alcançar os objetivos', 'Revitalizar a Aliança Mundial para o Desenvolvimento Sustentável.']
                            ];
                            
                            
                            foreach ($ods as $key => $value) {
                                ?>
                                <div class="card">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/pt/SDG-PT-<?= $ods[$key][0];?>.svg" alt="Caixa SDG-<?= $ods[$key][0];?>">
                                    <div class="content">
                                        <div class="title"><?= $ods[$key][1];?></div>
                                        <div class="desc"><?= $ods[$key][2];?></div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="right">
                    <div class="description">
                        <p>Una-se a essa importante iniciativa e ajude a promover a importância de cuidarmos de cada indivíduo e do nosso planeta. Juntos, vamos nos mover pelos ODS!</p>

                        <span> O QUE SÃO OS ODS?</span>
                        <p>Estabelecidos pela ONU, os Objetivos de Desenvolvimento Sustentável (ODS) representam um esforço global para acabar com a pobreza, proteger o meio ambiente e o clima, e garantir que as pessoas, em todos os lugares, possam desfrutar de paz e de prosperidade, alcançando um futuro mais justo e sustentável.</p>

                        <span>A NTT DATA </span>
                        <p>Participamos da Agenda 2030, da ONU, conciliando tecnologia responsável com talento diverso. Destacando 9 ODS, colaboramos com projetos direcionados para 4 áreas principais: crescimento econômico, educação de qualidade, diversidade e inclusão, questões sociais e governança. Para saber mais sobre as ações de Governança Ambiental, Social e Corporativa da NTT DATA, te convidamos a visitar o nosso site.</p>

                        <div id="btnTextOne">
                            <a href="https://br.nttdata.com/esg" target="_blank">SAIBA MAIS</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
      
        <section class="sectionVideo">
            <div class="container">

                <div class="top">
                    <div class="left">
                        <div class="titleOne">Veja como foi em 2022</div>
                        <p>Colaboradores de todos os países da Região Américas participaram entre os meses de julho de 2022 e janeiro de 2023. Diversas ações locais uniram nossas equipes que correram, caminharam, nadaram, dançaram, disputaram partidas de futebol, vôlei, padel etc. E como ação de encerramento da iniciativa em 2022, foram selecionados 2 colaboradores de cada país, que formaram o NTT DATA Team, que participaram da Maratona de Miami. <br>Esse ano, queremos aumentar ainda mais a sua participação, e reforçarmos a importância dos cuidados com a saúde e bem-estar de todos nós, de nossas famílias e amigos. Contamos com a sua presença para unirmos nossas forças nesse incrível projeto!</p>

                    </div>
                    <div class="right">
                        <video controls poster="http://moveforthesdg.com/wp-content/uploads/2023/07/Captura-de-tela-2023-07-31-103848.png" src="http://moveforthesdg.com/wp-content/uploads/2023/07/nttdata-video2.mp4">
                            </video>
                    
                    </div>
                </div>

            </div>
        </section>
        <section id="svpt" class="sectionVideo">
            <div class="container">

                <div class="top reverse">
                    <div class="left reverse">
                        <div class="titleOne">NTT DATA Team</div>
                        <div class="titleTwo">Alcançamos mais de 6.000 horas de atividades físicas</div>

                        <p>Durante a campanha no ano passado, nossos colaboradores dos 8 países da Região Américas fizeram parte da dinâmica e, juntos, acumularam mais de 21 milhões de segundos de exercícios. Grupos de corrida, de caminhada e de trekking, equipes de futebol, de padel, grupos de yoga e meditação e muito mais! Nossos atletas praticaram diversos tipos de atividades, com o objetivo de reforçar a consciência sobre a importância de cuidar da saúde e do bem-estar físico e mental.</p>

                    </div>
                    <div class="right">
                        <div class="video">
                        <?php echo do_shortcode('[smartslider3 slider="2"]');?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
       
        <section class="sectionVideo">
            <div class="container">

                <div class="top">
                    <div class="left">
                        <div class="titleOne">Como participar</div>
                        <p>Fique de olho nos nossos canais de comunicação, pois em breve você terá acesso a todos os detalhes de como fazer parte dessa iniciativa.<br>Mas, a partir de agora, já comece a se movimentar e cuidar ainda mais da sua saúde.</p>
                        <div class="img">
                        <img id="logo-movethesdg" src="http://moveforthesdg.com/wp-content/uploads/2023/07/MicrosoftTeams-image.png" alt="logo move for the sdg">
                        </div>

                    </div>
                    <div class="right">
                    <div class="video">
                            <video controls poster="http://moveforthesdg.com/wp-content/uploads/2023/07/Captura-de-tela-2023-07-31-104502.png"  src="http://moveforthesdg.com/wp-content/uploads/2023/07/ESG-PROJECT-Americas-Internal-Talent-VFinal.mp4"></video>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="ranking">
            <div class="container">
                <div class="top">
                    <div class="title">RANKING DE PARTICIPAÇÕES</div>
                </div>
                <div class="bottom">
                    <div class="left">
                        <div class="column">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/location.png" alt="play">
                            <div class="number"><span>8</span></div>
                            <div class="text">Países</div>
                        </div>
                        <div class="column">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/human-blue.png" alt="play">
                            <div class="number">
                                <p>+ de</p> <span>16</span>
                            </div>
                            <div class="text">mil participantes</div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="title">Cada Movimento conta!</div>
                        <div class="sports">
                            <?php 
                                 $sports = [
                                     'Caminhar',
                                     'Pedalar',
                                     'Treinar',
                                     'Dançar',
                                     'Praticar esportes',
                                     'Correr',
                                     'Nadar',
                                     'Subir escadas',
                                     'Passear com animais de estimação',
                                     'Meditar',
                                     'Trabalho voluntário',
                                     'Plantar uma árvore',
                                     'Recolher lixo das praias',
                                  'Faça coleta seletiva',
                                  'Reduza a emissão de CO² andando curtas distancias'];
                                  
                                  $icons = ['caminhar', 'pedalar', 'treinar', 'dancar', 'pratesport', 'correr', 'nadar','subirescadas', 'passearanimais', 'meditar', 'trabalhovoluntario', 'plantar', 'recolherlixo', 'coletaseletiva', 'reduzaco'];
                                  
                                  foreach ($sports as $key => $value):
                                    ?>
                                <div>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/movimento/<?= $icons[$key];?>.png" alt="<?= $value;?>">
                                    <div class="text"><?= $value; ?></div>
                                </div>
                                <?php endforeach;?>
                            </div>
                            <div class="title">...e mais atividades!</div>
                        
                    </div>
                </div>
            </div>
        </section>
        <div id="bottom" class="bottom">
                <div class="titleLastYear">
                Seja o início da transformação. Compartilhe!
                </div>
            </div>

        <div class="footer">
            <div class="container">

                <div class="top">
                    <div class="left">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-nttdata-white.png" alt="Logo NTTData">
                        <span>Company</span>
                    </div>
                    <div class="right">
                        <span>Siga Nossas Redes Sociais:</span>
                        <div class="redes">
                            <a href="https://www.instagram.com/nttdata.brasil/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/instagram.svg" alt="instagram"></a>
                            <a href="https://www.facebook.com/nttdatabrazil" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/facebook.svg" alt="facebook"></a>
                            <a href="https://www.youtube.com/c/NTTDATABrasil" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/youtube.svg" alt="youtube"></a>
                            <a href="https://www.tiktok.com/@nttdata.brasil" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/tiktok.svg" alt="tiktok"></a>
                            <a href="https://www.linkedin.com/company/76533648" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/linkedin.svg" alt="linkedin"></a>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <span>©Copyright 2023 NTT DATA Todos os direitos reservados</span>
                </div>
            </div>
        </div>


        <!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/script.js"></script> -->
</body>

</html>