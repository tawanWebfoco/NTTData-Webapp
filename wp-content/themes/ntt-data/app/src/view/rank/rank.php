<div id="rank" class="main">
    <section class="rank">
        <div class="content">
            <div class="top">
                <h2>Ranking</h2>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/rank/rank.svg" alt="Icone Regulamento">
            </div>
            <div class="yourRank">
                <div class="score">
                    <div class="number"><?= $user->score ?></div>
                    <div class="text">PONTOS</div>
                </div>
                <div class="desc">Sua Pontuação Total</div>
            </div>
            <div class="yourCountryRank">
                <div class="score">
                    <div class="number">70%</div>
                    <div class="text">PONTOS</div>
                </div>
                <div class="desc">Taxa de Engajamento do seu País</div>
            </div>
            <div class="otherCountryRank">
                <div class="cards">
                    <div class="country">
                        <div class="score">
                            <div class="number">80%</div>
                            <div class="text">Brasil</div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">60%</div>
                            <div class="text">Peru</div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text">México</div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text">México</div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text">México</div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text">México</div>
                        </div>
                    </div>
                    <div class="country">
                        <div class="score">
                            <div class="number">75%</div>
                            <div class="text">México</div>
                        </div>
                    </div>
                  
                    
                </div>
                <div class="desc">Taxa de Engajamento dos demais Países</div>
            </div>
            <div class="allRank">
                <h3>Ranking Geral</h3>
                <ul>
                    <?php foreach ($RankTopUser as $key => $userInfo) : ;?>
                       
                    <li>
                        <div class="ordinary"><?= $key+1 ?>º</div>
                        <div class="name"><?= $userInfo->full_name ?></div>
                        <div class="score">
                            <div class="number"><?= $userInfo->score ?></div>
                            <div class="text">pontos</div>
                        </div>
                    </li>
                    <?php endforeach ; ?>
                   
                </ul>
                
                <div class="seeMorePublish">
                    <span>Ver Mais</span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/feed/arrow-down.svg" alt="Icon Arrow Down">
                </div>
            </div>
            <div class="howYourScore">
                <h3>Entenda a Pontuação</h3>
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/rank/watch.svg" alt="Icone Regulamento">
                    <div class="desc">1 Minuto de Exercício =<span>1 ponto</span></div>
                </div>
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/rank/list-pen.svg" alt="Icone Regulamento">
                    <div class="desc">1 Publicação =<span>10 pontos</span></div>
                </div>
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/app/public\assets\img\icons/rank/user-check.svg" alt="Icone Regulamento">
                    <div class="desc">1 Indicação concretizada =<span>50 pontos</span></div>
                </div>
            </div>
        </div>
    </section>
</div>