<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
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
                <a href="#txen">THE ACTION</a>
                <a href="#sven">NTT DATA Team</a>
                <form action="" method="post">
                <select class="language" name="language">
                    <option name="espanish" id="espanish" >Español</option>
                    <option name="portuguese" id="portuguese">Português</option>
                    <option name="english" id="english" selected >English</option>    
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
        <section class="banner">

            <div class="video">
                <div class="header">
                    <video autoplay="" muted="" playsinline="" loop="" src="http://localhost/htdocs/Webfoco/nttdata/LP-site/wp-content/uploads/2023/07/nttdata-video1.mp4"></video>
                </div>

                <div class="content">
                    <div class="title">MOVE FOR THE SDGs</div>
                    <img  id="player"  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/play-circle-solid.png" alt="play">
                </div>
            </div>



        </section>
 
        <section class="downbanner">
            <p>You are invited to participate in our initiative in support of the United Nations' Sustainable Development Goals (SDGs). The action in 2022 was a great success, and now is the time to join, move, and encourage your colleagues, family, and friends to be part of this important movement.</p>
        </section>
        <section id="txen" class="textOne">
            <div class="container">
                <div class="top">
                    <div class="left">
                        <div class="titleOne">Be part of this great action of NTT DATA</div>
                        <div class="description">
                            <p>It all starts with a movement. And we want you to be part of this initiative that aims to unite our region again in support of the UN's Sustainable Development Goals. Our purpose is to contribute to a better society for everyone, valuing and supporting actions that promote physical and mental health and well-being for all.<br>Run, dance, jump, meditate, play with your children in the park, do fencing, paddle, volleyball, play soccer with your colleagues from work, skateboard, take your pets for a walk... move! Take care of your body and mind, encourage those around you to do the same, and participate in our action!</p>

                            <span>Every <strong>movement</strong> counts.</span>

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
                        <p>Join this initiative and help promote the importance of caring for each individual and our planet. Together, let's move for the SDGs!</p>

                        <span>WHAT ARE THE SDGs?</span>
                        <p>Established by the UN, the Sustainable Development Goals (SDGs) represent a global effort to end poverty, protect the environment and climate, and ensure that people everywhere can enjoy peace and prosperity, achieving a fairer and more sustainable future.</p>

                        <span>NTT DATA</span>
                        <p>We participate in the UN's 2030 Agenda, reconciling responsible technology with diverse talent. Highlighting nine SDGs, we collaborate on projects focused on four main areas: economic growth, quality education, diversity and inclusion, and social and governance issues. To learn more about NTT DATA's Environmental, Social, and Corporate Governance actions, we invite you to visit our website.</p>

                        <div id="btnTextOne">
                            <a href="https://br.nttdata.com/esg">LEARN MORE</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
      
        <section class="sectionVideo">
            <div class="container">

                <div class="top">
                    <div class="left">
                        <div class="titleOne">See our 2022 Move for the SDGs initiative:</div>
                        <p>Employees from all countries in the Americas Region participated between July 2022 and January 2023. Various local actions brought our teams together, by running, walking, swimming, dancing, playing football, volleyball, paddle, and more. As the closing action of the 2022 initiative, two employees from each country were selected to represent the NTT DATA Team that participated in the Miami Marathon.<br>This year, we want to increase our participation even more and reinforce the importance of the health and well-being of all of us, our families, and friends. We count on you to join forces in this incredible project!</p>

                    </div>
                    <div class="right">
                        <div class="video">
                            <video controls src="http://localhost/htdocs/Webfoco/nttdata/LP-site/wp-content/uploads/2023/07/nttdata-video2.mp4"></video>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="sven" class="sectionVideo">
            <div class="container">

                <div class="top reverse">
                    <div class="left reverse">
                        <div class="titleOne">NTT DATA Team</div>
                        <div class="titleTwo">We achieved over 6,000 hours of physical activities</div>

                        <p>During last year's campaign, our employees from the eight countries in the Americas Region  accumulated over 21 million seconds of exercise. Running groups, walking and trekking teams, soccer teams, paddle groups, yoga and meditation groups, and much more! Our athletes engaged in various types of activities, aiming to raise awareness about the importance of taking care of physical and mental health.</p>

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
                        <div class="titleOne">How to participate</div>
                        <p>Keep an eye on our internal communication channels, as you will soon have access to the details on how to be part of this initiative. But for now, start moving and taking even better care of your health.</p>
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
                    <div class="title">Participation Ranking</div>
                </div>
                <div class="bottom">
                    <div class="left">
                        <div class="column">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/location.png" alt="play">
                            <div class="number"><span>8</span></div>
                            <div class="text">Countries</div>
                        </div>
                        <div class="column">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/human-blue.png" alt="play">
                            <div class="number">
                                <p>+</p> <span>16</span>
                            </div>
                            <div class="text">thousand participants</div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="title">Every movement counts!</div>
                        <div class="sports">
                            <?php 
                                 $sports = [
                                    "Walk",
                                    "Pedal",
                                    "Training",
                                    "Dance",
                                    "Practice sports",
                                    "Run",
                                    "Swim",
                                    "Climb stairs",
                                    "Walk pets",
                                    "Meditate",
                                    "Plant a tree",
                                    "Collect garbage on the beach",
                                    "Do volunteer work",
                                    "Reduce CO2 emissions by walking short distances"
                                ];

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
                Be part of this transformation. Share!
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
                        <span>Follow our social networks in USA:</span>
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
                    <span>©Copyright 2023 NTT DATA All rights reserved</span>
                </div>
            </div>
        </div>


        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/script.js"></script>
</body>

</html>