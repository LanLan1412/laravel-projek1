const hamburger = document.querySelector('#hamburger');
const sidenav = document.querySelector('.sidebar');
hamburger.addEventListener('click', () => {
  sidenav.classList.toggle('show');
})

window.addEventListener('click', (e) => {
  if (e.target != hamburger && e.target != sidenav) {
  }
})

// Slick
$(document).ready(function(){
  $('.your-class').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    pauseOnHover: false,
    arrows: false
  });
});
