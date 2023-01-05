@component('mail::message')
<p>Hello {{$emailsupplier->name}},</p>
<p>Here is our order:</p>
<p><strong>Account Number: </strong>{{$emailsupplier->account_number}}</p>
@foreach($emailproducts as $product)
<p><strong>Name: </strong><?php echo \App\Http\Controllers\StoreController::showproductname($product->product_id);?></p>
<p><strong>Brand: </strong><?php echo \App\Http\Controllers\StoreController::showbrandname($product->product_id);?></p>
<p><strong>Quantity: </strong>{{$product->quantity}}</p>
<br>
@endforeach
<p>Many thanks,</p>
<p>Cobain Musical Suppliers</p>
@endcomponent