<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tourguide</title>
    <link rel="stylesheet" href="{{ asset('./assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/css/framework.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/css/master.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="sidebar bg-white p-20 p-relative">
        <h3 class="p-relative txt-c mt-0">M.U.T.E</h3>
        <ul>
            <li>
                <a class=" d-flex align-center fs-14 c-black  rad-6 p-10 text-decoration-none"
                    href="{{ route('TourguideProfile.index') }}">
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
                <a class="active d-flex align-center fs-14 c-black  rad-6 p-10 text-decoration-none"
                    href="{{ route('tourguideRequests',['id'=>Auth::user()->Tourguide[0]->id]) }}">
                    <i class="fa-regular fa-chart-bar fa-fw"></i>
                    <span>Requests</span>
                </a>
            </li>

            {{-- <li>
              <a class="d-flex align-center fs-14 c-black rad-6 p-10"  >
                <i class="fa-regular fa-chart-bar fa-fw"></i>
                <span>Booking Requests</span>
              </a>
            </li> --}}
        </ul>
    </div>

    <h2 class="mt-0 mb-20">Requests</h2>
    {{-- {{dd($requests)}} --}}

    {{-- {{dd($places)}} --}}
    <div class="projects p-20 bg-white rad-10 m-20">
        <h2 class="mt-0 mb-20">Requests</h2>

        <div class="responsive-table">
            <table class="fs-15 w-full">
                <thead>
                    <tr>

                        {{-- <td>#</td> --}}
                        <td colspan="2">check In</td>
                        <td colspan="2">check out</td>
                        <td>client Name</td>


                        {{-- <td>license</td> --}}
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
{{-- @for($i=0 ; $i<count($requests);$i++)
{{$requests[$i]->price}}:{{$requests[$i]->type}}


@endfor --}}
{{-- {{dd($requests)}} --}}

                    @if (!empty($requests))

                    {{-- {{dd($requests)}} --}}
                        @foreach ($requests as $request)
                            <tr>

                                    <td colspan="2">{{ $request->check_in }}</td>
                                    <td colspan="2">{{ $request->check_out }}</td>
                                    {{-- <td>{{$request->check_in}}</td> --}}
                                    <td>{{ $request->clientName }}</td>






{{-- {{dd($request)}} --}}
                            <td>
                                <form action="{{ route('tourChangeStatus', ['id' => $request->id]) }}" method="POST"
                                    accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    {{-- <input type="text" name="hotel_id" value="{{ $request->hotel_id }}" hidden> --}}
                                         <h3>{{$request->status}}</h3>
                                    <button type="submit" name="status" value="Reject"
                                        class="title bg-red c-white btn-shape" title="Delete Student"
                                        onclick="return confirm('Confirm Reject?')">
                                        Reject
                                    </button>
                                    <button type="submit" name="status" value="Accept"
                                        class="title bg-green c-white btn-shape" title="Delete Student">
                                        Accept
                                    </button>
                                    <button type="submit" name="status" value="pending"
                                        class="title bg-orange c-white btn-shape" title="Delete Student">
                                        Pending
                                    </button>
                                </form>
                            </td>

                        @endforeach
                        </tr>
@endif
                </tbody>


            </table>

        </div>
</body>

</html>
