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
                        <div id="cron-hours" class="hours">00</div>
                        <div class="separate">:</div>
                        <div id="cron-minutes" class="minuts">00</div>
                        <div class="separate">:</div>
                        <div id="cron-seconds" class="seconds">00</div>
                    </div>
                    <div class="numberlite">
                        <div id="cron-milliseconds" class="miliSecond">99</div>
                    </div>
                </div>
            </div>

            <div class="actions">
                <img id="cron-play" class="actionIcon"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/img/icons/cron/play.svg"
                    alt="Imagem">
                <img id="cron-pause" class="actionIcon"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/img/icons/cron/stop.svg"
                    alt="Imagem">
                <img id="cron-stop" class="actionIcon"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/img/icons/cron/stop.svg"
                    alt="Imagem">
            </div>

            <div class="title">Lorem ipsum dolor</div>

            <div class="buttons">
                <button class="button dark-blue" id="btn-add-10-minutes">10 Minutos</button>
                <button class="button dark-blue" id="btn-add-30-minutes">30 Minutos</button>
                <button class="button dark-blue" id="btn-add-1-hour">1 Hora</button>
            </div>
            <div class="text">
                <span>LIMITE DIÁRIO DE 2 HORAS EXERCÍCIOS</span>
            </div>
            <div class="regulation">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/cron/regulation.svg"
                    alt="Icone Regulamento">
                <span>Leia o regulamento</span>
            </div>
            <!-- <div class="ilust">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\ilust/cron-hand.png" alt="Ilustração Mão com cronometro">
            </div> -->
        </div>

        <div class="bottom">

        </div>
    </section>
</div>
<?php
?>
<script>
    Document.prototype.homePath = "<?= home_url() ?>";
    Document.prototype.userWebApp = "<?php echo $user->id_user . ',' . $user->full_name . ',' .  $user->email . ',' .  $user->country . ',' .  $user->score . ',' .  $user->time  ?>"; 
    
    
    
    
</script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/global.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/components/userStorage.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/cron/timerStorage.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/cron/timerController.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/cron/timerView.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/cron/index.js"></script>