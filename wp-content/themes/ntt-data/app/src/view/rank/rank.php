<div id="rank" class="main">
    <section class="rank">
        <div class="content">
            <div class="top">
                <h1><?=_t['rank_h1']?></h1>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/rank/rank.svg" alt="Icone Regulamento">
            </div>
            <div class="yourRank">
                <div class="score">
                    <div class="number"><?= !($user->score <= 0) ? $user->score : 0 ?></div>
                    <div class="text"><?=_t['rank_pontosmaius']?></div>
                    
                </div>
                <div class="desc"><?=_t['rank_suapontuacao']?></div>
            </div>
            <div class="yourCountryRank">
                <div class="boxScore pie animate" style="--p: <?= $percentCountries[strtolower($user->country)] ; ?>">
                    <div class="number"><?= $percentCountries[strtolower($user->country)] ; ?><span>%</span></div>
                    <div class="text"><?=_t['rank_pontosmaius']?></div>
                </div>
                <div class="desc"><?=_t['rank_taxaseupais']?></div>
            </div>
            <div class="otherCountryRank">
                <div class="cards">
                    <?php foreach ($percentCountries as $key => $percent) :  ; ?>
                    <?php
                        $countryName = '';
                        switch ($key) {
                            case 'argentina':
                                $countryName = 'registro_frm_arg';
                            break;
                            case 'brasil':
                                $countryName = 'registro_frm_bra';
                            break;
                            case 'chile':
                                $countryName = 'registro_frm_chi';
                            break;
                            case 'colombia':
                                $countryName = 'registro_frm_col';
                            break;
                            case 'equador':
                                $countryName = 'registro_frm_equ';
                            break;
                            case 'mexico':
                                $countryName = 'registro_frm_mex';
                            break;
                            case 'peru':
                                $countryName = 'registro_frm_per';
                            break;
                            case 'estados unidos':
                                $countryName = 'registro_frm_usa';
                            break;
                            
                        }
                        if($key == strtolower($user->country))continue;
                    ?>
                        <div class="country">
                            <div class="boxScore pie animate" style="--p: <?= $percent ?>">
                                <div class="number"><?= $percent ?><span>%</span></div>
                                <div class="text"><?=_t[$countryName]?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <!-- <div class="country">
                        <div class="boxScore pie animate" style="--p: <?= $percentCountries['brasil'] ?>">
                            <div class="number"><?= $percentCountries['brasil'] ?><span>%</span></div>
                            <div class="text"><?=_t['registro_frm_bra']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="boxScore pie animate" style="--p: <?= $percentCountries['chile'] ?>">
                            <div class="number"><?= $percentCountries['chile'] ?><span>%</span></div>
                            <div class="text"><?=_t['registro_frm_chi']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="boxScore pie animate" style="--p: <?= $percentCountries['colombia'] ?>">
                            <div class="number"><?= $percentCountries['colombia'] ?><span>%</span></div>
                            <div class="text"><?=_t['registro_frm_col']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="boxScore pie animate" style="--p: <?= $percentCountries['equador'] ?>">
                            <div class="number"><?= $percentCountries['equador'] ?><span>%</span></div>
                            <div class="text"><?=_t['registro_frm_equ']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="boxScore pie animate" style="--p: <?= $percentCountries['mexico'] ?>">
                            <div class="number"><?= $percentCountries['mexico'] ?><span>%</span></div>
                            <div class="text"><?=_t['registro_frm_mex']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="boxScore pie animate" style="--p: <?= $percentCountries['peru'] ?>">
                            <div class="number"><?= $percentCountries['peru'] ?><span>%</span></div>
                            <div class="text"><?=_t['registro_frm_per']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="boxScore pie animate" style="--p: <?= $percentCountries['estados unidos'] ?>">
                            <div class="number"><?= $percentCountries['estados unidos'] ?><span>%</span></div>
                            <div class="text"><?=_t['registro_frm_usa']?></div>
                        </div>
                    </div> -->
                  
                    
                </div>
                <div class="desc"><?=_t['rank_taxaoutros']?></div>
            </div>
            <?php 
            if (get_class($user) === 'User') :; ?>
            <div class="allRank">
                <h3><?=_t['rank_rankgeral']?></h3>
                <ul>
                    <?php foreach ($RankTopUser as $key => $userInfo) : ;?>
                       
                    <li>
                        <div class="ordinary"><?= $key+1 ?>º</div>
                        <div class="name"><?= $userInfo->full_name ?></div>
                        <div class="score">
                            <div class="number"><?= $userInfo->score ?></div>
                            <div class="text"><?=_t['rank_pontosminus']?></div>
                        </div>
                    </li>
                    <?php endforeach ; ?>
                   
                </ul>
                
                <!--div class="seeMorePublish">
                    <span><?=_t['rank_vermais']?></span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/arrow-down.svg" alt="Icon Arrow Down">
                </div-->
            </div>
            <div class="howYourScore">
                <h3><?=_t['rank_entendapontos']?></h3>
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/rank/watch.svg" alt="Icone Regulamento">
                    <div class="desc"><?=_t['rank_entenda1min']?> =<span>1 <?=_t['rank_ponto']?></span></div>
                </div>
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/rank/list-pen.svg" alt="Icone Regulamento">
                    <div class="desc"><?=_t['rank_entenda1pub']?> =<span>10 <?=_t['rank_pontosminus']?></span></div>
                </div>
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/rank/user-check.svg" alt="Icone Regulamento">
                    <div class="desc"><?=_t['rank_entenda1ind']?> =<span>50 <?=_t['rank_pontosminus']?></span></div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</div>