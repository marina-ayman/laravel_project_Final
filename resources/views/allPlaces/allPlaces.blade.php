
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places</title>
   <!-- Google Web Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@400;500;600&display=swap" rel="stylesheet"> 
   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
   <!-- Flaticon Font -->
   {{-- <link href="./assets/asset/lib/flaticon/font/flaticon.css" rel="stylesheet"> --}}
   <!-- Libraries Stylesheet -->
   <link href="./assets/asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="./assets/asset/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
   <!-- Customized Bootstrap Stylesheet -->
   <link href="./assets/asset/css/placedesc.css" rel="stylesheet">
</head>
<body>

@extends("temp")
@section('bodyContent')

<!-- Carousel Start -->
    <div class="container-fluid p-0">
      <div id="header-carousel" class="carousel slide" data-ride="carousel" >
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img class="w-100" src="./assets/asset//img/314808358_496147105875154_6500443200089010113_n.jpg" alt="Image" style="height: 60vh">
                  <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 800px;">
                          <h4 class="text-primary text-uppercase font-weight-normal mb-md-3">Creative Interior Design</h4>
                          <h3 class="display-3 text-white mb-md-4">Make Your Home Better</h3>
                          <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2 mt-md-4">Learn More</a>
                      </div>
                  </div>
              </div>

              <div class="carousel-item ">
                <img class="w-100" src="./assets/asset//img/314808358_496147105875154_6500443200089010113_n.jpg" alt="Image" style="height: 60vh">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 800px;">
                        <h4 class="text-primary text-uppercase font-weight-normal mb-md-3">Creative Interior Design</h4>
                        <h3 class="display-3 text-white mb-md-4">Make Your Home Better</h3>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2 mt-md-4">Learn More</a>
                    </div>
                </div>
            </div>
              <div class="carousel-item">
                  <img class="w-100" src="./assets/asset/img/Nub Inn Nubian Dream_files/vvvv/Aswan-Nilme.jpg" alt="Image" style="height: 60vh">
                  <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 800px;">
                          <h4 class="text-primary text-uppercase font-weight-normal mb-md-3">Creative Interior Design</h4>
                          <h3 class="display-3 text-white mb-md-4">Stay At Home In Peace</h3>
                          <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2 mt-md-4">Learn More</a>
                      </div>
                  </div>
              </div>
          </div>
          <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
              <div class="btn btn-primary" style="width: 45px; height: 45px;">
                  <span class="carousel-control-prev-icon mb-n2"></span>
              </div>
          </a>
          <a class="carousel-control-next" href="#header-carousel" data-slide="next">
              <div class="btn btn-primary" style="width: 45px; height: 45px;">
                  <span class="carousel-control-next-icon mb-n2"></span>
              </div>
          </a>
      </div>
    </div>
    <!-- Carousel End -->
    <!-- Blog Start -->
    <div class="container-fluid bg-light pt-5">
      <div class="container py-5">
          <div class="row justify-content-center">
              <div class="col-lg-6 col-md-8 col text-center mb-4">
                  <h6 class="text-primary font-weight-normal text-uppercase mb-3">Our Places</h6>
                  <h1 class="mb-4">Discover Places you can visit in the Land of Gold</h1>
              </div>
          </div>
          <div class="row pb-3">
            @foreach($allPlaces as $Place)
              <div class="col-md-4 mb-4" style="height: 5rem">
                  <div class="card border-0 mb-2">
                    <img class="card-img-top" src="{{ asset('img/'.$Place->cover_img) }}" alt="">
                      <div class="card-body bg-white p-4">
                          <div class="d-flex align-items-center mb-3">
                              <a class="btn btn-primary" href=""><i class="fa fa-link"></i></a>
                              <h5 class="m-0 ml-3 text-truncate">{{$Place ->name}}</h5>
                          </div>
                          <p>{{$Place->description}}</p>
                          <div class="d-flex">
                              <small class="mr-3"><i class="fa fa-user text-primary"></i>Price : {{$Place ->price}}</small>
                              <small class="mr-3"><i class="fa fa-folder text-primary"></i>Type : {{$Place ->type}}</small>
                              <!-- <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small> -->
                          </div>

                          
                      </div>
                  </div>
              </div>
              @endforeach
         
         
         
          </div>
      </div>
    </div>
    <!-- Blog End -->
    @endsection
        <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./assets/asset/lib/easing/easing.min.js"></script>
    <script src="./assets/asset/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="./assets/asset/lib/lightbox/js/lightbox.min.js"></script>
        <!-- Contact Javascript File -->
        <!-- Template Javascript -->
    <script src="./assets/asset/js/placedesc.js "></script>
    
