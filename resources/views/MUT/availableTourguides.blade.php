



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('./assets/css/Cards/placesCards.css')}}" >
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js')}}" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>


<link rel="stylesheet" href="{{asset('assets/css/Cards/tourguideCards.css')}}">
<section class="blog top mt-3" id="blog">
    <div class="container">
      <div class="heading">
        <h5>OUR TOURGUIDE</h5>
        <h3>Discover your best trip in Aswan</h3>
      </div>

      <div style="text-align: center;" class="mb-4">
        <button class="button">TOURGUIDE</button>
     </div>



        <div class="container tourguideCard">
          <div class="row">
          <div class="row g-5" style="margin-top: 1rem;" >
              @foreach ($availableTourguides as $Tourguide)
                      <div class="col-lg-4  col-sm-6 col-12 rounded">
                          <div class="card border-0 me-lg-4 mb-lg-0 mb-4 ">
                              <div class="backgroundEffect"></div>
                              <div class="pic">
                                  <img class="" src="  'img/'.{{ asset($Tourguide->User->image) }}" alt="">
                                  <div class="date">
                                      <a href="{{route('bookWithTourguide',['order'=>$order,'tourguide'=>$Tourguide->id])}}"><span class="day">Book now!</span></a>
                                  </div>
                              </div>
                              <div class="content">
                                  <h2>{{$Tourguide->User->name}}</h2>
                                  <p class="text-muted mt-3">price {{$Tourguide->price_per_day}} /day</p>
                                      {{-- @foreach($Tourguide->languages as $item)
                                          <h6 class="h-2 mt-4"><br>{{$item['language']}} </h6>
                                      @endforeach  --}}
                                  <p class="description" style="color:black">Language : </p>
                                  @foreach( $Tourguide->languages as $lang)
                                  <h1>  {{$lang->language}}</h1>
                                    @endforeach
                                  <h6 class="h-2 mt-4"><br> Bio:{{isset($Tourguide->bio)?:"you will enjoy your Time"}}</h6>
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
      </div>

<!-- ===================Card================= -->

<form action="{{route('getAvailablePlaces',['order'=>$order->id])}}">

    <button type="submit" >back</button>
</form>
      </div>

</div>




<form action="{{route('MUTE')}}" method="POST">
    @csrf
    <div class="form-btn d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="submit-btn m-5" type="submit">skip &submit MUTE</button>
      </div>
</form>


    </div>
  </section>



    </body>
</html>












