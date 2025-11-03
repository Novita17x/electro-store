function confirmarCompra(event) {
    event.preventDefault(); // Evitar que el formulario se envíe automáticamente
    Swal.fire({
        title: "¿Está seguro de su compra?",
        text: "No podrá revertir esta acción",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, comprar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, se envía el formulario de compra
            document.getElementById("comprarForm").submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Si el usuario cancela, mostrar otro SweetAlert
            Swal.fire({
                title: "¡Cancelado!",
                text: "Su compra ha sido cancelada.",
                imageUrl: "https://i.ytimg.com/vi/NFmsacUo2TQ/maxresdefault.jpg",
                imageWidth: 400,
                imageHeight: 200,
            });
        }
    });
}