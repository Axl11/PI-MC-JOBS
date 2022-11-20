@if(session()->has('mensaje'))

    <div class="pt-3 x-5">
        <div class="alert {{ session('alert_type', 'alert-info')}} alert-dismissible fade show" role="alert">
            <strong><i class=" {{ session('icon')}}"></i></strong> {{ session('mensaje')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

@endif