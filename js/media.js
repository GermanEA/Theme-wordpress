

// Evento para hacer activo el LI del menú de medios

const sidebarVideo = document.querySelector('.sidebar-videos-list');
const sidebarVideoWrapper = document.querySelectorAll('.sidebar-video-wrapper');

sidebarVideoWrapper[0].classList.add('is-active');

sidebarVideo.addEventListener('click', (event) => {

    const target = event.target.parentElement;

    sidebarVideoWrapper.forEach( elem => elem.classList.remove('is-active') );
    target.classList.add('is-active');

});