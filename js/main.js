const tituloPrincipal = document.querySelector("#main-title");
const botonesCategorias = document.querySelectorAll(".btn-category");
botonesCategorias.forEach(boton => {
    boton.addEventListener("click", (e) => {
        botonesCategorias.forEach(boton => boton.classList.remove("active"));
        e.currentTarget.classList.add("active");
        if (e.currentTarget.id != "todos") {
            if (e.currentTarget.id == "laptops") {
                tituloPrincipal.innerHTML = "Laptops";
            }
            if (e.currentTarget.id == "audifonos") {
                tituloPrincipal.innerHTML = "Audifonos";
            }
            if (e.currentTarget.id == "camaras") {
                tituloPrincipal.innerHTML = "Camaras";
            }
        } else {
            tituloPrincipal.innerHTML = "Todos los Productos";
        }
    })
})
