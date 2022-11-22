@if(session()->has('deletePapelera'))
    <script>
        Swal.fire(
            'Eliminado',
            '{{ session('deletePapelera') }}',
            'success'
        )
    </script>
@endif

    <script>

        $('.formulario-papelera').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡Este registro se moverá a la papelera!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Mover a papelera',
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