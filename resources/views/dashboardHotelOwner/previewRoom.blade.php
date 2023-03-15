<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel</title>
    <link rel="stylesheet" href="{{asset("./assets/css/all.min.css")}}" />
    <link rel="stylesheet" href="{{asset("./assets/css/framework.css")}}" />
    <link rel="stylesheet" href="{{asset("./assets/css/master.css")}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
  </head>

  <body>


    <a href="{{route('MyOwnedHotels')}}">    <h1 class="p-relative">My Hotels</h1></a>
    <div class="courses-page d-grid m-20 gap-20">
        {{-- {{$hotel}} --}}

    {{-- {{dd($allHotels)}} --}}
    @include('sweetalert::alert');
    <div class="page d-flex">
<div class="sidebar bg-white p-20 p-relative">
        <h3 class="p-relative txt-c mt-0">Safary</h3>
        <ul>
          <li>
            <a class=" d-flex align-center fs-14 c-black  rad-6 p-10 text-decoration-none" href="{{route('hotelOwnerDashboard')}}">
              <i class="fa-regular fa-chart-bar fa-fw"></i>
              <span>My Dashboard</span>
            </a>
          </li>
          {{-- <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="add_room.html">
              <i class="fa-solid fa-gear fa-fw"></i>
              <span>Add Room</span>
            </a>
          </li> --}}
          <li>
            <a class=" d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="{{route('MyOwnedHotels')}}">
              <i class="fa-solid fa-graduation-cap fa-fw"></i>
              <span>Hotels</span>
            </a>
          </li>
          <li>
            <a class="active d-flex align-center fs-14 c-black  rad-6 p-10 text-decoration-none" href="{{route('addHotelView')}}">
              <i class="fa-regular fa-chart-bar fa-fw"></i>
              <span>Add Hotel</span>
            </a>
          </li>
          {{-- <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="{{route('addRoomForm')}}">
              <i class="fa-regular fa-circle-user fa-fw"></i>
              <span>Add Rooms</span>
            </a>
          </li> --}}
          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{route('MyOwnedHotels')}}" >
              <i class="fa-regular fa-chart-bar fa-fw"></i>
              <span>Booking Requests</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="content w-full">
        <!-- Start Head -->
        <div class="head bg-white p-15 between-flex">
          <div class="search p-relative">
            <input class="p-10" type="search" placeholder="Type A Keyword" />
          </div>
          <div class="icons d-flex align-center">
            <span class="notification p-relative">
              <i class="fa-regular fa-bell fa-lg"></i>
            </span>
            <img src="imgs/avatar.png" alt="" />
          </div>
        </div>
        <!-- End Head -->

        <h1 class="p-relative">Hotels</h1>
        <a  href="{{route('addHotelView')}}" class="title bg-blue c-white btn-shape">+ </a>
        @foreach($allHotels as $hotel)

        <div class="p-20">
            <h4 class="m-0">Type :{{$room->type}}</h4>
            <h4 class="m-0">price per one night :{{$room->price}}EGP</h4>
            <h4 class="m-0">number of available rooms :{{$room->n_of_available_rooms}}</h4>


          <a href="{{route('previewRoom',['roomID'=>$room->id])}}" class="title bg-green c-white btn-shape">Preview </a>
          <a href="{{route('deleteRoom',['roomID'=>$room->id])}}" class="title bg-red c-white btn-shape">delete </a>
          <a href="{{route('editRoom',['roomID'=>$room->id])}}" class="title bg-blue c-white btn-shape">Edit </a>

        </div>
            {{-- <div class="info p-15 p-relative between-flex">
              <span class="title bg-blue c-white btn-shape">Hotel Info</span>
              <span class="c-grey">
                <i class="fa-regular fa-user"></i>
                950
              </span>
              <span class="c-grey">
                <i class="fa-solid fa-dollar-sign"></i>
                165
              </span>
            </div> --}}
          </div>

        </div>

        @endforeach
      </div>
    </div>
  </body>
</html>




















