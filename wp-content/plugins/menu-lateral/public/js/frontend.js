window.onload = () => {
  let secciones_menu = document.querySelectorAll('.secciones-menu');
  for(let i = 0; i < secciones_menu.length; i++) {
    console.log(secciones_menu[i]);
    secciones_menu[i].addEventListener('click', function(e){
      console.log(e.target);
    });
  }
}
