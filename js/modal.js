// Obtener el modal
var modal = document.getElementById("myModal");

// Obtener el botón que abre el modal
var accountLink = document.getElementById("accountLink");

// Obtener el botón de cierre del modal
var span = document.getElementsByClassName("close")[0];

var totalCompraElement = document.getElementById("totalCompra");

// Abrir el modal cuando se haga clic en "Mi cuenta"
accountLink.onclick = function () {
  modal.style.display = "block";
};

// Cerrar el modal cuando se haga clic en la X
span.onclick = function () {
  modal.style.display = "none";
};

// Cerrar el modal cuando se haga clic fuera de él
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

paypal
  .Buttons({
    style: {
      color: "blue",
      shape: "pill",
      label: "pay",
    },
    createOrder: function (data, actions) {
      // Creación de una nueva orden de pago
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              // Valor de la transacción en dólares
              value: 2000,
            },
          },
        ],
      });
    },

    onApprove: function (data, actions) {
      // Captura de la orden cuando se aprueba el pago
      actions.order.capture().then(function (detalles) {
        window.location.href = "inicio.php";
      });
    },

    onCancel: function (data) {
      alert("Pago cancelado");
    },
  })
  .render("#paypal-button-container");
