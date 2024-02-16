document.addEventListener('DOMContentLoaded', function() {
    // Añade un evento de clic a los elementos con la clase 'delete-departamento'
    document.querySelectorAll('.delete-departamento').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault();

            // Muestra la alerta de confirmación
            Swal.fire({
                title: "¿Estás seguro?",
                text: "No se podra revertir esto.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminarlo"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirige a la URL de eliminación si el usuario confirma
                    window.location.href = element.href;
                }
            });
        });
    });
});
