window.addEventListener('scroll', function(){
    var navtop = document.querySelector('navtop');
    menu.classList.toggle('d-none', window.scrollY > 0);
  })