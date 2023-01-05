@component('mail::message')
<p><strong>ID: </strong>#{{$orderemaildata['userid']}}</p>
<p><strong>Name: </strong>{{$orderemaildata['name']}}</p>
<p><strong>Email: </strong>{{$orderemaildata['email']}}</p>
<p><strong>Order ID: </strong>#{{$orderemaildata['orderid']}}</p>
<p><strong>Message: </strong>{{$orderemaildata['message']}}</p>
@endcomponent