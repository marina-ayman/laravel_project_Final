

@extends("temp")
@section('bodyContent') 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{asset('assets/css/hotels.css')}}" >
    <title>Hotels</title>
</head>
<body>


    <!-- HERO SECTION -->
    <section class="home" id="home" >
        <div class="container">
          <h1>Our Tourguide</h1>
        </div>
    </section>
      <!-- HOTELS CARD -->
       <section class="blog top" id="blog">
        <div class="container">
          <div class="heading"  >
            <h5>OUR Tourguide</h5>
            <h3>Discover your best stay in Aswan</h3>
          </div>
          <div class="content grid mtop" >
            @if($availableTourguides)
            @foreach ($availableTourguides as $Tourguide)
            <div class="box" style="width:23rem">
              <!-- hotel img -->
              <div class="img">
                {{-- <img class="" src="  'img/'.{{ asset($Tourguide->User->image) }}" alt=""> --}}
                <img src="{{url('http://localhost:8000/storage/imgs/'.$Tourguide->User->image)}}" alt="" style="height: 16rem; width:23rem" >
                <span>   {{$Tourguide->price_per_day}} L.E/Day</span>
              </div>
              <!-- hotel details -->
              <div class="text">
                <h2>{{$Tourguide->User->name}}</h2>
                <p class="description" style="color:black">Language : </p>
                @foreach( $Tourguide->languages as $lang)
                <h4>  {{$lang->language}}</h4>
                  @endforeach
                  <p class="admin">syndicate_No:{{$Tourguide->syndicate_No}} </p>
                  <h6 class="h-2 mt-4"><br> Bio:{{isset($Tourguide->bio)?:"you will enjoy your Time"}}</h6>
                {{-- <a href="{{route('hotel.show',['id'=>$Hotel->id])}}">Show More<i class='far fa-long-arrow-alt-right'></i></a> --}}
            
              </div>  
                <!-- "hotels.hotel",["Hotel"=> $hotelInfo],["hotelImg"=>$hotelImgs] -->
            </div>
       @endforeach
       @endif
          </div>
          <form action="{{route('getAvailablePlaces')}}">
            <input type="text" name="percent" value="{{ $percent }}" hidden>

            <input type="text" name="restOfBudget" value="{{ $restOfBudget }}" hidden>
            <button type="submit">back step</button>
        </form>
        </div>
      </section> 
  
    
</body>
</html>