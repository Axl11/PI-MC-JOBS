@if(session()->has('mensaje'))

    <!-- <div class="alert {{ session('alert_type', 'alert-info')}} alert-dismissible fade show" role="alert">
    <strong>Alerta</strong> {{ session('mensaje') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div> -->

    <div class="alert {{ session('alert_type', 'alert-info')}} alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-check"></i></strong> {{ session('mensaje')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif