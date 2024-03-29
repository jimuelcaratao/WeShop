<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>WeShop</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/admin/print.css') }}">
</head>
<body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
     <div class="col-md-12">
        <div class="invoice">
           <!-- begin invoice-company -->
           <div class="invoice-company text-inverse f-w-600">
            <img class="main-logo" src="{{ asset('img/logo/LogoV3.png') }}">

              <span class="pull-right hidden-print">
              <a href="javascript:;" id="printPageButton"  onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
              </span>
           </div>

           <!-- end invoice-company -->
           <!-- begin invoice-header -->
           <div class="invoice-header">
              <div class="invoice-from">
                 <small>from:</small>
                 <address class="m-t-5 m-b-5">
                    <strong class="text-inverse">WeShop Computers.</strong><br>
                    Bagong Silang<br>
                    Caloocan, Metro Manila<br>
                    Phone: +63 9098765432<br>
                 </address>
              </div>
              <div class="invoice-to">
                 <small>to:</small>
                 <address class="m-t-5 m-b-5">
                    <strong class="text-inverse">{{ $order->user->name }}</strong><br>
                    @if (!empty($order->user->user_address))
                        {{ $order->user->user_address->house }}, Barangay {{ $order->user->user_address->barangay }}, {{ $order->user->user_address->province }}, {{ $order->user->user_address->city }}
                        <br>
                        Phone: {{ $order->user->user_address->mobile_no }}<br>
                    @endif
                    @empty($order->user->user_address)
                        No Address ??
                    @endempty
                  
                 </address>
              </div>
              <div class="invoice-date">
                 <small>Invoice</small>
                 <div class="date text-inverse m-t-5">{{ $order->created_at }}</div>
                 <div class="invoice-detail">
                    #{{ $order->order_no }}<br>
                    Products
                 </div>
              </div>
           </div>
           <!-- end invoice-header -->

           <!-- begin invoice-content -->
           <div class="invoice-content">
              <!-- begin table-responsive -->
              <div class="table-responsive">
                 <table class="table table-invoice">
                    <thead>
                       <tr>
                          <th class="text-left" >Product Name</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-right" >Price</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_items as $order_item)
                          <tr>
                              <td class="text-left">{{ $order_item->product->product_name }}</td>
                              <td class="text-center">{{ $order_item->quantity }}</td>
                              <td class="text-right">${{ $order_item->price }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                 </table>
              </div>
              <!-- end table-responsive -->
              <!-- begin invoice-price -->
              <div class="invoice-price">
                 <div class="invoice-price-left">
                    <div class="invoice-price-row">
                       <div class="sub-price">
                          <small>SUBTOTAL</small>
                          <span class="text-inverse">₱ @convert($order->getTotalPrice())</span>
                       </div>
                       <div class="sub-price">
                          <i class="fa fa-plus text-muted"></i>
                       </div>
                       <div class="sub-price">
                          <small>SHIPPING FEE</small>
                          <span class="text-inverse">FREE</span>
                       </div>
                    </div>
                 </div>
                 <div class="invoice-price-right">
                    <small class="total-price">TOTAL</small> <span class="f-w-600 total-price">₱ @convert($order->getTotalPrice())</span>
                 </div>
              </div>
              <!-- end invoice-price -->
           </div>
           <!-- end invoice-content -->
           <!-- begin invoice-footer -->
           <div class="invoice-footer">
              <p class="text-center m-b-5 f-w-600">
                 THANK YOU FOR YOUR BUSINESS
              </p>
              <p class="text-center">
                 <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> weshop-computers.com</span>
                 <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> weshop-computers@gmail.com</span>
              </p>
           </div>
           <!-- end invoice-footer -->
        </div>
     </div>
  </div>
</body>
</html>