


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
                                  <select class="custom-select px-4" style="height: 47px;">
                                      <option selected>Destination</option>
                                      <option value="1">Destination 1</option>
                                      <option value="2">Destination 1</option>
                                      <option value="3">Destination 1</option>
                                  </select>
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
                          <div class="col-md-3">
                              <div class="mb-3 mb-md-0">
                                  <select class="custom-select px-4" style="height: 47px;">
                                      <option selected>Duration</option>
                                      <option value="1">Duration 1</option>
                                      <option value="2">Duration 1</option>
                                      <option value="3">Duration 1</option>
                                  </select>
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














       <section class="blog top" id="blog">
        <div class="container">
          <div class="heading"  >
            <h5>OUR Tourguide</h5>
            <h3>Discover your best stay in Aswan</h3>
          </div>
          <div class="content grid mtop" >
            @foreach ($allTourGides as $Tourguide)
            <div class="box" style="width:23rem">
              <!-- hotel img -->
              <div class="img">
                {{-- <img class="" src="  'img/'.{{ asset($Tourguide->User->image) }}" alt=""> --}}
                <img src="{{url('http://localhost:8000/storage/imgs/'.$Tourguide->User->image)}}" alt="" style="height: 16rem; width:23rem">
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
                  <div class="btn" data-bs-toggle="modal" data-bs-target="#myModal"  style="background-color: #CC8C18">Book now!</div>

              </div>
                <!-- "hotels.hotel",["Hotel"=> $hotelInfo],["hotelImg"=>$hotelImgs] -->
            </div>

          </div>
        </div>


        <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title " style="background-color: #CC8C18">Book NOW!</h4>
                  <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="modal">
                    <div id="booking" class="section">
                        <div class="section-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10">
                                        <!-- col-md-push-5 -->
                                        <div class="booking-cta mt-0">
                                            <h3>Make your reservation</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-10 ">
                                        <!-- col-md-pull-7 -->
                                        <div class="booking-form">
                                            <form action="{{route('storeRegTourguide.store',['id'=>$Tourguide->id])}}" class="form" id="form2" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <span class="form-label"   >Check In</span>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>


        </section>


</body>
</html>

@endsection
