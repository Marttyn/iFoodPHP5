@component('mail::message')
# Sr. {{$andamento->Pedido->getUsuario->name}}

O seu Pedido {{$andamento->Pedido->codigo}} está {{$andamento->Estado->nome}}.

@component('mail::button', ['url' => url('pedido/' . $andamento->Pedido->id)])
Verificar Pedido
@endcomponent

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent
