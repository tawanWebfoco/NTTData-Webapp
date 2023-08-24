<div id="cron" class="main">
    <section class="cron">
        <div class="content">
            <div class="top">
                <h2>Cronometro</h2>
            </div>
            <hr>
            <div class="numberCenter">
                <div class="numbers">

                    <div class="numberBig">
                        <div class="hours">00</div>
                        <div class="separate">:</div>
                        <div class="minuts">00</div>
                        <div class="separate">:</div>
                        <div class="seconds">00</div>
                    </div>
                    <div class="numberlite">
                        <div class="miliSecond">99</div>
                    </div>

                </div>
            </div>

            <div class="actions">
                <img id="play" class="actionIcon" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/cron/play.svg" alt="Imagem">
                <img id="stop" class="actionIcon" src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/cron/stop.svg" alt="Imagem">
            </div>
            
            <div class="title">Lorem ipsum dolor</div>
            
            <div class="buttons">
                <button class="button dark-blue" id="ten">10 Minutos</button>
                <button class="button dark-blue" id="thirty">30 Minutos</button>
                <button class="button dark-blue" id="oneHour">1 Hora</button>
            </div>
            <div class="text">
                <span>LIMITE DIÁRIO DE 2 HORAS EXERCÍCIOS</span>
            </div>
            
            <?php   require_once(dirname(__FILE__,2) .'/template/regulation.php'); ?> 

            <!-- <div class="ilust">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\ilust/cron-hand.png" alt="Ilustração Mão com cronometro">
            </div> -->
        </div>
        <div class="bottom">
            
        </div>
    </section>
</div>