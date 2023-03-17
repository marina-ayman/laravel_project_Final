

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


    <form action="" method="POST">
      @csrf
<div class="container" style="margin:10rem">
    <div class="container bg-white pt-5">
        <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="" alt="Image">
        <h1 class="font-weight-bold">{{isset($order->User->name)?$order->User->name:Ahmed}}</h1>
        <div class="row blog-item px-3 pb-5">
            @if($BookedRooms)
            @foreach($BookedRooms as $room)
            <div class="col-md-5">
                <img class="img-fluid mb-4 mb-md-0" src="./assets/asset/img/axp-photography-Ih4RkQ554bQ-unsplash.jpg" alt="Image">
            </div>
            <div class="col-md-7">
                <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Booked Rooms Status :
                </h3>
                {{$room->room_status}}
                <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
               @endforeach
               @endif
            </div>
        <div class="row blog-item px-3 pb-5">
            @if($BookedTourguide)
            @foreach($BookedTourguide as $room)
            <div class="col-md-5">
                <img class="img-fluid mb-4 mb-md-0" src="./assets/imgs/3.png.jpg" alt="Image">
            </div>
            <div class="col-md-7">
                <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">TourGuide Request :
                </h3>
                {{$room->room_status}}
                <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
               @endforeach
               @endif
            </div>
        <div class="row blog-item px-3 pb-5">
            @if($orderedPlaces)
            @foreach($orderedPlaces as $room)
            <div class="col-md-5">
                <img class="img-fluid mb-4 mb-md-0" src="./assets/imgs/3.png.jpg" alt="Image">
            </div>
            <div class="col-md-7">
                <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Ordered Places Approval:
                </h3>
                {{$room->room_status}}
                <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
               @endforeach
               @endif
            </div>
            <h1 align="center">Your Payment</h1>
            <h1>totalPaidInPlaces :{{$totalPaidInPlaces}} EGP</h1>
            <h1>totalPaidInRooms :{{$totalPaidInRooms[0]->sum}} EGP</h1>
            <h1>totalPaidInTourguide :{{$totalPaidInTourguide}}EGP</h1>
        </div>

    </div>
    <button class="btn btn-success" type="submit">send</button>
</div>

    </form>
    <button type="submit" class="btn btn-success">Back </button>


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
