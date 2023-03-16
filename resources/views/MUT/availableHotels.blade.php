
@extends("temp")
@section('bodyContent')


@extends('MUT.multistepsNav')
@section('customBoddy')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('./assets/css/hotels.css')}}" >
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js')}}" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>

  {{-- {{dd($availableRooms)}} --}}
  {{-- {{dd($message)}} --}}

<section class="container blog top mt-3" id="blog">
  <div class="container">
    <div class="heading">
      <h5>OUR HOTELS</h5>
      <h3>Discover your best stay</h3>
    </div>


    <div class="container">
      <div class="row g-5" style="margin-top: 1rem;">


    <?php $prev_hotel =null;
    $allHotels=[];
         ?>
         @if(!empty($availableRooms))
           @foreach ($availableRooms as $room )

           @if($prev_hotel != $room->Hotel  )
           <?php $prev_hotel = $room->Hotel; ?>
        @if(!in_array($prev_hotel,$allHotels))
         <?php  array_push($allHotels,$prev_hotel) ;?>

        <div class="col-lg-4  col-sm-6 col-12 rounded ">


          <div class="content  mtop">
            <div class="box">
              <div class="img">
                <img src=" {{$room->Hotel->cover_img}} " alt="">
                <span>Hotel {{$room->Hotel->id}} </span>
              </div>
              <div class="text">
                <!-- <div class="flex">
            <i class="far fa-user"> <label>Admin</label> </i>
            <i class="far fa-comments"> <label>Comment</label> </i>
          </div> -->
                <h3>Hotel Name {{$room->Hotel->name}} </h3>
                <p>
                  <form action="{{route('getAvailableRooms',['order'=>$order->id,'hotel'=>$room->hotel_id])}} " method="POST">
                    @csrf
                    <input type="text" name="availableRooms" value="{{ $availableRooms }}" hidden>
                    <input type="text" name="percent" value="{{ $percent }}" hidden>

                    <button type="submit" >view Rooms &Book here</button>
                </form>

                </p>
                <a href="#">Read More <i class='fas fa-long-arrow-alt-right'></i></a>
              </div>
            </div>
          </div>

        </div>
        @endif
        @endif
        <?php $prev_hotel = $room->Hotel; ?>
        @endforeach
        @endif
        <form action="{{route('getAvailablePlaces',['order'=>$order->id])}}" method="POST">
            @csrf
            <input type="text" name="availableRooms" value="{{ $availableRooms }}" hidden>
            <input type="text" name="percent" value="{{ $percent }}" hidden>
            <input type="text" name="restOfBudget" value="{{ $restOfBudget }}" hidden>
          <button type="submit" >Next Step </button>
        </form>
      </div>
    </div>
    {{-- <div class="form-btn d-grid gap-2 d-md-flex justify-content-md-end">
      <button class="submit-btn m-5"   >Confirm</button>
    </div> --}}
  </div>
</section>







</body>
</html>
@endsection
