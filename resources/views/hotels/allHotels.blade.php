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

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
      <div id="header-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img class="w-100"  src="./assets/asset/img/3.png.jpg" alt="Image" style="height: 65vh">
                  <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 900px;">
                          <h4 class="text-white text-uppercase mb-md-3">Hotels</h4>
                          <h1 class="display-3 text-white mb-md-4">Let's Discover The Aswan Together</h1>
                     
                      </div>
                  </div>
              </div>
              <div class="carousel-item">
                  <img class="w-100" src="./assets/asset/img/88afb48c-d920-4e82-ae72-5a53a087a388.jfif" alt="Image" style="height: 65vh">
                  <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 900px;">
                          <h4 class="text-white text-uppercase mb-md-3">hotels</h4>
                          <h1 class="display-3 text-white mb-md-4">Discover your best stay in Aswan</h1>
                  
                      </div>
                  </div>
              </div>
          </div>
          <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
              <div class="btn btn-dark" style="width: 45px; height: 45px;">
                  <span class="carousel-control-prev-icon mb-n2"></span>
              </div>
          </a>
          <a class="carousel-control-next" href="#header-carousel" data-slide="next">
              <div class="btn btn-dark" style="width: 45px; height: 45px;">
                  <span class="carousel-control-next-icon mb-n2"></span>
              </div>
          </a>
      </div>
  </div>
  <!-- Carousel End -->

      <!-- HOTELS CARD -->
       <section class="blog top" id="blog">
        <div class="container">
          <div class="heading"  >
            <h5>OUR Hotels</h5>
            <h3>Discover your best stay in Aswan</h3>
          </div>
          <div class="content grid mtop" >
            @foreach ($allHotels as $Hotel)
            <div class="box" style="width:23rem">
              <!-- hotel img -->
              <div class="img">
                <img src="{{url('http://localhost:8000/storage/imgs/'.$Hotel->cover_img)}}" alt="" style="height: 16rem; width:23rem">
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