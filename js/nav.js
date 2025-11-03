function mostrarProductos(categoria) {
    // Ocultar todos los productos
    var productos = document.querySelectorAll('.product-card');
     productos.forEach(function(producto) {
        producto.style.display = 'none';
     });

    // Mostrar solo los productos de la categoría seleccionada
    var productosCategoria = document.querySelectorAll('.product-card[data-categoria="' + categoria + '"]');
    productosCategoria.forEach(function(producto) {
        producto.style.display = 'block';
    });
}