<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="{{asset('assets/css/hotels.css')}}">
    <title>Hotels</title>
</head>
<body>
@extends("temp")
@section("bodyContent")
      <!-- Room CARD -->
  <section class="room wrapper2 top" id="room">
    <div class="container">
      <div class="heading">
        <h5>OUR ROOMS</h5>
        <h2>Fascinating rooms & suites </h2>
      </div>
      <div class="content flex mtop">
        <div class="left grid2">
          <div class="box">
            <!-- <i class="fas fa-desktop"></i> -->
            <i class="fa-solid fa-bed"></i>
            <!-- <i class="fa-solid fa-bed-front"></i> -->
            <p>Room Type</p>
            <h3>{{$roomInfo ["type"]}}</h3>
          </div>
          <div class="box">
            <i class="fas fa-dollar-sign"></i>
            <p>Price</p>
            <h3>{{$roomInfo ["price"]}} L.E</h3>
          </div>

          <div class="box">
            <!-- <i class="fal fa-alarm-clock"></i> -->
            <i class="fa-regular fa-credit-card"></i>
            <p> Costs you bear</p>
            {{-- <h3><a href="" style="">Book Now</a></h3> --}}
          </div>
          <button type="button" class="fa-regular " data-toggle="modal" data-target="#exampleModal">
            Book Now
          </button>
        </div>
        <!-- room img -->
        <div class="right">
          <img src="../storage/imgs/{{$roomInfo->cover_img}}" alt="" style="width: 50rem; height:25rem;">
        </div>
      </div>
      <div>
        {{-- {{dd($roomInfo->RoomImg)}} --}}

        <div class="container my-5 " style="display:flex;
        justify-content: center;">
        <style>
          .imgs:hover{
scale:1.2;  
border: 7px  rgb(232, 156, 63) solid;       
 }

        </style>
          <div class="row">
            @foreach($roomInfo->RoomImg as $img)
            <img src="../storage/imgs/{{$img->image}}" alt="" class="imgs" style="width: 10rem; height:10rem; " >
            <img src="../storage/imgs/{{$img->image}}" alt="" class="imgs" style="width: 10rem; height:10rem;" >
            <img src="../storage/imgs/{{$img->image}}" alt="" class="imgs" style="width: 10rem; height:10rem;" >
            @endforeach
          </div>
       
      </div>
      </div>
  
   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{route("storeRegRoom.store",['id'=>$roomInfo ["id"]])}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-6">
              <div class="form-group">
                  <span class="form-label" >Check In</span>
                  <input class="form-control" type="date" name="check_in" required>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                  <span class="form-label">Check out</span>
                  <input class="form-control" type="date" name="check_out" required>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                  <span class="form-label">n_of_adults</span>
                  <input class="form-control" type="number" name="n_of_adults" placeholder="0" required>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                  <span class="form-label">n_of_childeren</span>
                  <input class="form-control" type="number" name="n_of_childeren"  placeholder="0" required>
              </div>
          </div>
          
        
         
      </div>
      <div class="form-btn">
          <button class="fa-regular "onclick() type="submit">Send a request</button>
      </div>
     
      {{-- <div class="form-btn">
        <button class="submit-btn bookbtnn"onclick() type="submit">Send a request</button>
    </div> --}}
      
      @auth
    <input type="text" name="user_id" value="{{Auth::user()->id}}">
      @endauth
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="fa-regular ">Save changes</button>

      </div>
    </form>
    </div>
  </div>
</div>
</div>
  </section>
  @endsection

</body>
</html>