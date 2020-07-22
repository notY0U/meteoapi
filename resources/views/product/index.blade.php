TESTER

<br>
<br>
<br>
<hr>

<form action="{{route('product.index')}}">

    <input type="text" name="city">
    <button type="submit">Get Recommendation</button>

</form>

{{$weather}} in {{$city}}
<br>

@foreach($products as $product)
{{$product->name}} <br>

@endforeach