

@extends("temp")
@section("bodyContent")

<html lang="en">
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="./assets/asset/css/css1/landing.css" rel="stylesheet" >
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
       <title>Tourguide</title>






       <link rel="stylesheet" href="./assets/css/index.css">
       <link id="u-page-google-font" rel="stylesheet" 
           href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700">





       <!-- 
   - favicon
 -->
       <link rel="shortcut icon" href="./assets/favicon.svg" type="image/svg+xml">

       <!-- 
   - custom css link
 -->
       <link rel="stylesheet" href="./assets/css/css1/landing.css">

       <!-- 
   - google font link
 -->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link
           href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Comforter+Brush&family=Heebo:wght@400;500;600;700&display=swap"
           rel="stylesheet">






       <!-- Favicons -->
       <!-- <link href="assets/img/favicon.png" rel="icon"> -->
       <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

       <!-- Google Fonts -->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link
           href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
           rel="stylesheet">

       <!-- Vendor CSS Files -->
       <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
       <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
       <link href="assets/vendor/aos/aos.css" rel="stylesheet">
       <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
       <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

       <!-- Variables CSS Files. Uncomment your preferred color scheme -->
       <link href="./assets/css/css1/variables.css " rel="stylesheet">
       <!-- Template Main CSS File -->
       <link href="./assets/css/css1/main.css" rel="stylesheet">










    </head>
   <body>

 

 
    <!-- 
        - #HERO
      -->
      {{-- url('./assets/asset/img/hero-bg-top.png') --}}
      <section class="section hero"
      style="background-size:cover; justify-content:center; margin-top:5rem; height:80vh">
      <div class="container  position-relative" >
        {{-- <div class="position-absolute top-0 start-100 translate-middle"><img src="./assets/img/wave.c36b4051801ca3d56b23.png"></div> --}}
        <div class="position-absolute top-50 start-0 translate-middle">
            <img src="./assets/asset/img/tables-right-dec (1).png">
        </div>

      

          <img src="./assets/asset/img/shape-1.png" width="61" height="61" alt="Vector Shape" class="shape shape-1">

          {{-- <img src="./assets/img/shape-2.png" width="56" height="74" alt="Vector Shape" class="shape shape-2"> --}}

          <img src="./assets/asset/img/shape-3.png" width="57" height="72" alt="Vector Shape" class="shape shape-3">

          <div class="hero-content" >
              <h2 class="hero-title" >Trusted Travel Agency</h2>

              <div class="about-content">
                <h2 class="h2 section-title">Explore all tour of the world with us.</h2>
                <ul class="about-list">
                    <li class="about-item">

                        <span class="about-item-icon">
                            <ion-icon name="compass"></ion-icon>
                        </span>
                        <div class="about-item-content" style="margin-top:15px">
                            <h2 class="h2 section-title">Tour guide</h3>
                        </div>
                    </li>
                    <li class="about-item">
                        <div class="about-item-icon">
                            <ion-icon name="briefcase"></ion-icon>
                        </div>
                        <div class="about-item-content" style="margin-top:15px">
                            <h2 class="h2 section-title">Friendly price</h2>
                    </li>

                    <li class="about-item">
                        <div class="about-item-icon" style="margin-top:15px">
                            <ion-icon name="umbrella"></ion-icon>
                        </div>
                        <div class="about-item-content" style="margin-top:20px">
                            <h2 class="h2 section-title">Reliable tour</h2>
                    </li>

                </ul>

              
                <a href="{{route('MUT.create')}}" style='text-decoration:none; '>
                    <button  style="background-color: rgba(0, 10, 122, 0.881);padding:1rem; text-align:center;color:antiquewhite">
                    <h2>Make Your Trip Now</h2>  
                </button>
            </a>
            </div>


          </div>

          <figure class="hero-banner">
              <img src="./assets/asset/img/hero-banner.png"  loading="lazy" alt="hero banner"
              style="height: 80vh">
          </figure>

      </div>
  </section>



@endsection






    <script src="assets/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/asset/vendor/aos/aos.js"></script>
    <script src="assets/asset/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/asset/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Main JS File -->
    <script src="./assets/asset/js/main.js"></script>


    <!-- 
    - custom js link
  -->
    <script src="./assets/asset/js/landing.js"></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
