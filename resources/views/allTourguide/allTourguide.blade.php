


<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
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
{{-- <link rel="stylesheet" href="{{asset('assets/css/Cards/tourguideCards.css')}}"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
    <title>Tourguide</title>
 </head>
<body>

    @extends("temp")
@section('bodyContent')


    <!-- ===================== -->

    <!-- ===================== bagination ===================== -->

    <!-- ===================== cards ===================== -->
    <section>
        <div class="container tourguideCard">
            <div class="row g-5"  >
                @foreach ($allTourGides as $Tourguide)
                        <div class="col-lg-4  col-sm-6 col-12 rounded" >
                            <div class="card border-0 me-lg-4 mb-lg-0 mb-4 " style="margin-top: 1rem;margin-button:1rem">
                                <div class="backgroundEffect"></div>
                                <div class="pic">
                                    <img class="" src="  'img/'.{{ asset($Tourguide->User->image) }}" alt="">
                                    <div class="date">
                                        <span class="day">Book now!</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <h2>{{$Tourguide->User->name}}</h2>
                                    <p class="text-muted mt-3">price {{$Tourguide->price_per_day}} /day</p> 
                                        {{-- @foreach($Tourguide->languages as $item)
                                            <h6 class="h-2 mt-4"><br>{{$item['language']}} </h6>
                                        @endforeach  --}}
                                    <p class="description" style="color:black">Language : </p>
                                        @foreach($Tourguide->languages as $item)
                                            <span class="description">{{$item['language']}},</span>
                                        @endforeach
                                    <h6 class="h-2 mt-4"><br> Bio:{{$Tourguide->bio}}</h6>
                                    <div class="d-flex align-items-center justify-content-between mt-3 pb-3">
                                        <div class="d-flex align-items-center justify-content-center foot">
                                            <p class="admin">syndicate_No:{{$Tourguide->syndicate_No}} </p>
                                        </div>
                                    </div>
                                    <div class="btn" data-bs-toggle="modal" data-bs-target="#myModal">Book now!</div>
                                </div>
                            </div> 
                        </div>
                        @endforeach
            </div>
        </div>
          <!-- The Modal -->
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
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
     </section>
 @endsection

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>  
</body>
</html>
