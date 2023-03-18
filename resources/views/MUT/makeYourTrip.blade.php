

@extends("temp")
@section("bodyContent")



 

 
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




