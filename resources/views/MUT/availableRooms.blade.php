
@extends("temp")
@section('bodyContent')



@extends('MUT.multistepsNav')
@section('customBoddy')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
<link rel="stylesheet" href="{{asset("./assets/css/index.css")}}">
    <title>availablehotels to book</title>
</head>
<body>
    {{-- {{dd(json_decode($availableRooms))}} --}}

{{-- {{dd($hotel->id)}} --}}

    <?php $prev_room =null; ?>
    <form action="{{route('BookInHotel',['order'=>$order->id,'hotel'=>$hotel->id])}}" method="POST">
      @csrf
     @foreach (json_decode($availableRooms) as $room )
     @if($prev_room != $room )
     <?php $prev_room = $room; ?>
{{-- {{dd($hotel['id'])}} --}}
{{-- {{dd($room)}} --}}
     @if($room->hotel_id  == $hotel['id'] && $prev_room->type == $room->type && $prev_room->price == $room->price)

  <div class="row pb-3">
    <div class="col-lg-4 col-md-6 mb-4 pb-2">
      <div class="blog-item">
          <div class="position-relative">
              <img class="img-fluid w-100" src="{{$room->cover_img}}"  alt="">
              <div class="blog-date">
                  <h6 class="font-weight-bold mb-n1">{{$room->id}}</h6>
                  <small class="text-white text-uppercase">price per one night per one person{{$room->price}} </small>
              </div>
          </div>
          <div class="bg-white p-4">
              <div class="d-flex mb-2">
                  <a class="text-primary text-uppercase text-decoration-none" href="">   <input type="checkbox" name="room_id[]" value="{{ $room->id }}" ></a>
                  <span class="text-primary px-2">|</span>
                  <a class="text-primary text-uppercase text-decoration-none" href="">type of the room {{$room->type}}</a>
              </div>
              <a class="h5 m-0 text-decoration-none" href="">Dolor justo sea kasd lorem clita justo diam amet</a>
          </div>
      </div>
  </div>

  @endif
  @endif
  @endforeach
  <button type="submit" >Book Now & next step </button>

  </div>

</form>
<form action="{{route('getAvailableHotels',['budgetForHotels'=>$percent*100,'order'=>$order->id])}}" >
  @csrf
 
<button type="submit" >Back </button>
</form>









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
</body>
</html>

@endsection
