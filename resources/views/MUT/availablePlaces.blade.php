
@extends("temp")
@section('bodyContent')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">

<style>
  
body {
  background-color: #fdf1ec;
}

.wrapper {
  height: 250px;
  width: 654px;
  margin: 50px auto;
  border-radius: 7px 7px 7px 7px;
  /* VIA CSS MATIC https://goo.gl/cIbnS */
  -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
}

.product-img {
  float: left;
  height: 250px;
  width: 327px;
}

.product-img img {
  border-radius: 7px 0 0 7px;
}

.product-info {
  float: left;
  height: 250px;
  width: 327px;
  border-radius: 0 7px 10px 7px;
  background-color: #fffffff5;
}

.product-text {
  height: 150px;
  width: 327px;
}

.product-text h1 {
  margin: 0 0 0 38px;
  padding-top: 52px;
  font-size: 34px;
  color: #474747;
}

.product-text h1,
.product-price-btn p {
  font-family: 'Bentham', serif;
}

.product-text h2 {
  margin: 0 0 47px 38px;
  font-size: 13px;
  font-family: 'Raleway', sans-serif;
  font-weight: 400;
  text-transform: uppercase;
  color: #d2d2d2;
  letter-spacing: 0.2em;
}

.product-text p {
  height: 125px;
  margin: 0 0 0 38px;
  font-family: 'Playfair Display', serif;
  color: #8d8d8d;
  line-height: 1.7em;
  font-size: 15px;
  font-weight: lighter;
  overflow: hidden;
}

.product-price-btn {
  height: 103px;
  width: 327px;
  margin-top: 17px;
  position: relative;
}

.product-price-btn p {
  display: inline-block;
  position: absolute;
  top: -13px;
  height: 50px;
  font-family: 'Trocchi', serif;
  margin: 0 0 0 38px;
  font-size: 28px;
  font-weight: lighter;
  color: #474747;
}

span {
  display: inline-block;
  height: 50px;
  font-family: 'Suranna', serif;
  font-size: 34px;
}

.product-price-btn button {
  float: right;
  display: inline-block;
  height: 50px;
  width: 176px;
  margin: 0 40px 0 16px;
  box-sizing: border-box;
  border: transparent;
  border-radius: 60px;
  font-family: 'Raleway', sans-serif;
  font-size: 14px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.2em;
  color: #ffffff;
  background-color: #060610;
  cursor: pointer;
  outline: none;
}

.product-price-btn button:hover {
  background-color: #03091ba2;
}
</style>

    <title>Document</title>
</head>
<body>
    {{-- {{dd($restOfBudget)}} --}}


<section class="blog top mt-3" id="blog">
    <div class="container">
      <div class="heading">
        <h5>OUR PLACES</h5>
        <h3>Discover your best trip in Aswan</h3>
      </div>
      <h1>The rest of Your Budget After Booking the Rooms  is {{$restOfBudget}}</h1>
<!-- CARD ==================================================================-->

<form action="{{route('bookPlaces',['order'=>$order])}}" method="POST" >
  @csrf
@if(!empty($availablePlaces))
  @foreach ($availablePlaces as $place )

  <div class="wrapper" >
    <div class="product-img">      
     <img src="{{url('http://localhost:8000/storage/imgs/'.$place->cover_img)}}" height="250" width="327">
    </div>
    <div class="product-info" style="text-align: center;">
      <div class="product-text">
        <h3 class="title">{{$place->name}}</h3>
        <span class="post">{{$place->id}}</span>
        <h5 class="name">
          <a href="#">
            <a href="{{route('showPlace',['place'=>$place->id])}}">{{$place->name}}</a>
          </a>
        </h5>   
        <span> {{$place->price}}</span> 
        </div>
      <div class="product-price-btn">
       
        <button type="button">buy now</button>
      </div>
    </div>
  </div>
  @endforeach

    <input type="text" name="percent" value="{{ $percent }}" hidden>
    <input type="text" name="restOfBudget" value="{{ $restOfBudget }}" hidden>
    <button type="submit">Book</button>

   

  @else
    <form action="{{route('getAvailableTourguides',['order'=>$order->id])}}">
        <input type="text" name="restOfBudget" value="{{ $restOfBudget }}" hidden>
        <button type="submit">Next step</button>
    </form>
    <form action="{{route('getAvailablePlaces')}}">
        <input type="text" name="percent" value="{{ $percent }}" hidden>
  
        <input type="text" name="restOfBudget" value="{{ $restOfBudget }}" hidden>
        <button type="submit">back step</button>
    </form>
    <form action="{{route('MUTE',['order'=>$order])}}">
        <input type="text" name="restOfBudget" value="{{ $restOfBudget }}" hidden>
        <button type="submit">Finish My trip ^^ </button>
    </form>
  </div>
  @endif
</section>
</form>
</html>






































