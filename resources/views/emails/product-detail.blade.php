@component('mail::message')
    <h5>Product Created!</h5>
    <ul>
        <li>Product ID is: {{ $product->id }}</li>
        <li>Product Name is: {{ $product->name }}</li>
        <li>Product Price is: {{ $product->price }}</li>
    </ul>

    Thanks,
    <br>
    {{ config('app.name') }}
@endcomponent
