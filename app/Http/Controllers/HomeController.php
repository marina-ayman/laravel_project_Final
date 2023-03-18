<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }




    // ===============================================
      //
        // dd($budgetForHotels);
        // $percent=(int)$budgetForHotels/100;
        // dd($order->OrderedRoomType);

        // $ns = 5;
        // // DB::table('ordered_room')->  ->select(DB::raw('count(room_id)as count'))->where('order_id',$order->id)->where('type','single')->get() ;
        // $nd = 0;
        // $nt = 1;
        // $i = 0;
        // $packeg = [];

        // $hotels= Hotel::all();
        // foreach ($hotels as $hotel)
        // {
        //     $ts = Room::where('type', 'single')->where('hotel_id', $hotel->id)->first();
        //     $td = Room::where('type', 'double')->where('hotel_id', $hotel->id)->first();
        //     $tt = Room::where('type', 'triple')->where('hotel_id', $hotel->id)->first();

        //     if (($ns*$ts['price'] + $nd*$td['price']) + $nt*$tt['price'] <= $budget)
        //     {
        //         $packeg[$i] = [
        //             'single' => ['room' => $ts, 'number' => $ns],
        //             'double' => ['room' => $td, 'number' => $nd],
        //             'triple' => ['room' => $tt, 'number' => $nt]
        //         ];
        //         $i++;
        //     }
        // }
        // dd($packeg);

        // dd($budgetForHotels);

        // $order->budget;
        // dd($order->budget);
        // dd($percent);

           // $bookedRooms=[];
        // $i=0;
        // foreach($request->room_id as $room){
        //     $room=Room::find($request->room_id[$i]);
        //     $bookedRooms[$i]=[
        //         $room
        //     ];
        //     $i++;

        // }
        // dd($bookedRooms);
        // dd($room);





        // $totalPaidInroomsPerDay = DB::table("rooms")
        //     ->select(DB::raw('sum(rooms.price)as sum'))
        //     ->join('booked_rooms', 'rooms.id', '=', 'booked_rooms.room_id')
        //     ->where('booked_rooms.order_id', '=', $order->id)
        //     ->get();
        // //    dd($totalPaidInroomsPerDay[0]->sum);
        // $roomBudget = $totalPaidInroomsPerDay[0]->sum * $order->n_of_days;
        // // dd($roomBudget);
        // $restOfBudget = $order->budget - $roomBudget;
        // // dd($restOfBudget);

        // $availablePlaces = Place::where('price', '<', $restOfBudget)->get();
        // // dd(empty($availablePlaces[0]));
        // // the places won't be empty
        // // dd($availablePlaces);
        // if (empty($availablePlaces[0])) {
        //     // return view('MUT.availableTourguide',[
        //     //     'message'=>'there is not enough budget raise it '

        //     // ]);
        //     return back();
        // }
        // else {
        //     return view('MUT.availablePlaces', [
        //         'availablePlaces' => $availablePlaces,
        //         'order' => $order,
        //         'percent' => $request->percent,
        //         'restOfBudget' => $restOfBudget


        //     ]);
        // }



            // $availablePlaces= Place::where('price','<',$order->budget)->get();
            // return view('MUT.availablePlaces',[
            //     'availablePlaces' => $availablePlaces,
            //     'order' => $order,
            //     'restOfBudget'=>$order->budget]);
            // Alert::alert('sorry :(', 'there is no available hotels
            // increase your budget or derease or change number of days you want to stay ^^');
            // dd('error');

            // return redirect('//'.$order['id']);



              // ->withErrors(['email'=>'credentials invalid!'])
    // $request->validate([
    //     'email' => 'required|email',
    //     'password' => 'required',

    // ]);

    // $user = User::where('email', $request->email)->first();

    // if (! $user || ! Hash::check($request->password, $user->password)) {
    //     throw ValidationException::withMessages([
    //         'email' => ['The provided credentials are incorrect.'],
    //         // 'password' => ['The provided credentials are incorrect.'],
    //     ]);
    // }
}
