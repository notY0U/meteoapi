<br>
<hr>

<title>  WeatherReady </title>
<small>source data from:</small> 	&nbsp; © Lietuvos hidrometeorologijos tarnyba <br>
    
    <br><hr>
<form action="{{route('product.index')}}">

    <input type="text" name="city">
    <button type="submit">Get Recommendation</button>

</form>






{{dd(json_decode($recommend))}}