@component('mail::message')

<h5>
    Hello, {{ $order->user->name }}! 
</h5>

<div class="text-sm">
    Your Order 
   <span class="font-bold">#{{ $order->order_no }}</span> is needed to be confirm just click the button to confirm.
</div>

@component('mail::button', ['url' => route('my_orders.confirm',[$order->order_no])])
Confirm Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
