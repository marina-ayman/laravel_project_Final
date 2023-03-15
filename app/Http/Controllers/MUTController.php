<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\registerationController;
use App\Models\BookedRoom;
use App\Models\orderedRoom;
use App\Models\BookTourGuide;
use App\Models\Hotel;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderedPlace;
use App\Models\Place;
use App\Models\Room;
use App\Models\Tourguide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MUTController extends Controller
{
    public function create()
    {
        // dd(Auth::user());

        return view('MUT.makeOrderForm');
    }
    // stored the order

    public function getAvailableHotels($budgetForHotels, Order $order)
    {
        //
        // dd($budgetForHotels);
        // $percent=(int)$budgetForHotels/100;
        // dd($order->OrderedRoomType);
        $percent = (int)$budgetForHotels / 100;

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

        $order->budget;
        // dd($order->budget);
        // dd($percent);
        if ($percent != 0) {

            $restOfBudget = (int)$order->budget - ((int)$order->budget * $percent);
        } else {

            $restOfBudget = $order->budget;
        }
        // $budget=  $order->budget * $percent  / $order->n_of_days;
        // dd($restOfBudget);
        $budgetperday = $order->budget * $percent  / $order->n_of_days;
        // dd($budgetperday);
        $availableRooms = Room::where('price', '<', $budgetperday)
            ->get();
        // dd(empty($availableRooms[0]));
        if (!empty($availableRooms[0])) {

            return view('MUT.availableHotels', [
                'availableRooms' => $availableRooms,
                'order' => $order,
                'percent' => $percent,
                'restOfBudget' => $restOfBudget

            ]);
        } else {
            Alert::alert('we are very sorry :(', 'there is no available hotels
            increase your budget or derease or change number of days you want to stay or skip this step....^^');
            return view('MUT.availableHotels', [
                'availableRooms' => "",
                'order' => $order,
                'percent' => $percent,
                'restOfBudget' => $order->budget
            ]);


            // $availablePlaces= Place::where('price','<',$order->budget)->get();
            // return view('MUT.availablePlaces',[
            //     'availablePlaces' => $availablePlaces,
            //     'order' => $order,
            //     'restOfBudget'=>$order->budget]);
            // Alert::alert('sorry :(', 'there is no available hotels
            // increase your budget or derease or change number of days you want to stay ^^');
            // dd('error');

            // return redirect('//'.$order['id']);


        }
    }
    public function getAvailableRooms(Order $order, Request $request, Hotel $hotel)
    {
        //    dd($request->percent);
        //    dd($hotel);
        $availableRooms = $request->availableRooms;

        return view('MUT.availableRooms', [
            'availableRooms' => $availableRooms,
            'order' => $order,
            'hotel' => $hotel,
            'percent' => $request->percent

        ]);
    }
    public function BookInHotel(Order $order, Request $request, Hotel $hotel)
    {
        // dd($hotel);
        // dd($request->room_id);
        // for($i =0 ; $i<$request->room_id;$i++){
        foreach ($request->room_id as $room) {
            // dd($request->room_id);
            BookedRoom::create([
                'order_id' => (int)$order->id,
                'hotel_id' => (int)$hotel->id,
                'room_id' => (int)$room
            ]);
        }
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
        $totalPaidInroomsPerDay = DB::table("rooms")
            ->select(DB::raw('sum(rooms.price)as sum'))
            ->join('booked_rooms', 'rooms.id', '=', 'booked_rooms.room_id')
            ->where('booked_rooms.order_id', '=', $order->id)
            ->get();
        //    dd($totalPaidInroomsPerDay[0]->sum);
        $roomBudget = $totalPaidInroomsPerDay[0]->sum * $order->n_of_days;
        // dd($roomBudget);
        $restOfBudget = $order->budget - $roomBudget;
        // dd($restOfBudget);

        $availablePlaces = Place::where('price', '<', $restOfBudget)->get();
        // dd(empty($availablePlaces[0]));
        // the places won't be empty
        // dd($availablePlaces);
        if (empty($availablePlaces[0])) {
            // return view('MUT.availableTourguide',[
            //     'message'=>'there is not enough budget raise it '

            // ]);
            return back();
        } else {
            return view('MUT.availablePlaces', [
                'availablePlaces' => $availablePlaces,
                'order' => $order,
                'percent' => $request->percent,
                'restOfBudget' => $restOfBudget


            ]);
        }
    }
    public function getAvailablePlaces(Order $order, Request $request)
    {
        // dd($request->restOfBudget);
        if ($request->restOfBudget != $order->budget) {
            $rooms = OrderedRoom::where('order_id', $order['id'])->get();
            $roomsBooked = BookedRoom::where('order_id', $order['id'])->get();
            // if(!empty($roombooked[0])&& !empty($rooms[0])){
            $totalPaidInroomsPerDay = DB::table("rooms")
                ->select(DB::raw('sum(rooms.price)as sum'))
                ->join('booked_rooms', 'rooms.id', '=', 'booked_rooms.room_id')
                ->where('booked_rooms.order_id', '=', $order->id)
                ->get();
            // dd($totalPaidInroomsPerDay[0]->sum);
            if ($totalPaidInroomsPerDay[0]->sum != 0 || $totalPaidInroomsPerDay[0]->sum == null) {
                $totalPaidInRooms = $totalPaidInroomsPerDay[0]->sum * (int)$order->n_of_days;
                $restOfBudget = ($order->budget) - $totalPaidInRooms;
            }
        } else {
            $restOfBudget = (int)$order->budget;
        }

        // $restOfBudget=$request->restOfBudget;
        //    dd($restOfMaxBudget);

        $availablePlaces = Place::where('price', '<', $restOfBudget)->get();
        // dd($availablePlaces);
        if (empty($availablePlaces[0])) {

            // dd($totalPaidInPlaces[0]->sum);
            $restBudgetBeforeTourguide = $restOfBudget;
            // dd($restBudget);
            $budgetperday = $restBudgetBeforeTourguide / $order->n_of_days;
            // dd($budgetperday);
            $availableTourguides = Tourguide::where('price_per_day', '<', $budgetperday)->get();
            return view('MUT.availableTourguide', [
                'availableTourguides' => $availableTourguides,
                'order' => $order,
                'percent' => $request->percent,
                'restBudgetBeforeTourguide' => $restBudgetBeforeTourguide,
                'message' => 'there is not enough budget raise it '

            ]);
        } else {
            return view('MUT.availablePlaces', [
                'availablePlaces' => $availablePlaces,
                'order' => $order,
                'percent' => $request->percent,
                'restOfBudget' => $restOfBudget


            ]);
        }
    }
    public function bookPlaces(Order $order, Request $request)
    {
        // dd($request);
     

            // foreach ($request->place_id as $placeID) {
            //     // dd($placeID);
            //     OrderedPlace::create([
            //         'order_id' => $order->id,
            //         'place_id' => $placeID
            //     ]);
            // }
     
        $totalPaidInPlaces = DB::table("places")
            ->select(DB::raw('sum(places.price)as sum'))
            ->join('ordered_places', 'places.id', '=', 'ordered_places.place_id')
            ->where('ordered_places.order_id', '=', $order->id)
            ->get();
        // dd($totalPaidInPlaces[0]->sum);
        $restBudgetBeforeTourguide = $request->restOfBudget - $totalPaidInPlaces[0]->sum;
        // dd($request->restOfBudget);
        $budgetperday = $restBudgetBeforeTourguide / $order->n_of_days;
        // dd($budgetperday);
        $availableTourguides = Tourguide::where('price_per_day', '<', $budgetperday)->get();
        // dd($availableTourguides);

        if (empty($availableTourguides[0])) {
            // Alert
            Alert::alert('sorry :(', 'there is no available Tourguides
            change the days or your budget to listen fron u soon ^^');
            return back();
        } else {
            // Alert::alert('sorry :(', 'there is no available Tourguides
            // change the days or your budget to listen fron u soon ^^');
            return view('MUT.availableTourguides', [
                'availableTourguides' => $availableTourguides,
                'order' => $order,
                'restBudgetBeforeTourguide' => $restBudgetBeforeTourguide


            ]);
        }
    }
    public function getAvailableTourguides(Order $order, Request $request)
    {
        if ($request->restBudget) {
            $restBudgetBeforeTourguide = $order->budget - $request->restOfBudget;
            if ($restBudgetBeforeTourguide > 0) {

                $budgetperday = $restBudgetBeforeTourguide / $order->n_of_days;
                $availableTourguides = Tourguide::where('price_per_day', '<', $budgetperday)->get();
                return view('MUT.availableTourguides', [
                    'availableTourguides' => $availableTourguides,
                    'order' => $order,
                    'percent'=>$request->percent,
                    'restBudgetBeforeTourguide' => $restBudgetBeforeTourguide


                ]);
            }
            // } else {
            //     if (empty($availableTourguides[0])) {

            //         return view('MUT.availableTourguide', []);
            //     }
            //     // dd($restBudget);
            //     // dd($budgetperday);
            //     // dd($availableTourguides);


            // }
        }
    }
    public function bookWithTourguide(Order $order, Request $request, Tourguide $tourguide)
    {
        // dd($tourguide);
        // dd($request->restBudgetBeforeTourguide);
        BookTourGuide::create([
            'tourguide_id' => $tourguide->id,
            'order_id' => $order->id,
            'n_of_days' => $order->n_of_days
        ]);
        $restOfBudgetAfterAllBooking = $order->budget - ($request->restBudgetBeforeTourguide + ($tourguide->price_per_day * $order->n_of_days));
        // dd($restOfBudgetAfterAllBooking);
        return view('MUT.MUTDetails', [
            'order' => $order,
        ]);
    }

    public function MUTE(Order $order)
    {
        OrderDetail::create([
            'order_id' => $order->id
        ]);
        return view('MUT.cart', [
            'order' => $order
        ]);
    }
    public function viewPayForMUTE(Order $order)
    {

        return view('MUT.cart', [
            'order' => $order
        ]);
    }
}
