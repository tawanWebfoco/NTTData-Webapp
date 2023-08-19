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
                <a href="#txes">LA ACCIÓN</a>
                <a href="#sves">NTT DATA Team</a>
                <form action="" method="post">
                <select class="language" name="language">
                    <option name="espanish" id="espanish" selected >Español</option>
                    <option name="portuguese" id="portuguese">Português</option>
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
        <section class="banner">

            <div class="video">
                <div class="header">
                    <video  autoplay="" muted="" playsinline="" loop="" src="http://localhost/htdocs/Webfoco/nttdata/LP-site/wp-content/uploads/2023/07/nttdata-video1.mp4"></video>
                </div>

                <div class="content">
                    <div class="title">MUÉVETE POR LOS ODS</div>
                    <img  id="player"  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/play-circle-solid.png" alt="play">
                </div>
            </div>



        </section>
 

       


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
                    <div class="number">00:</div>
                    <div class="desc">Horas</div>
                    
                </div>
                <div class="separate">
                    <div class="number">:</div>
                    <div class="desc"></div>
                </div>
                <div class="minute">
                    <div class="number">00:</div>
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
        iniciarContagemRegressiva('2023-09-04');
    </script>
        <section id="txes" class="textOne">
            <div class="container">
                <div class="top">
                    <div class="left">
                        <div class="titleOne">Únete al gran movimiento de NTT DATA</div>
                        <div class="description">
                            <p>Todo comienza con un movimiento. Queremos que formes parte de esta iniciativa que busca unir una vez más a nuestra región en favor de los Objetivos de Desarrollo Sostenible de la ONU. <br>Nuestro propósito es contribuir a una sociedad mejor para todos, valorando y apoyando acciones que promuevan la salud y el bienestar físico y mental de todos.<br>
¡Corre, baila, salta, medita, juega con tus hijos en el parque, practica esgrima, pádel, voleibol, juega fútbol con tus compañeros de trabajo, skateboard, lleva a tu mascota a dar un paseo... Muévete! Cuida tu cuerpo y mente, incentiva a quienes te rodean a hacer lo mismo, ¡y participa en nuestra acción!</p>

                            <span>Cada  <strong>movimiento</strong> cuenta.</span>

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
                        <p>Únete a esta importante iniciativa y ayuda a promover la importancia de cuidar a cada individuo y nuestro planeta. ¡Juntos, nos moveremos por los ODS!</p>

                        <span>¿QUÉ SON LOS ODS?</span>
                        <p>Establecidos por la ONU, los Objetivos de Desarrollo Sostenible (ODS) representan un esfuerzo global para poner fin a la pobreza, proteger el medio ambiente y el clima, y garantizar que las personas en todas partes puedan disfrutar de paz y prosperidad, logrando un futuro más justo y sostenible.</p>

                        <span>NTT DATA</span>
                        <p>Participamos en la Agenda 2030 de la ONU, conciliando tecnología responsable con diversidad de talento. Destacando 9 ODS, colaboramos en proyectos enfocados en 4 áreas principales: crecimiento económico, educación de calidad, diversidad e inclusión, temas sociales y gobernanza. Para obtener más información sobre las acciones de Gobernanza Ambiental, Social y Corporativa de NTT DATA, te invitamos a visitar nuestro sitio web.</p>

                        <div id="btnTextOne">
                            <a href="https://br.nttdata.com/esg">SABER MÁS</a>
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
                        <p>Los colaboradores de todos los países de la Región Américas participaron entre Julio de 2022 y Enero de 2023. Varias acciones locales unieron a nuestros equipos, corriendo, caminando, nadando, bailando, jugando fútbol, voleibol, pádel, ¡y más! Como acción de clausura de la iniciativa en 2022, se seleccionaron 2 colaboradores de cada país para formar el Equipo NTT DATA, que participó en la Maratón de Miami.<br>Este año, queremos aumentar aún más tu participación y reforzar la importancia de cuidar la salud y el bienestar de todos nosotros, nuestras familias y amigos. ¡Contamos con tu presencia para unir nuestras fuerzas en este increíble proyecto!</p>

                    </div>
                    <div class="right">
                        <div class="video">
                            <video controls poster="http://localhost/htdocs/Webfoco/nttdata/LP-site/wp-content/uploads/2023/07/Group-2-1.jpg">
                                <source src="http://localhost/htdocs/Webfoco/nttdata/LP-site/wp-content/uploads/2023/07/nttdata-video2.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="sves" class="sectionVideo">
            <div class="container">

                <div class="top reverse">
                    <div class="left reverse">
                        <div class="titleOne">NTT DATA Team</div>
                        <div class="titleTwo">Alcanzamos más de 6,000 horas de actividades físicas</div>

                        <p>Durante la campaña del año pasado, nuestros colaboradores de los 8 países de la Región Américas participaron en la dinámica y, juntos, acumularon más de 21 millones de segundos de ejercicio.
¡Grupos de carrera, caminata y senderismo, equipos de fútbol, pádel, grupos de yoga y meditación, y mucho más! Nuestros atletas practicaron diversas actividades con el objetivo de crear conciencia sobre la importancia de cuidar la salud y el bienestar físico y mental.
</p>

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
                        <div class="titleOne">Cómo participar</div>
                        <p>Mantente atento a nuestros canales de comunicación internos, pronto tendrás acceso a todos los detalles para ser parte de esta iniciativa.<br>Pero desde ahora, empieza a moverte y cuidar aún más de tu salud.
</p>
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
                    <div class="title">Ranking de participaciones</div>
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
                        <div class="title">¡Cada movimiento cuenta!</div>
                        <div class="sports">
                            <?php 
                                 $sports = [
                                    "Caminar",
                                    "Pedal",
                                    "Entrenamiento",
                                    "Bailar",
                                    "Practicar deportes",
                                    "Correr",
                                    "Nadar",
                                    "Subir escaleras",
                                    "Pasear a las mascotas",
                                    "Meditar",
                                    "Planta un árbol",
                                    "Recoge basura en la playa",
                                    "Realiza trabajos voluntarios",
                                    "Reduce las emisiones de CO2 caminando distancias cortas"
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
                Sé el comienzo de la transformación. ¡Comparte!
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
                        <span>Sigue nuestras redes sociales en LATAM:</span>
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
                    <span>©Copyright 2023 NTT DATA. All rights reserved</span>
                </div>
            </div>
        </div>


        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/script.js"></script>
</body>

</html>