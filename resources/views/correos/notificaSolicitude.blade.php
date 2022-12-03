@component('mail::message')
<h1>Solicitud Registrada Exitosamente</h1>

Usuari@ {{ $solicitude->user->name }} la solicitud que realizo fue registrada de manera éxitosa.

@component('mail::button', ['url' => route('solicitude.show', $solicitude)])
Detalles Solicitud 
@endcomponent

Muchas gracias, <br>
{{ config('app.name') }}
@endcomponent