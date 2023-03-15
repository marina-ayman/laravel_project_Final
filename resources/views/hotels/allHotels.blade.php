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
    <section class="home" id="home" style="background-image: url('https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1d/3d/8a/7a/movenpick-resort-aswan.jpg?w=1200&h=-1&s=1')">
        <div class="container">
          <h1>Our Hotels</h1>
        </div>
    </section>
      <!-- HOTELS CARD -->
       <section class="blog top" id="blog">
        <div class="container">
          <div class="heading">
            <h5>OUR Hotels</h5>
            <h3>Discover your best stay in Aswan</h3>
          </div>
          <div class="content grid mtop">
            @foreach ($hotelInfo as $Hotel)
            <div class="box">
              <!-- hotel img -->
              <div class="img">
                <img src="{{ asset('img/'.{{$Hotel->cover_img)}} }}" alt="">
                <span>HOTEL</span>
              </div>
              <!-- hotel details -->
              <div class="text">
                <h3>{{$Hotel->name}}</h3>
                <p>{{$Hotel->type}}</p>
                <p>{{$Hotel->address}}</p>
                <a href="{{route('hotel.show',['id'=>$Hotel->id])}}">Show More<i class='far fa-long-arrow-alt-right'></i></a>
            
              </div>  
                <!-- "hotels.hotel",["Hotel"=> $hotelInfo],["hotelImg"=>$hotelImgs] -->
            </div>
            @endforeach
          </div>
        </div>
      </section> 
  
    
</body>
</html>

@endsection