<?php


namespace App\Http\Controllers\orderController;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\BookedRoom;
use App\Models\OrderedPlaces;
use App\Models\BookTourGuide;
use App\Models\Order;
use App\Models\OrderedPlace;
use App\Models\OrderedRoom;
use DateTime;
use Illuminate\Support\Facades\DB;

class OrderDetailsController extends Controller
{
    public function index()
    {

      $OrdersDetail= OrderDetail::all();
    //   $orders = $OrdersDetail->order;

    //   return response()->json([
    //     'OrdersDetail'=>$OrdersDetail,
    // ]);

    return view("dashboardAdmin.order.OrdetTable",["OrdersDetail"=> $OrdersDetail]);


    }
    public function store(Order $order)
    {
        $roomsType=OrderedRoom::where('order_id',$orderID->id)->get();
        // dd($roomsType);
        $roomsBooked = BookedRoom::where('order_id',$orderID->id)->get();
        // dd($roomsBooked);
        foreach($roomsBooked as $room){
            echo $room;
                }












        // order_id to get all reservations
        // relations with order to store
        // user_id to store order

    }
    public function destroy(OrderDetail $orderID)
    {
       $deleteOrder= OrderDetail::where('order_id',$orderID)->delete();
        if($deleteOrder){
            BookedRoom::where ('order_id',$orderID)->delete();
            BookTourGuide::where ('order_id',$orderID)->delete();
            OrderedPlace::where ('order_id',$orderID)->delete();
        }

        // return response()->json([
        //     'order deleted'
        // ]);
        return back();

    }
    public function show(Order $id){
         //$order= $request['user_id']->Order
         $order= $id;
         // num of days
                 $check_out_datetime = new DateTime($order->check_out);
                 $check_in_datetime = new DateTime($order->check_in);
                 $interval = $check_in_datetime->diff($check_out_datetime);
                 $nOfDays = $interval->format('%a');//and then print do whatever you like with $final_days
                 //  -----------------

                 //  $order->Room
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
                 ->select(DB::raw('sum(tourguides.price)as sum'))
                 ->join('book_tour_guide', 'tourguides.id', '=', 'book_tour_guide.tourguide_id')
                 ->where('book_tour_guide.order_id', '=', $order->id)
                 ->get();
                 $totalPaidInRooms = DB::table("rooms")
                 ->select(DB::raw('sum(rooms.price)as sum'))
                 ->join('booked_room', 'rooms.id', '=', 'booked_room.room_id')
                 ->where('booked_room.order_id', '=', $order->id)
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









}
