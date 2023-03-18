
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places</title>
    {{-- <link href="{{asset('./assets/asset/css/placedesc.css')}}"  rel="stylesheet"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
   <!-- Google Web Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@400;500;600&display=swap" rel="stylesheet"> 
   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">


   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

   <link rel="preconnect" href="https://fonts.gstatic.com">

   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

   <!-- Libraries Stylesheet -->
   <link href="./assets/home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="./assets/home/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

   <!-- Customized Bootstrap Stylesheet -->
   <link href="./assets/home/css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('assets/css/hotels.css')}}" >
</head>
   <!-- Flaticon Font -->
   {{-- <link href="./assets/asset/lib/flaticon/font/flaticon.css" rel="stylesheet"> --}}
   <!-- Libraries Stylesheet -->
   {{-- <link href="./assets/asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> --}}
   {{-- <link href="./assets/asset/lib/lightbox/css/lightbox.min.css" rel="stylesheet"> --}}
   <!-- Customized Bootstrap Stylesheet -->

</head>
<style>

</style>
<body>

@extends("temp")
@section('bodyContent')



    <!-- Carousel Start -->
    <div class="container-fluid p-0">
      <div id="header-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img class="w-100"  src="./assets/asset/img/Nub Inn Nubian Dream_files/vvvv/Aswan-Nilme.jpg" alt="Image" style="height: 60vh">
                  <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 900px;">
                          <h4 class="text-white text-uppercase mb-md-3">Places</h4>
                          <h1 class="display-3 text-white mb-md-4">Let's Discover The Aswan Together</h1>
                     
                      </div>
                  </div>
              </div>
              <div class="carousel-item">
                  <img class="w-100" src="./assets/asset/img/318484563_517143207108877_8884661060574801904_n.jpg" alt="Image" style="height: 60vh">
                  <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 900px;">
                          <h4 class="text-white text-uppercase mb-md-3">Places</h4>
                          <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>
                  
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


  <!-- Booking Start -->
  <div class="container-fluid booking mt-5 pb-5">
      <div class="container pb-5">
          <div class="bg-light shadow" style="padding: 30px;">
              <div class="row align-items-center" style="min-height: 60px;">
                  <div class="col-md-10">
                      <div class="row">
                          <div class="col-md-3">
                              <div class="mb-3 mb-md-0">
                                
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="mb-3 mb-md-0">
                                  <div class="date" id="date1" data-target-input="nearest">
                                      <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Depart Date" data-target="#date1" data-toggle="datetimepicker"/>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="mb-3 mb-md-0">
                                  <div class="date" id="date2" data-target-input="nearest">
                                      <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Return Date" data-target="#date2" data-toggle="datetimepicker"/>
                                  </div>
                              </div>
                          </div>
                          
                      </div>
                  </div>
                  <div class="col-md-2">
                      <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Submit</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Booking End -->





  <div class="heading"  >
    <h5>OUR Places</h5>
    <h3>Discover Amazing places in Aswan</h3>
  </div>

<div class="container" style="margin-buttom:20rem; margin-top:6rem ;" >




    <div class="row">
      @foreach($places as $Place)
      <div class="col-lg-4 col-md-6 mb-4" style="width: 25rem">
          <div class="package-item bg-white mb-2" >
            <form action="{{route('storeRegPlace.store',['id'=>$Place->id])}}" method="POST">
              @csrf
            <img class="card-img-top"  src="../storage/imgs/{{$Place->cover_img}}" alt="" 
            style="height:17rem;border-radius:solid 2px rgb(75, 159, 255)"
            >
              <div class="p-4">
                  <div class="d-flex justify-content-between mb-3">
                      <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>  {{$Place->type}}</small>
                      <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>Price : {{$Place ->price}}</small>
                      <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{$Place ->name}}</small>
                  </div>
                  <p class="h5 text-decoration-none" >{{$Place->description}}</p>
                  <div class="border-top mt-4 pt-4">
                      <div class="d-flex justify-content-between">
                          <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i><small>5</small></h6>
                          <h5 class="m-0">{{$Place ->price}}EGP</h5>

                         <input type="checkbox" name="place_id[]" value="{{$Place->id}}" >
                          
                      </div>
                  </div>
              </div>
            </div>
          </div>
          @endforeach
          {{-- <button type="submit">Book</button> --}}
          
        </form>

    
    </div>
</div>
    <!-- Blog End -->
    @endsection
    
