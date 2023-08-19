let bannerPlayer = document.querySelector(' #player')
let banner = document.querySelector('.banner .video')
let html = document.querySelector('html');



bannerPlayer.addEventListener('click' , function(){
    const container = document.createElement('div');
    const video = document.createElement('video');

    container.className = 'bannerContainerVideo';
    video.className = 'bannerVideo';
    video.setAttribute('src','http://localhost/htdocs/Webfoco/nttdata/LP-site/wp-content/uploads/2023/07/ESG-PROJECT-Americas-Internal-Talent-VFinal.mp4');
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
