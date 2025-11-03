
function vaciarCarrito() {
    if (confirm("¿Estás seguro de que quieres vaciar el carrito?")) {
        // Redireccionar al script que vacía el carrito
        window.location.href = "./vaciar_carrito.php";
    }
}
