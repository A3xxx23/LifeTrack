const menuIcon = document.querySelector('#menu-icon');
const navbar = document.querySelector('.navbar');
const navbg = document.querySelector('.nav-bg');
menuIcon.addEventListener('click', () => {
  menuIcon.classList.toggle('bx-x');
  navbar.classList.toggle('active');
  navbg.classList.toggle('active');
});

var typed = new Typed('.text-animation', {
    strings: ['Frontend Dev', ' Web Designer ', ' UX Designer ' , ' UI Designer '],
    typeSpeed: 80,
    backSpeed: 100,
    backDelay: 1200,
    loop: true,
  });
  


  