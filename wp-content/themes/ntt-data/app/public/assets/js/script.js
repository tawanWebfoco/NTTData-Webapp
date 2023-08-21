    // const pageView = document.querySelector('.overflow .view')
    let arrayNavMenu = document.querySelectorAll('nav.menu li');
    arrayNavMenu = Array.from(arrayNavMenu);

    // Obtenha a URL atual
    const urlParams = new URLSearchParams(window.location.search);

    // Obtenha o valor do parâmetro "page"
    const pageParam = urlParams.get('page');

    arrayNavMenu.forEach(navMenu => {
        navMenu.addEventListener('click', () =>{
            let page = navMenu.id.replace("nav", "");
            let currentUrl = window.location.href;
             currentUrl = currentUrl.split('?')[0];
            console.log(currentUrl);

            window.location.href = currentUrl + '?' + page;
            
        })
    });

