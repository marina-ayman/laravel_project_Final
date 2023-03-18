
@extends("temp")
@section('bodyContent')



{{-- @extends('MUT.multistepsNav')
@section('customBoddy') --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./assets/home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./assets/home/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("./assets/home/css/style.css")}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset("./assets/css/index.css")}}">
    <title>availablehotels to book</title>
</head>
<body>
    {{-- {{dd(json_decode($availableRooms))}} --}}

{{-- {{dd($hotel->id)}} --}}

    <?php $prev_room =null; ?>
    <form action="{{route('BookInHotel',['order'=>$order->id,'hotel'=>$hotel->id])}}" method="POST">
      @csrf
<div class="container" style="margin:10rem">
    <div class="row">
        @foreach (json_decode($availableRooms) as $room )
        @if($prev_room != $room )
        <?php $prev_room = $room; ?>
        @if($room->hotel_id  == $hotel['id'] && $prev_room->type == $room->type && $prev_room->price == $room->price)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="package-item bg-white mb-2">
                <img class="img-fluid" src="/storage/imgs/'.{{$room->cover_img}}.'" alt="">
                <div class="p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Aswan</small>
                        {{-- <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3 days</small>
                         --}}
                         @if($room->type == "triple")
                        <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>3 Person</small>
                    @endif
                         @if($room->type == "double")
                        <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small>
                    @endif
                         @if($room->type == "single")
                        <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>1 Person</small>
                    @endif
                    </div>
                    <a class="h5 text-decoration-none" href="{{route('hotel.show',['id'=>$hotel->id])}}">{{$hotel->name}}</a>
                    <div class="border-top mt-4 pt-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                            <h5 class="m-0">{{$room->price}}EGP</h5>
                        </div>

                    </div>
                    <input type="checkbox" name="room_id[]" value="{{ $room->id }}" >
                    <input type="text" name="percent" value="{{ $percent }}" hidden>
                    <input type="text" name="restOfBudget" value="{{ $restOfBudget }}" hidden>
                </div>
            </div>






        </div>
        @endif
        @endif
        @endforeach

    </div>
    <button class="btn btn-success" type="submit">continue My Trip</button>
</div>

    </form>

    <form action="{{route('getAvailableHotels',['budgetForHotels'=>$percent*100,'order'=>$order->id])}}" >
        @csrf
        <button type="submit" class="btn btn-success">Back</button>



    </form>
    <a href="{{route("cancelOrder",['orderID'=>$order->id])}}" type="submit" class="btn btn-danger">cancel the Trip</a>
       <!-- JavaScript Libraries -->
       <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
       <script src="{{asset("./assets/home/lib/easing/easing.min.js")}}"></script>
       <script src="{{asset("./assets/home/lib/owlcarousel/owl.carousel.min.js")}}"></script>
       <script src="{{asset("./assets/home/lib/tempusdominus/js/moment.min.js")}}"></script>
       <script src="{{asset("./assets/home/lib/tempusdominus/js/moment-timezone.min.js")}}"></script>
       <script src="{{asset("./assets/home/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js")}}"></script>


       <!-- Template Javascript -->
       <script src="{{asset("./assets/home/js/main.js")}}"></script>
</body>








    </div>

    <button type="submit" >Book Now & next step </button>
</form>



</body>
</html>

@endsection




