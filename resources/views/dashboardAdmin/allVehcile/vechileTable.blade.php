@extends('dashboardAdmin.dashboardViewAdmin')

@section('dashbourdAdmon')

<body>
    <div class="projects p-20 bg-white rad-10 m-20">
        <h2 class="mt-0 mb-20">vechicle</h2>
        <a href="{{route("VehiclleDash.create")}}" class="label btn-shape bg-red c-white">+</a>
        <div class="responsive-table">
          <table class="fs-15 w-full">
            <thead>

                <tr>
                    <td>Name</td>
                    <td>image</td>
                    <td>type</td>
                    <td>license</td>
                    <td>Action</td>
                  </tr>

            </thead>
            <tbody>
                @foreach ($allVehicle as $Vehicle)
         <tr>
            <td>{{$Vehicle->driver_id->users['name']}}</td>
           {{-- <td>{{$Trips->trip_id->users['name']}}</td> --}}
           <td><img src="{{ asset('img/'.$Vehicle->image) }}" alt="" width="75px">
           </td>
           <td>{{$Vehicle->type}}</td>
   <td>{{$Vehicle->license}}</td>
   <td>
            <a href="{{route('editVehicle',['id'=>$Vehicle->id])}}" class="btn btn-outline-success">Edit</a>
            edit
          </a>
            <a href="{{route('VehiclleDash.destroy',['id'=>$Vehicle->id])}}"  accept-charset="UTF-8" style="display:inline" onclick="return confirm('Confirm delete?')"  >
delete

</a>

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

