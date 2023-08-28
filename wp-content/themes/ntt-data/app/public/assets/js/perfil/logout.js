const btnLogout = document.querySelector('#btn-logout-perfil');
btnLogout.addEventListener('click', function() {
  
  let route = document.homePath + '/wp-json';
   
  fetch(route + '/user/logout', {
      method: 'GET'
    })
      .then(data => window.location.assign('app'))
      .catch(error => console.error('Error on request:', error));
});