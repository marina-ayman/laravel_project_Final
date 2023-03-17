
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



   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

   <!-- Libraries Stylesheet -->
   <link href="./assets/home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="./assets/home/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

   <!-- Customized Bootstrap Stylesheet -->
   <link href="./assets/home/css/style.css" rel="stylesheet">
</head>
   <!-- Flaticon Font -->
   {{-- <link href="./assets/asset/lib/flaticon/font/flaticon.css" rel="stylesheet"> --}}
   <!-- Libraries Stylesheet -->
   {{-- <link href="./assets/asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> --}}
   {{-- <link href="./assets/asset/lib/lightbox/css/lightbox.min.css" rel="stylesheet"> --}}
   <!-- Customized Bootstrap Stylesheet -->

</head>
<style>
    .carousel {
  position: relative;
}
.carousel-item img {
  object-fit: cover;
}
#carousel-thumbs {
  background: rgba(227, 225, 225, 0.3);
  bottom: 0;
  left: 0;
  padding: 0 50px;
  right: 0;
}
#carousel-thumbs img {
  border: 5px solid transparent;
  cursor: pointer;
}
#carousel-thumbs img:hover {
  border-color: rgba(255,255,255,.3);
}
#carousel-thumbs .selected img {
  border-color: #fff;
}
.carousel-control-prev,
.carousel-control-next {
  width: 50px;
}
@media all and (max-width: 767px) {
  .carousel-container #carousel-thumbs img {
    border-width: 3px;
  }
}
@media all and (min-width: 576px) {
  .carousel-container #carousel-thumbs {
    position: absolute;
  }
}
@media all and (max-width: 576px) {
  .carousel-container #carousel-thumbs {
    background: #ccccce;
  }
}
</style>
<body>

@extends("temp")
@section('bodyContent')

<!-- Carousel Start -->
    <div class="container-fluid p-0">
      <div id="header-carousel" class="carousel slide" data-ride="carousel" >
      
              <div class="carousel-item active">
                  <img class="w-100" src="./assets/asset/img/Nub Inn Nubian Dream_files/vvvv/Aswan-Nilme.jpg" alt="Image" style="height: 60vh">
                  <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 800px;">
                          <h4 class=" text-uppercase font-weight-normal mb-md-3" style="color:#ffffff">Creative Interior Design</h4>
                          <h3 class="display-3 text-white mb-md-4">Stay At Home In Peace</h3>
                      
                      </div>
                  </div>
              </div>
          </div>
        
      </div>
    </div>
 

<div class="container" style="margin-buttom:20rem; margin-top:30rem ; " >
    <div class="row">
      @foreach($places as $Place)
      <div class="col-lg-4 col-md-6 mb-4" style="width: 25rem">
          <div class="package-item bg-white mb-2" >
            <img class="card-img-top"  src="{{url('http://localhost:8000/storage/imgs/'.$Place->cover_img)}}" alt="" 
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
                          <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i><small>({{$Place ->price}})</small></h6>
                          <h5 class="m-0">$350</h5>

                          <div class="btn" data-bs-toggle="modal" data-bs-target="#myModal">Book now!</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    </div>
  </div>


         
                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Book NOW! ::{{$Place ->name}}</h4>
                       
                          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" id="modal">
                             
