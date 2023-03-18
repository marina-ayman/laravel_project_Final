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
use DateTime;
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
    public function storeOrder(Request $request)
    {
        // dd($request);
// dd(Auth::user());
// dd(Auth::user()->id);
// dd((int)$request['budget']);
$check_in_datetime = new DateTime($request['check_in']);
// dd($first_datetime);
$check_out_datetime = new DateTime($request['check_out']);
$interval = $check_in_datetime->diff($check_out_datetime);
$n_of_days = $interval->format('%a');//and then print do whatever you like with $final_days
// dd($n_of_days);
        $request->validate([
            // 'budget'=>['required','digits_between:3,6'],
        ]);
        $order = Order::create([
            'user_id'=>Auth::user()->id,
            'budget' => (int)$request['budget'],
            'check_in' =>$request['check_in'],
            'check_out' =>$request['check_out'],
            'n_of_adults'=>(int)$request['n_of_adults'],
            'n_of_childeren'=>isset($request['n_of_childeren'])?(int)$request['n_of_childeren']:0,
            'n_of_days'=>(int)$n_of_days
        ]);
// dd($order);
        for($i=0; $i < count($request['n_of_room']) ; $i++) {
            // dd($nOfroomArray);
           // echo "here";
            OrderedRoom::create([
                 'order_id' => $order->id,
                 'n_of_room'=> (int)$request['n_of_room'][$i],
                 'room_type' => $request['room_type'][$i]
             ]);
        }
       $orderedRoom =OrderedRoom::where('order_id',$order->id)->get();

       return redirect(route('getAvailableHotels',['order'=>$order->id,
       'budgetForHotels'=>(int)$request->percent
    ]));
    //    return view('MUT.hotel',['data'=>['order'=>$order,
    //    'orderedRoom'=>$orderedRoom,] ,'message'=>'the order is saved']);


    }
    public function getAvailableHotels($budgetForHotels, Order $order)
    {
        $percent = (int)$budgetForHotels / 100;

        if ($percent != 0) {

            $restOfBudget = (int)$order->budget - ((int)$order->budget * $percent);
        }else {

            $restOfBudget = $order->budget;
        }
        // $budget=  $order->budget * $percent  / $order->n_of_days;
        // dd($restOfBudget);
        $budgetperday = $order->budget * $percent  / $order->n_of_days;
        // dd($budgetperday);
        $availableRooms = Room::where('price', '<', $budgetperday)
            ->get();
        // dd(empty($availableRooms[0]));
        if (!empty($availableRooms[0])){

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


        }
    }
    public function getAvailableRooms(Order $order, Request $request, Hotel $hotel)
    {
        //    dd($request->percent);
        //    dd($hotel);
        $availableRooms = $request->availableRooms;
        // dd($availableRooms);

        return view('MUT.availableRooms',[
            'availableRooms' => $availableRooms,
            'order' => $order,
            'hotel' => $hotel,
            'percent' => $request->percent,
            'restOfBudget' => $request->restOfBudget,

        ]);



    }
    public function BookInHotel(Order $order, Request $request, Hotel $hotel)
    {
        // dd($request->percent);
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
        Alert::success('Thanks','we are processing Your order ^^');

        return $this->getAvailablePlaces($order,$request);
    // }
        // return redirect()->route('getAvailableHotels',['budgetForHotels'=>$request->percent,'order'=>$order->id]);

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
        //   $paidInRoom = DB::table("rooms")
        //   ->select(DB::raw('sum(rooms.price)as sum'))
        //   ->join('booked_rooms', 'rooms.id', '=', 'booked_rooms.room_id')
        //   ->where('booked_rooms.order_id', '=', $order->id)
        //   ->get();
                $restOfBudget = ($order->budget) - $totalPaidInRooms;
                if($restOfBudget<0){
                    Alert::alert('be aware , your booking exceeds your budget^^');
                    return back();
                }
            }
        } else {
            $restOfBudget = (int)$order->budget;
        }

        // $restOfBudget=$request->restOfBudget;
        //    dd($restOfMaxBudget);

        $availablePlaces = Place::where('price', '<', $restOfBudget)->get();
        // dd($availablePlaces);
        if (empty($availablePlaces[0])) {
            Alert::alert('we are very sorry :(', 'there is no available places
               you can book a tourguide or you can skip this step....^^');
            // dd($totalPaidInPlaces[0]->sum);
            $restBudgetBeforeTourguide = $restOfBudget;
            // dd($restBudget);
            $budgetperday = $restBudgetBeforeTourguide / $order->n_of_days;
            // dd($budgetperday);
            $availableTourguides = Tourguide::where('price_per_day', '<', $budgetperday)->get();
            return view('MUT.availableTourguides', [
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
// if(!empty($request->place_id)){

//             foreach ($request->place_id as $placeID) {
//                 // dd($placeID);
//                 OrderedPlace::create([
//                     'order_id' => $order->id,
//                     'place_id' => $placeID
//                 ]);
//             }

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
            return view('MUT.availableTourguide', [
                'availableTourguides' => $availableTourguides,
                'order' => $order,
                'restBudgetBeforeTourguide' => $restBudgetBeforeTourguide,
                'percent'=>$request->percent,
                'restOfBudget'=>$request->restOfBudget,


            ]);
        // }
    }
}
    public function getAvailableTourguides(Order $order, Request $request)
    {
        if ($request->restBudget) {
            $restBudgetBeforeTourguide = $order->budget - $request->restOfBudget;
            if ($restBudgetBeforeTourguide > 0) {

                $budgetperday = $restBudgetBeforeTourguide / $order->n_of_days;
                $availableTourguides = Tourguide::where('price_per_day', '<', $budgetperday)->get();
                return view('MUT.availableTourguide', [
                    'availableTourguides' => $availableTourguides,
                    'order' => $order,
                    'percent'=>$request->percent,
                    'restOfBudget'=>$request->restOfBudget,
                    'restBudgetBeforeTourguide' => $restBudgetBeforeTourguide


                ]);
            }else{
                Alert::alert('sorry :(', 'there is no enough budget ^^');
                return back();
            }


        }
    }
    public function bookWithTourguide(Order $order, Request $request, Tourguide $tourguide)
    {
        // dd($tourguide);
        // dd($request->restBudgetBeforeTourguide);
        // BookTourGuide::create([
        //     'tourguide_id' => $tourguide->id,
        //     'order_id' => $order->id,
        //     'n_of_days' => $order->n_of_days
        // ]);



        $BookedRooms = BookedRoom::where('order_id',$order->id)->get();
        // $order->Tourguide
        $BookedTourguide = BookTourGuide::where('order_id',$order->id)->get();
        // $order->place
        $orderedPlaces = OrderedPlace::where('order_id',$order->id)->get();
        $totalPaidInPlaces = DB::table("places")
        ->select(DB::raw('sum(places.price)as sum'))
        ->join('ordered_places', 'places.id', '=', 'ordered_places.place_id')
        ->where('ordered_places.order_id', '=', $order->id)
        ->get();
        $totalPaidInTourguide = DB::table("tourguides")
        ->select(DB::raw('sum(tourguides.price_per_day)as sum'))
        ->join('book_tour_guide', 'tourguides.id', '=', 'book_tour_guide.tourguide_id')
        ->where('book_tour_guide.order_id', '=', $order->id)
        ->get();
        $totalPaidInRooms = DB::table("rooms")
        ->select(DB::raw('sum(rooms.price)as sum'))
        ->join('booked_rooms', 'rooms.id', '=', 'booked_rooms.room_id')
        ->where('booked_rooms.order_id', '=', $order->id)
        ->get();
        return view('cart',[
            'order'=>$order,
            'BookedRooms'=>isset($BookedRooms)?$BookedRooms:'not found ',
            'BookedTourguide'=>isset($BookedTourguide)?$BookedTourguide:'not found ',
            'orderedPlaces'=>isset($orderedPlaces)?$orderedPlaces:'not found ',
            'totalPaidInPlaces'=>isset($totalPaidInPlaces[0]->sum)?$totalPaidInPlaces:0,
            'totalPaidInRooms'=>isset($totalPaidInRooms[0]->sum)?$totalPaidInRooms:0,
            'totalPaidInTourguide'=>isset($totalPaidInTourguide[0]->sum)?$totalPaidInTourguide:0

        ]);
    }

    public function MUTE(Order $order)
    {
        // OrderDetail::create([
        //     'order_id' => $order->id
        // ]);
        $BookedRooms = BookedRoom::where('order_id',$order->id)->get();
        // $order->Tourguide
        $BookedTourguide = BookTourGuide::where('order_id',$order->id)->get();
        // $order->place
        $orderedPlaces = OrderedPlace::where('order_id',$order->id)->get();
        $totalPaidInPlaces = DB::table("places")
        ->select(DB::raw('sum(places.price)as sum'))
        ->join('ordered_places', 'places.id', '=', 'ordered_places.place_id')
        ->where('ordered_places.order_id', '=', $order->id)
        ->get();
        $totalPaidInTourguide = DB::table("tourguides")
        ->select(DB::raw('sum(tourguides.price_per_day)as sum'))
        ->join('book_tour_guide', 'tourguides.id', '=', 'book_tour_guide.tourguide_id')
        ->where('book_tour_guide.order_id', '=', $order->id)
        ->get();
        $totalPaidInRooms = DB::table("rooms")
        ->select(DB::raw('sum(rooms.price)as sum'))
        ->join('booked_rooms', 'rooms.id', '=', 'booked_rooms.room_id')
        ->where('booked_rooms.order_id', '=', $order->id)
        ->get();
        return view('cart',[
            'order'=>$order,
            'BookedRooms'=>isset($BookedRooms)?$BookedRooms:'not found ',
            'BookedTourguide'=>isset($BookedTourguide)?$BookedTourguide:'not found ',
            'orderedPlaces'=>isset($orderedPlaces)?$orderedPlaces:'not found ',
            'totalPaidInPlaces'=>isset($totalPaidInPlaces[0]->sum)?$totalPaidInPlaces:0,
            'totalPaidInRooms'=>isset($totalPaidInRooms[0]->sum)?$totalPaidInRooms:0,
            'totalPaidInTourguide'=>isset($totalPaidInTourguide[0]->sum)?$totalPaidInTourguide:0

        ]);
    }
    public function PayForMUTE(Order $order)
    {
        Alert::success('Welcome to M.U.T.E', 'you have finished your M.U.T.E Hope U Enjoy Ur Aswan Time ^^');

       return view('MUT.payment');
    }


    public function cancelOrder(order $orderID)
    {
        // Alert::question('Are u sure u want to cancel the trip ?!', 'There is much fun u will miss :(');

        // dd($orderID);
       $deleteOrder= $orderID->delete();
        if($deleteOrder){
            $rooms=OrderedRoom::where('order_id',$orderID->id)->get();
            if(!is_null($rooms)){

                $query='delete from ordered_room where order_id ='.$orderID->id;
                DB::delete($query);
            }
           $roomsBooked= BookedRoom::where ('order_id',$orderID->id)->get();
           if(!is_null($roomsBooked)){
            $query='delete from booked_rooms where order_id ='.$orderID->id;
            DB::delete($query);
           }
           $tourguideBooked= BookTourGuide::where('order_id',$orderID->id)->first();
           if(!is_null($roomsBooked)){

               $query='delete from book_tour_guide where order_id ='.$orderID->id;
               DB::delete($query);
           }
                    $placesBooked= OrderedPlace::where ('order_id',$orderID->id)->get();
                  if(!is_null($placesBooked)){
                    $query='delete from ordered_places where order_id ='.$orderID->id;
                    DB::delete($query);
                  }

        }
        Alert::warning('your trip canceled want to hear from u soon', 'There is much fun u will miss :(');
        return redirect('/home');

    }
}
