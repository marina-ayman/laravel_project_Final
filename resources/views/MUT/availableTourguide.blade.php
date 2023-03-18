

{{-- ================================================ --}}


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


    

  @if($availableTourguides)
  @foreach ($availableTourguides as $Tourguide)

            <div class="box" style="width:23rem">
              <!-- hotel img -->
              <div class="img">
                {{-- <img class="" src="  'img/'.{{ asset($Tourguide->User->image) }}" alt=""> --}}
                <img src="{{url('http://localhost:8000/storage/imgs/'.$Tourguide->User->image)}}" alt="" style="height: 16rem; width:23rem" >
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
       @endforeach
       @endif
          </div>
        </div>







</body>
</html>