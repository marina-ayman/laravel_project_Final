@extends('dashboardAdmin.dashboardViewAdmin')

@section('dashbourdAdmon')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{asset("./assets/Admindash/css/all.min.css")}}" />
    <link rel="stylesheet" href="{{asset("./assets/Admindash/css/framework.css")}}" />
    <link rel="stylesheet" href="{{asset("./assets/Admindash/css/master.css")}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    {{-- {{dd($places)}} --}}
        <div class="projects p-20 bg-white rad-10 m-20">
          <h2 class="mt-0 mb-20">Places</h2>
          <a href="{{route("PlaceeDash.create")}}" class="label btn-shape bg-red c-white">+</a>
          <div class="responsive-table">
            <table class="fs-15 w-full">
              <thead>
                <tr>
                  <td>Name</td>
                  <td>cover_img</td>
                  <td>description</td>
                  <td>price</td>
                  <td>type</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
         
              @foreach ($places as $place)
                <tr>
       {{-- {{dd($place->id)}}; --}}
                  <td>{{$place->name}}</td>
                  <td><img src="../../storage/imgs/{{$place->cover_img}}" alt="" width="75px">

                  <td>{{$place->description}}</td>
                  <td>{{$place->price}}</td>
                  <td>{{$place->type}}</td>
                  <td>
                    <a class="btn btn-outline-danger" href="{{route("PlaceeDash.destroy",['id'=>$place->id])}}">Delete</a>
                    <a class="btn btn-outline-danger" href="{{route('PlaceDash.update',['id'=>$place->id])}}">update</a>
                </td>

                 @foreach ($placeImg as $placeimg)
                  <td><img src="{{$placeimg->image}}"></td>
                  @endforeach
                  <td>

                    {{-- <button  class="label btn-shape bg-green c-white">
                      <a href="{{route('PlaceDash.edit',['id'=>$place->id])}}" class="btn btn-outline-success">Edit</a>
                      </button>

                      <button  class="label btn-shape bg-red c-white">
                        <a href="{{route('PlaceeDash.destroy',['id'=>$place->id])}}" class="title bg-red c-white btn-shape"  onclick="return confirm('Are you sure you want to delete?')" >delete </a>
                      </button> --}}

                      {{-- {{dd($place->id)}} --}}
                    {{-- <form method="POST" action="{{route('PlaceeDash.destroy'),[ 'id'=>$place->id ] }}" accept-charset="UTF-8" style="display:inline">
                      @csrf
                      @method('DELETE');



                      <button type="submit" class="btn btn-outline-danger" title="Delete Student" onclick="return confirm('Confirm delete?')">
                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                       Deletee
                      </button>

                  </form>  --}}
                  </td>

                </tr>
       
                  @endforeach
              </tbody>

            </table>
          </div>
        </div>


</body>
</html>

@endsection
