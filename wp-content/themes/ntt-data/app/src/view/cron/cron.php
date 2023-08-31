<div id="cron" class="main">
    <section class="cron">
        <div class="content">
            <div class="top">
                <h1><?=_t['cron_h1']?></h1>
            </div>
            <hr>
            <div class="numberCenter">
                <div class="numbers line">
                    <div class="numberBig">
                        <div id="cron-hours" class="hours hidden">00</div>
                        <div class="separate hour hidden">:</div>
                        <div id="cron-minutes" class="minuts hidden">00</div>
                        <div class="separate min hidden">:</div>
                        <div id="cron-seconds" class="seconds">00</div>
                         <div class="separate sec">:</div>
                        <!-- <div id="cron-centseconds" class="miliSecond">00</div>  -->
                    </div>
                    <div class="numberlite">
                        <div id="cron-centseconds" class="miliSecond">00</div>
                    </div>
                </div>
            </div>

            <div class="actions">
                <img id="cron-play" class="actionIcon"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/img/icons/cron/play.svg"
                    alt="Imagem">
                <img id="cron-pause" class="actionIcon hidden"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/img/icons/cron/pause.svg"
                    alt="Imagem">
                <img id="cron-stop" class="actionIcon"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/img/icons/cron/stop.svg"
                    alt="Imagem">
            </div>

            <div class="title"><?=_t['cron_title']?></div>

            <div class="buttons">
                <button class="button dark-blue btn-disabled" id="btn-add-10-minutes">10 <?=_t['cron_minutes']?></button>
                <button class="button dark-blue btn-disabled" id="btn-add-30-minutes">30 <?=_t['cron_minutes']?></button>
                <button class="button dark-blue btn-disabled" id="btn-add-1-hour">1 <?=_t['cron_hour']?></button>
            </div>
            <div class="text">
                <span><?=_t['cron_limit_day']?></span>
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
<?php
?>

<script>
    Document.prototype.homePath = "<?= home_url() ?>";
    Document.prototype.userWebApp = "<?php echo $user->id_user . ',' . $user->full_name . ',' .  $user->email . ',' .  $user->country . ',' .  $user->score . ',' .  $user->time  ?>"; 
    Document.prototype.currentTimeFromDb = "<?= $currentTimeFromDb ?>";
</script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/cron/newConfirm.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/global.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/components/userStorage.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/cron/timerStorage.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/cron/timerController.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/cron/timerView.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/app/public/assets/js/cron/index.js"></script>