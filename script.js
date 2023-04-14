const btnIniciarSesion = document.getElementById("btn_iniciar-sesion");
const btnRegistrarse = document.getElementById("btn__registrarse");
const contenedorLoginRegister = document.querySelector(".contenedor__login-register");
const cajaTraseraLogin = document.querySelector(".caja__trasera-login");
const cajaTraseraRegister = document.querySelector(".caja__trasera-register");

const formularioLogin = document.querySelector(".formulario__login");
const formularioRegister = document.querySelector(".formulario__register");

function ajustarContenido() {
  if (window.innerWidth > 850) {
    cajaTraseraLogin.style.display = "block";
    cajaTraseraRegister.style.display = "block";
  } else {
    cajaTraseraRegister.style.display = "block";
    cajaTraseraRegister.style.opacity = "1";
    cajaTraseraLogin.style.display = "none";
    formularioLogin.style.display = "block";
    formularioRegister.style.display = "none";
    contenedorLoginRegister.style.left = "0px";
  }
}

ajustarContenido();

function iniciarSesion() {
  if (window.innerWidth > 850) {
    formularioRegister.style.display = "none";
    contenedorLoginRegister.style.left = "10px";
    formularioLogin.style.display = "block";
    cajaTraseraRegister.style.opacity = "1";
    cajaTraseraLogin.style.opacity = "0";
  } else {
    formularioRegister.style.display = "none";
    contenedorLoginRegister.style.left = "0px";
    formularioLogin.style.display = "block";
    cajaTraseraRegister.style.display = "block";
    cajaTraseraLogin.style.display = "none";
  }
}

function registrarse() {
  if (window.innerWidth > 850) {
    formularioRegister.style.display = "block";
    contenedorLoginRegister.style.left = "410px";
    formularioLogin.style.display = "none";
    cajaTraseraRegister.style.opacity = "0";
    cajaTraseraLogin.style.opacity = "1";
  } else {
    formularioRegister.style.display = "block";
    contenedorLoginRegister.style.left = "0px";
    formularioLogin.style.display = "none";
    cajaTraseraRegister.style.display = "none";
    cajaTraseraLogin.style.display = "block";
    cajaTraseraLogin.style.opacity = "1";
  }
}

btnIniciarSesion.addEventListener("click", iniciarSesion);
btnRegistrarse.addEventListener("click", registrarse);
window.addEventListener("resize", ajustarContenido);
