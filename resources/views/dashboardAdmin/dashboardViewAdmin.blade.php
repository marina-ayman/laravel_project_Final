
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="assets/Admindash/css/all.min.css" />
    <link rel="stylesheet" href="assets/Admindash/css/framework.css" />
    <link rel="stylesheet" href="assets/Admindash/css/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
  <div class="page d-flex">
      <div class="sidebar bg-white p-20 p-relative">
        <h3 class="p-relative txt-c mt-0"><a href="{{route("homePage")}}" style="text-decoration:none ; color: black">M.U.T.E</a></h3>
        <ul>

          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="{{route('UserDash.index')}}">
              <i class="fa-regular fa-credit-card fa-fw"></i>
              <span> userss </span>
            </a>
          </li>

          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="{{route('tourgideDash.index')}}">
              <i class="fa-regular fa-credit-card fa-fw"></i>
              <span> Tourgide </span>
            </a>
          </li>

          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="{{route('hotelOwnerDash.index')}}">
              <i class="fa-regular fa-credit-card fa-fw"></i>
              <span> Hotel Owner </span>
            </a>
          </li>

          <li>
            {{-- <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="{{route('getdriverDash.index')}}">
              <i class="fa-regular fa-credit-card fa-fw"></i>
              <span> Driver </span>
            </a> --}}
          </li>


          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="{{route('PlaceeDash.index')}}">
              <i class="fa-regular fa-user fa-fw"></i>
              <span> placessTable</span>
            </a>
          </li>
          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="{{route('TrippDash.index')}}">
              <i class="fa-solid fa-diagram-project fa-fw"></i>
              <span>tripTable </span>
            </a>
          </li>
          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="{{route('VehiclleDash.index')}}">
              <i class="fa-solid fa-graduation-cap fa-fw"></i>
              <span>vechileTable </span>
            </a>
          </li>
          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none"  href="{{route('OrderrDetails.index')}}" >
              <i class="fa-regular fa-circle-user fa-fw"></i>
              <span> Orderr details </span>
            </a>
          </li>
          {{-- <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="plans.html">
              <i class="fa-regular fa-credit-card fa-fw"></i>
              <span><a href="{{route('tourguideeeform')}}" > tourguideeeform </a></span>
            </a>
          </li> --}}

          {{-- <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="plans.html">
              <i class="fa-regular fa-credit-card fa-fw"></i>
              <span><a href="{{route('userrform')}}" > userrform </a></span>
            </a>
          </li> --}}
          <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none"href="{{route('AdminDash')}}">
              <i class="fa-regular fa-credit-card fa-fw"></i>
              <span> Request </span>
            </a>
          </li>


        </ul>
      </div>

      @yield('dashbourdAdmon')

  </div>

</body>
</html>
