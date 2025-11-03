document.addEventListener("DOMContentLoaded", () => {
    const $boton = document.querySelector("#generar-pdf-button");
    $boton.addEventListener("click", () => {
        const $elementoParaConvertir = document.querySelector("#pdf-content");
        
        // Se añade la clase para ajustar los estilos para PDF
        document.body.classList.add('pdf-mode');
        
        html2pdf()
            .set({
                margin: [0.5, 1, 0.5, 1], // Márgenes superior, derecho, inferior, izquierdo
                filename: 'Boleta.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 3,
                    letterRendering: true,
                },
                jsPDF: {
                    unit: "in",
                    format: "a4",
                    orientation: 'landscape' // landscape o portrait
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err => console.log(err))
            .finally(() => {
                // Quitar la clase después de generar el PDF
                document.body.classList.remove('pdf-mode');
            });
    });
});
