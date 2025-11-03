let sigUp_create = document.getElementById("sigUp-create");
let sigIn_in = document.getElementById("sigIn-in");
let form_title = document.getElementById("form-title");
let form_register = document.getElementById("form-register");
let form_login = document.getElementById("form-login");
sigUp_create.onclick = function () {
  form_register.style.position = "relative";
  form_register.style.opacity = "1";
  form_login.style.position = "absolute";
  form_login.style.opacity = "0";
  form_title.innerHTML = "Registro";
};
sigIn_in.onclick = function () {
  form_register.style.position = "absolute";
  form_register.style.opacity = "0";
  form_login.style.position = "relative";
  form_login.style.opacity = "1";
  form_title.innerHTML = "Iniciar Sesión";
};
