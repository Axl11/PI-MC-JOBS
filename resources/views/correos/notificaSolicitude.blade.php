@component('mail::message')
#Notifica Solicitud Registrada Exitosamente

Usuari@ {{ $solicitude->user->name }} la solicitud que realizo fue registrada de manera éxitosa.

@component('mail::button', ['url' => route('solicitude.show', $solicitude)])
Detalles Solicitud 
@endcomponent

Thanks, <br>
{{ config('app.name') }}
@endcomponent