// const hamburger = document.querySelector('#hamburger');
// const sidenav = document.querySelector('.sidebar');
// hamburger.addEventListener('click', () => {
//   sidenav.classList.toggle('show');
// })

// window.addEventListener('click', (e) => {
//   if (e.target != hamburger && e.target != sidenav) {
//   }
// })
// window.addEventListener("click", function (e) {
//   if (e.target != hamburger && e.target != sidenav) {
//     nav.classList.remove("show");
//   }
// });

// Slick
$(document).ready(function(){
  $('.your-class').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    pauseOnHover: false,
    arrows: false
  });
});
