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
                    <video  autoplay=""  muted autoplay muted="" playsinline="" loop="" src="https://moveforthesdg.com/wp-content/uploads/2023/08/video-banner.mp4"></video>
                </div>

                <div class="content">
                    <div class="title">MUÉVETE POR LOS ODS</div>
                    <img  id="player"  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/play-circle-solid.png" alt="play">
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
                    video.setAttribute('src','https://moveforthesdg.com/wp-content/uploads/2023/08/MoveForThe-SDG-ES.mp4');
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
                <p>Acompaña nuestra cuenta regresiva y prepárate para sumar puntos:</p>
            </div>
            <div class="right">
                <div class="day">
                    <div class="number">00</div>
                    <div class="desc">Días</div>
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
                    console.log(dataFinal);
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
                    <img id="roda" src="https://moveforthesdg.com/wp-content/uploads/2023/08/Roda_ODS_ES.png" alt="Objetivos de desenvolvimento sustentável">
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
                                ['3', 'Salud y Bienestar', 'Promover el bienestar y una vida saludable para todas las personas de todas las edades, con indicadores para evaluar el progreso.'],
                                ['4', 'Educación de Calidad', 'Garantizar una educación inclusiva, equitativa y de calidad, y promover oportunidades de aprendizaje a lo largo de la vida para todos.'],
                                ['5', 'Igualdad de Género', 'Lograr la igualdad de género y empoderar a todas las mujeres y niñas.'],
                                ['8', 'Trabajo Decente y Crecimiento Económico', 'Promover un crecimiento económico inclusivo y sostenible, el empleo y el trabajo decente para todos.'],
                                ['9', 'Industria, Innovación e Infraestructura', 'Construir infraestructuras resilientes, promover la industrialización sostenible y fomentar la innovación.'],
                                ['10', 'Reducción de la Desigualdad', 'Reducir la desigualdad dentro y entre los países.'],
                                ['11', 'Ciudades y Comunidades Sostenibles', 'Hacer que las ciudades sean más inclusivas, seguras, resilientes y sostenibles.'],
                                ['13', 'Acción por el Clima', 'Tomar medidas urgentes para combatir el cambio climático y sus impactos.'],
                                ['17', 'Alianzas para los Objetivos', 'Revitalizar la Alianza Mundial para el Desarrollo Sostenible.']
                            ];
                            foreach ($ods as $key => $value) {
                                ?>
                                 <div class="card">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/box-ods/es/SDG-ES-<?= $ods[$key][0];?>.svg" alt="Caixa ODS-<?= $ods[$key][0];?>">
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
                        <p>Únete a esta importante iniciativa y ayuda a promover la importancia de cuidar a cada individuo y nuestro planeta. ¡Juntos, nos moveremos por los ODS!</p>

                        <span>¿QUÉ SON LOS ODS?</span>
                        <p>Establecidos por la ONU, los Objetivos de Desarrollo Sostenible (ODS) representan un esfuerzo global para poner fin a la pobreza, proteger el medio ambiente y el clima, y garantizar que las personas en todas partes puedan disfrutar de paz y prosperidad, logrando un futuro más justo y sostenible.</p>

                        <span>NTT DATA</span>
                        <p>Participamos en la Agenda 2030 de la ONU, conciliando tecnología responsable con diversidad de talento. Destacando 9 ODS, colaboramos en proyectos enfocados en 4 áreas principales: crecimiento económico, educación de calidad, diversidad e inclusión, temas sociales y gobernanza. Para obtener más información sobre las acciones de Gobernanza Ambiental, Social y Corporativa de NTT DATA, te invitamos a visitar nuestro sitio web.</p>

                        <div id="btnTextOne">
                        <?php
                            $diaDoMes = date('j');

                            if ($diaDoMes >= 1 && $diaDoMes <= 4) {
                                ?><a href="https://ar.nttdata.com/esg" target="_blank">SABER MÁS</a><?php
                            } elseif ($diaDoMes >= 5 && $diaDoMes <= 8) {
                                ?><a href="https://cl.nttdata.com/esg" target="_blank">SABER MÁS</a><?php
                            } elseif ($diaDoMes >= 9 && $diaDoMes <= 12) {
                                ?><a href="https://co.nttdata.com/esg" target="_blank">SABER MÁS</a><?php
                            } elseif ($diaDoMes >= 13 && $diaDoMes <= 16) {
                                ?><a href="https://pe.nttdata.com/esg" target="_blank">SABER MÁS</a><?php
                            } elseif ($diaDoMes >= 17 && $diaDoMes <= 20) {
                                ?><a href="https://mexico.nttdata.com/esg" target="_blank">SABER MÁS</a><?php
                            } elseif ($diaDoMes >= 21 && $diaDoMes <= 24) {
                                ?><a href="https://ec.nttdata.com/esg" target="_blank">SABER MÁS</a><?php
                            } elseif ($diaDoMes >= 25 && $diaDoMes <= 28) {
                                ?><a href="https://emeal.nttdata.com/esg" target="_blank">SABER MÁS</a><?php
                            } else {
                                ?><a href="https://es.nttdata.com/esg" target="_blank">SABER MÁS</a><?php
                            }
                            ?>


                         <!--<a href="https://br.nttdata.com/esg" target="_blank">SABER MÁS</a> -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
      
        <section class="sectionVideo">
            <div class="container">

                <div class="top">
                    <div class="left">
                        <div class="titleOne">Cómo fue en 2022</div>
                        <p>Los colaboradores de todos los países de la Región Américas participaron entre Julio de 2022 y Enero de 2023. Varias acciones locales unieron a nuestros equipos, corriendo, caminando, nadando, bailando, jugando fútbol, voleibol, pádel, ¡y más! Como acción de clausura de la iniciativa en 2022, se seleccionaron 2 colaboradores de cada país para formar el Equipo NTT DATA, que participó en la Maratón de Miami.<br>Este año, queremos aumentar aún más tu participación y reforzar la importancia de cuidar la salud y el bienestar de todos nosotros, nuestras familias y amigos. ¡Contamos con tu presencia para unir nuestras fuerzas en este increíble proyecto!</p>

                    </div>
                    <div class="right">
                    <video controls poster="http://moveforthesdg.com/wp-content/uploads/2023/07/Captura-de-tela-2023-07-31-103848.png" src="http://moveforthesdg.com/wp-content/uploads/2023/07/nttdata-video2.mp4">
                            </video>
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
                        <p>Mantente atento a nuestros canales de comunicación, pronto tendrás acceso a todos los detalles para ser parte de esta iniciativa.<br>Pero desde ahora, empieza a moverte y cuidar aún más de tu salud.
</p>
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
                                    "Realiza trabajos voluntarios",
                                    "Planta un árbol",
                                    "Recoge basura en la playa",
                                    "Hacer recogida selectiva",
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
                        <div class="title">...y más actividades!</div>
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
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-nttdata-white.png" alt="Logo NTTData">
                        <span>Company</span>
                    </div>
                    <div class="right">
                        <span>Sigue nuestras redes sociales en LATAM:</span>
                        <div class="redes">
                            <a href="https://www.instagram.com/nttdata.latam/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/instagram.svg" alt="instagram"></a>
                            <a href="https://www.facebook.com/nttdata.latam" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/facebook.svg" alt="facebook"></a>
                            <a href="https://www.youtube.com/c/NTTDATALATAM" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/youtube.svg" alt="youtube"></a>
                            <a href="https://www.tiktok.com/@nttdata_latam" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/tiktok.svg" alt="tiktok"></a>
                            <a href="https://www.linkedin.com/company/76533648" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icones/linkedin.svg" alt="linkedin"></a>
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