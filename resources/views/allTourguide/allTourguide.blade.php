@extends("temp")
@section('bodyContent')


<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Google Web Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./assets/home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./assets/home/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("./assets/home/css/style.css")}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset("./assets/css/index.css")}}">
<link rel="stylesheet" href="{{asset('assets/css/Cards/tourguideCards.css')}}"> --}}
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> 
    <title>Tourguide</title>
 </head>
<body>
    

{{-- ======================================================================================= --}}

<div class="container ">
    <div class="row g-5"  >
     @foreach ($allTourGides as $Tourguide)
     <div class="col-lg-4  col-sm-6 col-12 rounded" >
       <div class="card-deck">
        <div class="card">
          <img class="card-img-top" src="  'img/'.{{ asset($Tourguide->User->image) }}" alt="">
        
        <div class="card-body">
          <h5 class="card-title">{{$Tourguide->User->name}}</h5>
          <span class="card-text">syndicate_No:{{$Tourguide->syndicate_No}}</span>
          <span>price {{$Tourguide->price_per_day}} L.E/day</span>
          <p class="description" style="color:black">Language : </p>
          @foreach($Tourguide->languages as $item)
              <span class="description">{{$item['language']}},</span>
          @endforeach
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
  @endforeach
       </div>
      </div>
  </div>

 @endsection

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>  
</body>
</html>

