{{--===========================================================================================================--}}
<div class="container mt-5">
    <small class="mr-3"><i class="fa fa-user text-primary"></i>Price : {{$Place ->price}}</small>
    <small class="mr-3"><i class="fa fa-folder text-primary"></i>Type : {{$Place ->type}}</small>
    <p>{{$Place->description}}</p>
    <div class="carousel-container position-relative row">
      
    <!-- Sorry! Lightbox doesn't work - yet. -->
      
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-slide-number="0">
          <img src="https://source.unsplash.com/Pn6iimgM-wo/1600x900/" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/Pn6iimgM-wo/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
        </div>
        <div class="carousel-item" data-slide-number="1">
          <img src="https://source.unsplash.com/tXqVe7oO-go/1600x900/" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/tXqVe7oO-go/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
        </div>
        <div class="carousel-item" data-slide-number="2">
          <img src="https://source.unsplash.com/qlYQb7B9vog/1600x900/" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/qlYQb7B9vog/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
        </div>
        <div class="carousel-item" data-slide-number="3">
          <img src="https://source.unsplash.com/QfEfkWk1Uhk/1600x900/" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/QfEfkWk1Uhk/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
        </div>
        <div class="carousel-item" data-slide-number="4">
          <img src="https://source.unsplash.com/CSIcgaLiFO0/1600x900/" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/CSIcgaLiFO0/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
        </div>
        <div class="carousel-item" data-slide-number="5">
          <img src="https://source.unsplash.com/a_xa7RUKzdc/1600x900/" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/a_xa7RUKzdc/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
        </div>
        <div class="carousel-item" data-slide-number="6">
          <img src="https://source.unsplash.com/uanoYn1AmPs/1600x900/" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/uanoYn1AmPs/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
        </div>
        <div class="carousel-item" data-slide-number="7">
          <img src="https://source.unsplash.com/_snqARKTgoc/1600x900/" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/_snqARKTgoc/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
        </div>
        <div class="carousel-item" data-slide-number="8">
          <img src="https://source.unsplash.com/M9F8VR0jEPM/1600x900/" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/M9F8VR0jEPM/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
        </div>
        <div class="carousel-item" data-slide-number="9">
          <img src="https://source.unsplash.com/Q1p7bh3SHj8/1600x900/" class="d-block w-100" alt="..." data-remote="https://source.unsplash.com/Q1p7bh3SHj8/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
        </div>
      </div>
    </div>
    
    <!-- Carousel Navigation -->
    <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row mx-0">
            <div id="carousel-selector-0" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="0">
              <img src="https://source.unsplash.com/Pn6iimgM-wo/600x400/" class="img-fluid" alt="...">
            </div>
            <div id="carousel-selector-1" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="1">
              <img src="https://source.unsplash.com/tXqVe7oO-go/600x400/" class="img-fluid" alt="...">
            </div>
            <div id="carousel-selector-2" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="2">
              <img src="https://source.unsplash.com/qlYQb7B9vog/600x400/" class="img-fluid" alt="...">
            </div>
            <div id="carousel-selector-3" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="3">
              <img src="https://source.unsplash.com/QfEfkWk1Uhk/600x400/" class="img-fluid" alt="...">
            </div>
            <div id="carousel-selector-4" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="4">
              <img src="https://source.unsplash.com/CSIcgaLiFO0/600x400/" class="img-fluid" alt="...">
            </div>
            <div id="carousel-selector-5" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="5">
              <img src="https://source.unsplash.com/a_xa7RUKzdc/600x400/" class="img-fluid" alt="...">
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row mx-0">
            <div id="carousel-selector-6" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="6">
              <img src="https://source.unsplash.com/uanoYn1AmPs/600x400/" class="img-fluid" alt="...">
            </div>
            <div id="carousel-selector-7" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="7">
              <img src="https://source.unsplash.com/_snqARKTgoc/600x400/" class="img-fluid" alt="...">
            </div>
            <div id="carousel-selector-8" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="8">
              <img src="https://source.unsplash.com/M9F8VR0jEPM/600x400/" class="img-fluid" alt="...">
            </div>
            <div id="carousel-selector-9" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="9">
              <img src="https://source.unsplash.com/Q1p7bh3SHj8/600x400/" class="img-fluid" alt="...">
            </div>
            <div class="col-2 px-1 py-2"></div>
            <div class="col-2 px-1 py-2"></div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
  

    </div> <!-- /row -->
    </div> <!-- /container -->
{{-------------------------------------------------------------------------------------------------------}}


      <div class="booking-form">
                                            <form action="{{route('storeRegPlace.store',['id'=>$Place->id])}}" class="form" id="form2" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <span class="form-label">Check In</span>
                                                            <input class="form-control" type="date" name="check_in" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="form-label">Check out</span>
                                                            <input class="form-control" type="date" name="check_out" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-btn">
                                                    <button class="submit-btn bookbtnn"onclick() type="submit">Send a request</button>
                                                </div>
                                            </form>
                                        </div>


                        </div>
                        <!-- Modal footer -->
                        <div class="modal">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>
      </div>
    </div>
    @endforeach
    <!-- Blog End -->
    @endsection
        <!-- JavaScript Libraries -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="./assets/asset/lib/owlcarousel/owl.carousel.min.js"></script> --}}
    {{-- <script src="./assets/asset/lib/easing/easing.min.js"></script> --}}
    {{-- <script src="./assets/asset/lib/isotope/isotope.pkgd.min.js"></script> --}}
    {{-- <script src="./assets/asset/lib/lightbox/js/lightbox.min.js"></script> --}}
        <!-- Contact Javascript File -->
        <!-- Template Javascript -->
    {{-- <script src="./assets/asset/js/placedesc.js "></script> --}}

    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/home/lib/easing/easing.min.js"></script>
    <script src="./assets/home/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./assets/home/lib/tempusdominus/js/moment.min.js"></script>
    <script src="./assets/home/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="./assets/home/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

 
    <!-- Template Javascript -->
    <script src="./assets/home/js/main.js"></script>




    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>   --}}

 