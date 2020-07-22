TESTER
index

<br>
<br>
<br>
<hr>
<title></title>
<form action="{{route('product.index')}}">

    <input type="text" name="city">
    <button type="submit">Get Recommendation</button>

</form>


<br>



{{dd(json_decode($recommend))}}