@if(session()->has('delete'))
    <script>
        Swal.fire(
            'Eliminado',
            '{{ session('delete') }}',
            'success'
        )
    </script>
@endif

    <script>

        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡No será posible revertir esta acción!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });

    </script>