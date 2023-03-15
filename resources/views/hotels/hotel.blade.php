<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset("assets/css/hotels.css")}}">
    <title>Hotels</title>
</head>
<body>
  @extends("temp")
  @section('bodyContent')
  
  
    <!-- HERO SECTION -->
    <section class="home" id="home"
    style="background-image:Url('{{$hotelInfo->cover_img}}')">
        <div class="container">
          <h1>{{$hotelInfo->name}}::</h1>
          <p>Discover your best stay</p>
        </div>
    </section>

      <!-- ABOUT HOTEL -->
      <section class="area top">
        <div class="container">
          <div class="heading">
            <h5>hotel info</h5>
            <h3>{{$hotelInfo ["name"]}}</h3>
          </div>
          <div class="content flex mtop">
            <div class="left">
              <img src="{{$hotelInfo->cover_img}}" alt="">
            </div>
            <div class="right">
              <ul>
                <li>{{$hotelInfo ["type"]}}</li>
              </ul>
              <!-- DESCRIPTION IF EXIST -->
                <p>{{$hotelInfo ["address"]}}<p>
            </div>
          </div>

          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Book NOW!</h4>
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
                                            <form> 
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <span class="form-label">Check In</span>
                                                            <input class="form-control" type="date" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="form-label">Check out</span>
                                                            <input class="form-control" type="date" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-btn">
                                                    <button class="submit-btn bookbtnn"onclick()><a href="">Send a request</a></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- rooms type -->
      <section class="offer mtop" id="services">
        <div class="container">
          <div class="heading">
            <h5>ROOMS TYPE</h5>
            <h3>You can get what you need</h3>
          </div>
          <!-- room type -->
          <div class="content grid2 mtop">
            <div class="box flex">
              <div class="left">
                <img src="" alt="">
              </div>
              <div class="right">
                <h4>Single Room</h4>
                <div class="rate flex">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <p> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h5>From $50.6/night</h5>
                <button class="flex1">
                  <span>Check Availability</span>
                  <i class="fas fa-arrow-circle-right"></i>
                </button>
              </div>
            </div>
            <div class="box flex">
              <div class="left">
                <img src="image/o2.jpg" alt="">
              </div>
              <div class="right">
                <h4>Double Room</h4>
                <div class="rate flex">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <p> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h5>From $50.6/night</h5>
                <button class="flex1">
                  <span>Check Availability</span>
                  <i class="fas fa-arrow-circle-right"></i>
                </button>
              </div>
            </div>
            <div class="box flex">
              <div class="left">
                <img src="image/o3.jpg" alt="">
              </div>
              <div class="right">
                <h4>Triple Room</h4>
                <div class="rate flex">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <p> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h5>From $50.6/night</h5>
                <button class="flex1">
                  <span>Check Availability</span>
                  <i class="fas fa-arrow-circle-right"></i>
                </button>
              </div>
            </div>
            <div class="box flex">
              <div class="left">
                <img src="image/o3.jpg" alt="">
              </div>
              <div class="right">
                <h4>Quad Room</h4>
                <div class="rate flex">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <p> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h5>From $50.6/night</h5>
                <button class="flex1">
                  <span>Check Availability</span>
                  <i class="fas fa-arrow-circle-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    

        <!-- ROOMS CARDS -->
      <section class="offer2 about wrapper timer top" id="shop">
        <div class="container">
          <div class="heading">
            <h5>EXCLUSIVE OFFERS </h5>
            <h3>You can get an exclusive offer </h3>
          </div>
          <div class="content grid  top">
            <div class="box">
                <div>
                    <img src="" alt="">
                </div>
              <!-- <h5>UP TO 30% OFF</h5> -->
              <h3>Room type</h3>
              <span>4.5 <label>(432 Reviews)</label> </span>
              <p>Description</p>
              <div class="flex">
                <!-- <i class="fal fa-alarm-clock"> Duration: 2Hours</i> -->
                <i class="far fa-dot-circle">price</i>
              </div>
              <button class="flex1">
                <a href="">Check Now!</a>
                <i class="fas fa-arrow-circle-right"></i>
              </button>
            </div>
        </div>
      </section> 
  @endsection
</body>
</html>











