@extends('dashboardAdmin.dashboardViewAdmin')

@section('dashbourdAdmon')
    


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Friends</title>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="assets/Admindash/css/all.min.css" />
    <link rel="stylesheet" href="assets/Admindash/css/framework.css" />
    <link rel="stylesheet" href="assets/Admindash/css/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
<style>
  nav.primary-navigation {
    display: block;
    padding: 10px 0 0 0;
    text-align: start;
    font-size: 16px;
  }
  nav.primary-navigation ul li {
    list-style: none;
    margin: 0 auto;
    border-left: 5px solid #3ca0e7;
    border-radius: 10px;
    display: inline-block;
    padding: 0 30px;
    position: relative;
    text-decoration: none;
    text-align: center;
    font-family: arvo;
  }
  nav.primary-navigation li a {
    color: black;
  }
  nav.primary-navigation li a:hover {
    color: #3ca0e7;
  }
  nav.primary-navigation li:hover {
    cursor: pointer;
  }
  nav.primary-navigation ul li ul {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    padding-left: 0;
    left: 0;
    display: none;
    background: white;
  }
  nav.primary-navigation ul li:hover > ul,
  nav.primary-navigation ul li ul:hover {
    visibility: visible;
    opacity: 1;
    display: block;
    min-width: 250px;
    text-align: left;
    padding-top: 20px;
    box-shadow: 0px 3px 5px -1px #ccc;
  }
  nav.primary-navigation ul li ul li {
    clear: both;
    width: 100%;
    text-align: left;
    margin-bottom: 20px;
    border-style: none;
  }
  nav.primary-navigation ul li ul li a:hover {
    padding-left: 10px;
    border-left: 2px solid #3ca0e7;
    transition: all 0.3s ease;
  }

  a {
    text-decoration: none;
  }
  a:hover {
    color: #3CA0E7;
  }

  ul li ul li a {
    transition: all 0.5s ease;
  }
</style>
  {{-- /* ========================================================================================== */ --}}
<body>
    @include('sweetalert::alert')
    <div class="page d-flex">
      <div class="content w-full">
        <!-- Start Head -->
        <div class="head bg-white p-15 between-flex">
          <div class="search p-relative">
            <input class="p-10" type="search" placeholder="Type A Keyword" />
          </div>
                   {{-- Add Users  --}}
            <nav  class="primary-navigation">
              <ul>
                <li  style="background-color: rgb(196, 228, 255);padding: 1rem; ;"><a  href="#">Add User &dtrif;</a>
                  <ul class="dropdown">
                    <li>  <a class="dropdown-item" href="{{route('UserDash.create')}}"> 😎User</a></li>
                    <li>   <a class="dropdown-item" href="{{route('driverDash.create')}}">🚐User AS Driver</a></li>
                    <li>   <a class="dropdown-item"  href="{{route('tourgideDash.create')}}">💁‍♂️User AS Tourguide</a></li>
                    {{-- <li>  <a class="dropdown-item" href="{{route('hotelOwnerDash.create')}}">💖User AS HotelOwner</a></li> --}}
                  </ul>
                  </li>
              </ul>
            </nav>
          <div class="icons d-flex align-center">
            <span class="notification p-relative">
              <i class="fa-regular fa-bell fa-lg"></i>
            </span>
            <img src="imgs/avatar.png" alt="" />
          </div>
        </div>

        <!-- =========== -->
        <!-- End Head -->
        <div class="projects p-20 bg-white rad-10 m-20">
          <h2 class="mt-0 mb-20">Tourguide</h2>
            <div class="responsive-table">
              <table class="fs-15 w-full">
                <thead>
                  <tr>
                    <td>#</td>
                    <td>image</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Gender</td>
                    <td>Syndicate_No</td>
                    <td>Price</td>
                    <td>Bio</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tourGides as $tourgide)
                    <tr>
                      {{-- {{dd($tourgide->user->role->name) }}  --}}
                      @if($tourgide->user->role->name == 'tourguide')
                        <td>{{ $tourgide->user->id}}</td> 
                        {{-- <td><img src="../../storage/imgs/{{$tourgide->user->image}}"></td> --}}
                        <td><img src="{{url('http://localhost:8000/storage/imgs/'.$tourgide->user->image)}}"></td>
                        <td>{{ $tourgide->user->name}}</td>
                        <td>{{ $tourgide->user->email}}</td>
                        <td>{{ $tourgide->user->gender}}</td>
                        <td>{{ $tourgide->syndicate_No}}</td> 
                        <td>{{ $tourgide->price_per_day}}</td>   
                        <td>{{ $tourgide->bio}}</td>   
                        <td>
                          <a href="{{route('deleteUser',['UserID'=>$tourgide->user->id])}}" class="title bg-red c-white btn-shape" onclick="return confirm('Are you sure you want to delete?')" >delete </a>
                        </td>
                      @endif    
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div> 


        
        
        
        
        
        
        
        
        
        
        
        
{{--         
        
        
        <!-- start pagination -->
             <div class="container d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item"> <a href="#" class="page-link">Previous</a></li>
                    <li class="page-item"> <a href="#" class="page-link">1</a></li>
                    <li class="page-item"> <a href="#" class="page-link">2</a></li>
                    <li class="page-item"> <a href="#" class="page-link">3</a></li>
                    <li class="page-item"> <a href="#" class="page-link">4</a></li>
                    <li class="page-item"> <a href="#" class="page-link">5</a></li>
                    <li class="page-item"> <a href="#" class="page-link">Next</a></li>
                  </ul>
                </nav>
              </div>
      </div>
    </div> --}}






  </body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>


@endsection