  <!-- <div class="newsletter-container">
        <h2>Siga-nos nas redes sociais</h2>
        <div class="social-media">
            <a href="<?php echo esc_attr(get_theme_mod( 'set_social_facebook', 'https://www.facebook.com/' )); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="<?php echo esc_attr(get_theme_mod( 'set_social_instagram', 'https://www.instagram.com/' )); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="<?php echo esc_attr(get_theme_mod( 'set_social_pinterest', 'https://br.pinterest.com/' )); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a>
        </div>
    </div> -->
  
  <!-- FOOTER -->
  <footer class="footer">
    
    <nav class="menu">
        <ul>
            <?php 
            $page = isset(parse_url($_SERVER['REQUEST_URI'])['query']) ? parse_url($_SERVER['REQUEST_URI'])['query'] : 'feed'; ?>
            <li id="navfeed" class=" <?= ($page === 'feed') ? 'active': ''; ?>" ><i class="fi fi-rr-home"></i></li>
            <li id="navrank" class=" <?= ($page === 'rank') ? 'active': ''; ?>" ><i class="fi fi-rr-trophy"></i></li>
            <li id="navcron" class=" <?= ($page === 'cron') ? 'active': ''; ?>" ><i class="fi fi-rr-clock-three"></i></li>
            <li id="navperfil" class=" <?= ($page === 'perfil') ? 'active': ''; ?>" ><i class="fi fi-rr-user"></i></li>
        </ul>
    </nav>
        <!-- <div class="footer-bottom">
            <p><?php echo esc_html(get_theme_mod( 'set_copyright', __('Copyright X - All Rights Reserved', 'wp-tema') )) ;?></p>
        </div> -->
    </footer>

    <script src="<?= get_stylesheet_directory_uri(); ?>/app/public/assets/js/script.js"></script>

    
<?php wp_footer() ;?>
</body>
</html>