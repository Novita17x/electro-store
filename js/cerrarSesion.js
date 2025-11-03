// Obtener el botón "Cerrar sesión" por su ID
var cerrarSesionBtn = document.getElementById("cerrarSesionBtn");

// Obtener el botón "Cancelar" por su ID
var cancelarBtn = document.getElementById("cancelarBtn");

// Obtener el modal por su ID
var modal = document.getElementById("myModal");

// Obtener el elemento con la clase "close" dentro del modal
var closeButton = modal.querySelector(".close");

// Agregar un event listener para detectar el clic en el botón "Cerrar sesión"
cerrarSesionBtn.addEventListener("click", function() {
    // Redirigir a cerrarsesion.php
    window.location.href = "./php/cerrarsesion.php";
});

// Agregar un event listener para detectar el clic en el botón "Cancelar"
cancelarBtn.addEventListener("click", function() {
    // Cerrar el modal al hacer clic en "Cancelar"
    modal.style.display = "none";
});

// Agregar un event listener para detectar el clic en el botón "Cerrar" (la X)
closeButton.addEventListener("click", function() {
    // Cerrar el modal al hacer clic en la X
    modal.style.display = "none";
});
