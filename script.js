const botonmenu = document.getElementById("boton");
const nav = document.getElementById("main_nav");

botonmenu.addEventListener("click", () => {
  nav.classList.toggle("mostrar")
});


const botonborrar = document.getElementById("boton_b");
botonborrar.addEventListener ("click", () => {

  alert ("Se borrará el usuario")

});
