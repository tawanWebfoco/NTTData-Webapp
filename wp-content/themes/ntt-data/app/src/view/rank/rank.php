<div id="rank" class="main">
    <section class="rank">
        <div class="content">
            <div class="top">
                <h1><?=_t['rank_h1']?></h1>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/rank/rank.svg" alt="Icone Regulamento">
            </div>
            <div class="yourRank">
                <div class="score">
                    <div class="number"><?= $user->score ?></div>
                    <div class="text"><?=_t['rank_pontosmaius']?></div>
                </div>
                <div class="desc"><?=_t['rank_suapontuacao']?></div>
            </div>
            <div class="yourCountryRank">
                <div class="score">
                    <div class="number">70%</div>
                    <div class="text"><?=_t['rank_pontosmaius']?></div>
                </div>
                <div class="desc"><?=_t['rank_taxaseupais']?></div>
            </div>
            <div class="otherCountryRank">
                <div class="cards">
                    <div class="country">
                        <div class="score">
                            <div class="number">80%</div>
                            <div class="text"><?=_t['registro_frm_bra']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text"><?=_t['registro_frm_per']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">60%</div>
                            <div class="text"><?=_t['registro_frm_mex']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text"><?=_t['registro_frm_chi']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text"><?=_t['registro_frm_col']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text"><?=_t['registro_frm_arg']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text"><?=_t['registro_frm_equ']?></div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text"><?=_t['registro_frm_usa']?></div>
                        </div>
                    </div>
                  
                    
                </div>
                <div class="desc"><?=_t['rank_taxaoutros']?></div>
            </div>
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
                
                <div class="seeMorePublish">
                    <span><?=_t['rank_vermais']?></span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/arrow-down.svg" alt="Icon Arrow Down">
                </div>
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
        </div>
    </section>
</div>