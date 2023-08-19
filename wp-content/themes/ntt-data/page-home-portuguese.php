<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTT DATA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/home.css">
    <?php wp_head(); ?>
</head>

<body>
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
                    <video autoplay="" muted="" playsinline="" loop="" src="http://localhost/htdocs/Webfoco/nttdata/LP-site/wp-content/uploads/2023/07/nttdata-video1.mp4"></video>
                </div>

                <div class="content">
                    <div class="title">MOVA-SE PELOS ODS</div>
                    <a href="#banner"><img id="player" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/play-circle-solid.png" alt="play"></a>
                </div>
            </div>

    

        </section>
 
        <section class="downbanner">
            <p>Você está convidado para participar da nossa iniciativa em prol dos Objetivos de Desenvolvimento Sustentável, da ONU. A ação em 2022 foi um grande sucesso, e agora é a hora de participar, de se movimentar e incentivar aos seus colegas, familiares e amigos a se juntarem a esse importante movimento.</p>
        </section>
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
                        <img id="roda" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ODS3.png" alt="Objetivos de desenvolvimento sustentável">
                        <img id="desc" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Logo-ODS-Desc.png" alt="Objetivos de desenvolvimento sustentável">
                    </div>
                </div>

            </div>



        </section>
        <section class="sectionCards">
            <div class="container">
                <div class="left">
                    <div class="cards">
                        <div class="card">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/SDG-3.svg" alt="Caixa ODS">
                            <div class="content">
                                <div class="title">Saúde e bem-estar</div>
                                <div class="desc">Promover bem-estar e uma vida saudável para todas as pessoas, de todas as
                                    idades, com indicadores para avaliar o progresso.</div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/SDG-4.svg" alt="Caixa ODS">
                            <div class="content">
                                <div class="title">Educação de qualidade</div>
                                <div class="desc">Garantir uma educação inclusiva, equitativa e de qualidade, e promover
                                    oportunidades de aprendizagem ao longo da vida para todos.</div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/SDG-5.svg" alt="Caixa ODS">
                            <div class="content">
                                <div class="title">Igualdade de gênero</div>
                                <div class="desc">Alcançar a igualdade de gênero e empoderar todas as mulheres e meninas.</div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/SDG-8.svg" alt="Caixa ODS">
                            <div class="content">
                                <div class="title">Trabalho decente e crescimento econômico</div>
                                <div class="desc">Promover o crescimento econômico inclusivo e sustentável, o emprego e o
                                    trabalho decente para todos.</div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/SDG-9.svg" alt="Caixa ODS">
                            <div class="content">
                                <div class="title">Indústria, inovação e infraestruturas</div>
                                <div class="desc">Construir infra estruturas resilientes, promover a industrialização sustentável e
                                    fomentar a inovação.</div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/SDG-10.svg" alt="Caixa ODS">
                            <div class="content">
                                <div class="title">Redução das desigualdades</div>
                                <div class="desc">Reduzir a desigualdade dentro e entre os países.</div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/SDG-11.svg" alt="Caixa ODS">
                            <div class="content">
                                <div class="title">Cidades e comunidades sustentáveis</div>
                                <div class="desc">Tornar as cidades mais inclusivas, seguras, resilientes e sustentáveis.</div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/SDG-13.svg" alt="Caixa ODS">
                            <div class="content">
                                <div class="title">Ação pelo clima</div>
                                <div class="desc">Adotar medidas urgentes para combater as mudanças climáticas e seus efeitos.</div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/SDG-17.svg" alt="Caixa ODS">
                            <div class="content">
                                <div class="title">Alianças para alcançar os objetivos</div>
                                <div class="desc">Revitalizar a Aliança Mundial para o Desenvolvimento Sustentável.</div>
                            </div>
                        </div>
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
                            <a href="https://br.nttdata.com/esg">SAIBA MAIS</a>
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
                        <div class="video">
                            <video controls src="http://localhost/htdocs/Webfoco/nttdata/LP-site/wp-content/uploads/2023/07/nttdata-video2.mp4" ></video>
                        </div>
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
                        <p>Fique de olho nos nossos canais internos de comunicação, pois em breve você terá acesso a todos os detalhes de como fazer parte dessa iniciativa.<br>Mas, a partir de agora, já comece a se movimentar e cuidar ainda mais da sua saúde.</p>
                        <div class="img">
                            <img id="logo-movethesdg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Logo_ODS" alt="logo move for the sdg">
                        </div>

                    </div>
                    <div class="right">
                        <div class="video">
                            <video controls src="http://localhost/htdocs/Webfoco/nttdata/LP-site/wp-content/uploads/2023/07/ESG-PROJECT-Americas-Internal-Talent-VFinal.mp4"></video>
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
                                 $sports = ['Caminhar', 'Pedalar', 'Treinar', 'Dançar', 'Praticar esportes', 'Correr', 'Nadar','Subir escadas', 'Passear com animais de estimação', 'Meditar', 'Trabalho voluntário', 'Plantar uma árvore', 'Recolher lixo das praias', 'Faça coleta seletiva', 'Reduza a emissão de CO² andando curtas distancias'];

                                 $icons = ['caminhar', 'pedalar', 'treinar', 'dancar', 'pratesport', 'correr', 'nadar','subirescadas', 'passearanimais', 'meditar', 'trabalhovoluntario', 'plantar', 'recolherlixo', 'coletaseletiva', 'reduzaco'];

                                 foreach ($sports as $key => $value):
                            ?>
                                <div>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/movimento/<?= $icons[$key];?>.png" alt="<?= $value;?>">
                                    <div class="text"><?= $value; ?></div>
                                </div>
                            <?php endforeach;?>

                        </div>
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
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Logo-NTTData-White.svg" alt="Logo NTTData">
                        <span>Company</span>
                    </div>
                    <div class="right">
                        <span>Siga Nossas Redes Sociais:</span>
                        <div class="redes">
                            <a href="https://www.instagram.com/nttdata.brasil/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/instagram.svg" alt="instagram"></a>
                            <a href="https://www.facebook.com/nttdatabrazil"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/facebook.svg" alt="facebook"></a>
                            <a href="https://www.youtube.com/c/NTTDATABrasil"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/youtube.svg" alt="youtube"></a>
                            <a href="https://www.tiktok.com/@nttdata.brasil"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/tiktok.svg" alt="tiktok"></a>
                            <a href="https://www.linkedin.com/company/76533648"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/linkedin.svg" alt="linkedin"></a>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <span>©Copyright 2023 NTT DATA Todos os direitos reservados</span>
                </div>
            </div>
        </div>


        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/script.js"></script>
</body>

</html>