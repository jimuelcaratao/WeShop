@component('mail::message')

<h5>
    Hello, {{ $order->user->name }}! 
</h5>

<div class="text-sm">
    We’re happy to let you know that item/s from your order 
   <span class="font-bold">#{{ $order->order_no }}</span>  has been delivered or collected. Thank you for shopping with us. See you on your next purchase!
</div>


@component('mail::button', ['url' => ''])
Submit a Review
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
