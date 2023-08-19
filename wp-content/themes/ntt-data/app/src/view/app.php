<?php get_header(); ?>

            <div class="overflow">

                <div class="view">
                    
                    <!-- PAGE FEED -->
                    <?php   require_once(dirname(__FILE__,2) .'/view/feed/feed.php'); ?> 
                 
                    <!-- PAGE RANK -->
                    <?php  require_once(dirname(__FILE__,2) .'/view/rank/rank.php'); ?> 
                    
                    <!-- PAGE CRON -->
                    <?php  require_once(dirname(__FILE__,2) .'/view/cron/cron.php'); ?> 

                    <!-- PAGE PERFIL -->
                    <?php  require_once(dirname(__FILE__,2) .'/view/perfil/perfil.php'); ?> 
                </div>
            </div>
                

<?php get_footer() ;?>


<script>

    const pageView = document.querySelector('.overflow .view')
    let arrayNavMenu = document.querySelectorAll('nav.menu li');
    arrayNavMenu = Array.from(arrayNavMenu);

    arrayNavMenu.forEach(navMenu => {
        
        navMenu.addEventListener('click', () =>{
            arrayNavMenu.forEach(navMenu => {
                navMenu.classList.remove('active')
            })

            navMenu.classList.toggle('active')
            const attributeId = navMenu.getAttribute('id')

            console.log(attributeId);
            console.log(pageView);

            switch (attributeId) {
                case 'navHome':
                    pageView.style.transform ='translateX(0vw)';
                    break;
                case 'navRank':
                    pageView.style.transform = 'translateX(-100vw)';
                    break;
                case 'navCron':
                    pageView.style.transform = 'translateX(-200vw)';
                    break;
                case 'navPerfil':
                    pageView.style.transform = 'translateX(-300vw)';
                    break;
            }

        })
    });

</script>
