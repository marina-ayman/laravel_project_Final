<?php

namespace App\Http\Controllers\dashboard;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;
use Illuminate\Database\Connection;
use App\Http\Controllers\Controller;
use App\Http\Controllers\tripController\ChosenTripController;
use App\Models\BookedRoom;
use App\Models\Hotel;
use App\Models\HotelImg;
use App\Models\HotelOwner;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChosenTrip;
use App\Models\OrderedRoom;
use App\Models\RoomImg;
use App\Models\User;
use App\Models\Driver;
use App\Models\Order;
use App\Models\Vehicle;
use App\Models\OrderedPlace;
use App\Models\RegularBookedTourguide;
use App\Models\Role;
use App\Models\Tourguide;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Database\PDO\Connection as PDOConnection;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // hotel owner ............................................................
    // public function allOwnedHotels(Request $request){
    //     $hotelsInfo =Hotel::where('hotel_owner_id',$request['hotel_owner_id']);
    //     foreach($hotelsInfo as $hotelInfo){
    //         $hotelImg=HotelImg::where('hotel_id',$hotelInfo->id);
    //         return response()->json([
    //             'hotel Info'=>$hotelInfo,
    //             'hotel Imgs' => $hotelImg
    //         ]);
    //     }
    // }


    public function index()
    {
        $chosenTrips=  ChosenTrip::all();
        // $pendingTrips = ChosenTrip::where('status','pending')->get();
        // $approvedTrips = ChosenTrip::where('status','accept')->get();
        // $rejectedTrips = ChosenTrip::where('status','reject')->get();

        $users = User::all();
        // $customers=Role::where('name','customer')->first()->users;
        // $hotelOwners=Role::where('name','Hotel Owner')->first()->users;
        // $tourGuides=Role::where('name','TourGuide')->first()->users;
        // $drivers=Role::where('name','Driver')->first()->users;

        $drivers= Driver::all();
        $vehicles= Vehicle::all();
        $orderedPlaces= OrderedPlace::all();
        return view('dashboardAdmin.admin',
        [

            'chosenTrips' => $chosenTrips,
            // 'pendingTrips' => $pendingTrips,
            // 'approvedTrips' => $approvedTrips,
            // 'rejectedTrips' => $rejectedTrips,

            'users'=> $users,
            // 'customers'=>$customers,
            // 'hotelOwners'=>$hotelOwners,
            // 'tourGuides'=> $tourGuides,
            'drivers' => $drivers,

            'vehicles' => $vehicles,


            'orderedPlaces' => $orderedPlaces,
        ]);
    }


    public function addHotelView(){
        return view('dashboardHotelOwner.index');
    }
    public function addHotel(Request $request){
        // dd(Auth::user()->HotelOwner);
        $name=md5(microtime()).$request->cover_img->getClientOriginalName();
        $request->cover_img->storeAs("public/imgs",$name);
      $hotel=  Hotel::create([
            'hotel_owner_id'=>Auth::user()->HotelOwner[0]->id,
            'name'=>$request->name,
            'address'=>$request->address,
            'cover_img'=> $name,
            'type'=>$request->type,
      ]);
// dd($request['image']);
      foreach ($request['image'] as  $value) {
        // dd($value->getClientOriginalName());
        $name=md5(microtime()).$value->getClientOriginalName();
        $value ->storeAs("public/imgs",$name);

        HotelImg::create([
           'hotel_id'=>$hotel["id"],'image'=>isset($name)?$name:null],
           );
  }
    Alert::success('Congrats', 'You\'ve Successfully added the hotel ^^');

      return redirect(route('MyOwnedHotels'));
    }
    public function dashboard(){
        return view('dashboardHotelOwner.profile');

    }
    public function previewHotel(Hotel $hotelID){
        // dd($hotelID);

        // dd($hotel);
        return view('dashboardHotelOwner.previewHotel',[
            'hotel'=>$hotelID
        ]);

    }
    public function deleteHotel(Hotel $hotelID){
// dd($hotelID);
        $deleteHotel= $hotelID->delete();

        if($deleteHotel){
            HotelImg::where ('hotel_id',$hotelID)->delete();
        }
        Alert::alert('deleted', 'You\'ve deleted the hotel successfully ^^');

        return back();

    }
    public function editHotel(hotel $hotelID){
        // dd($hotelID);
        // dd ( $hotelID->HotelImg);
        $hotelImgs=$hotelID->HotelImg;
        return view('dashboardHotelOwner.editHotel',[
            'hotel'=>$hotelID,
            'images'=>$hotelImgs
        ]);
    }

    public function updateHotel(Request $request, hotel $hotelID){
        //  dd($request['cover_img']);
        if(!is_null($request->cover_img)){
            $name=md5(microtime()).$request->cover_img->getClientOriginalName();
            $request->cover_img->storeAs("public/imgs",$name);
            $hotelID->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'type'=>$request->type,
                'cover_img'=> $name
            ]);
        }else{
            $hotelID->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'type'=>$request->type
            ]);
        }
        // dd($request->image);
        foreach ($request['image'] as  $value) {
            // dd($value->getClientOriginalName());
            $name=md5(microtime()).$value->getClientOriginalName();
            $value ->storeAs("public/imgs",$name);

            HotelImg::create([
               'hotel_id'=>$hotelID["id"],'image'=>isset($name)?$name:null],
               );
      }
        // if(!is_null($request->image[0])){
        //        foreach($request->image as $img){
        //     //  dd(HotelImg::where('hotel_id',$hotelID->id)->update(['image']));
        //            HotelImg::where('hotel_id',$hotelID->id)->update([
        //                'image'=>$img->storeAs("public/imgs",md5(microtime()).$img->getClientOriginalName())
        //             ]);
        //        }
        // }

        Alert::success('Congrats', 'You\'ve Successfully updated the hotel ^^');

        return redirect(route('MyOwnedHotels'));
    }

    public function AllRooms(Hotel $hotelID){
        // dd($hotel->Room());
        $rooms=$hotelID->Rooms()->get();
        // dd($hotelID->id);
        // $rooms= Room::where('hotel_id',$hotelID)->get();
// dd($rooms);
if(count($rooms)==0){
    Alert::warning('empty', 'there is no rooms added yet');
    return back();
}else{
    return view('dashboardHotelOwner.rooms',['rooms'=>$rooms]);

}
    }

    public function previewRoom(Room $roomID){

            return view('dashboardHotelOwner.previewRoom',[
            'room'=>$roomID
        ]);
    }

    public function addRoomFormForHotel(Hotel $hotelID){

        return view('dashboardHotelOwner.add_room_for_hotel',['hotel'=>$hotelID]);

    }
    public function addRoomForm(){

        return view('dashboardHotelOwner.add_room');

    }
    public function storeRoom(Request $request){

//   dd($request);
$name=md5(microtime()).$request->cover_img->getClientOriginalName();
        $request->cover_img->storeAs("public/imgs",$name);
  $room= Room::create([
   'n_of_available_rooms'=>$request->n_of_available_rooms,
   'price'=>$request->price,
   'type'=>$request->type,
   'cover_img'=>$name,
   'hotel_id'=>$request->hotel_id
  ]);
  foreach ($request['image'] as  $value) {
    // dd($value->getClientOriginalName());
    $name=md5(microtime()).$value->getClientOriginalName();
    $value ->storeAs("public/imgs",$name);

    RoomImg::create([
       'room_id'=>$room["id"],'image'=>isset($name)?$name:null],
       );
}
  Alert::success('Congrats', 'You\'ve Successfully added the Room ^^');
  return back();

    }

public function allRequests(Hotel $id,Order $order){
    // dd(Auth::user()->HotelOwner[0]->Hotel->BookedRoom);
    // foreach(Auth::user()->HotelOwner[0]->Hotel as $hotel){

    //    dd($hotel->BookedRoom);
    //     $orderedRooms = BookedRoom::where('hotel_id',$hotel->id)->get();
    //     dd($orderedRooms);
    // }
    // $connection->select("SELECT orders.check_in,orders.check_out ,orders.n_of_days , booked_rooms.hotel_id , booked_rooms.room_id ,rooms.price ,hotels.name from orders INNER JOIN booked_rooms INNER JOIN rooms INNER JOIN hotels on orders.id = booked_rooms.order_id and booked_rooms.room_id = rooms.id and rooms.hotel_id = hotels.id where rooms.hotel_id = $id->id");
    // dd($connection);
    $data= DB::table("orders")
    ->select('orders.check_in','orders.check_out' ,'orders.n_of_days','orders.id as order_id' , 'booked_rooms.hotel_id','booked_rooms.room_status as room_status' ,'booked_rooms.room_id','rooms.price' ,'hotels.name as hotel_name','users.name','rooms.type as type')
    ->join('booked_rooms','orders.id','=','booked_rooms.order_id')
    ->join('rooms','booked_rooms.room_id', '=', 'rooms.id')
    ->join('hotels','rooms.hotel_id', '=', 'hotels.id')
    ->join('users','orders.user_id', '=', 'users.id')
    ->join('ordered_room','ordered_room.order_id','=','orders.id')
     // $order = Order::find($request['order_id']);
 ->where('rooms.hotel_id', '=', $id->id)
   ->get();
//    dd($data);
//     $query='SELECT orders.check_in,orders.check_out ,orders.n_of_days , booked_rooms.hotel_id , booked_rooms.room_id ,rooms.price ,hotels.name from orders INNER JOIN booked_rooms INNER JOIN rooms INNER JOIN hotels on orders.id = booked_rooms.order_id and booked_rooms.room_id = rooms.id and rooms.hotel_id = hotels.id where rooms.hotel_id = '.$id->id;
// $allReq= DB::get($query);
// dd($allReq);
    // $hotels= Auth::user()->HotelOwner[0]->Hotel;
    // $orderedRooms = BookedRoom::where('hotel_id',Auth::user()->HotelOwner[0]->id);
    // $orderedRooms = BookedRoom::all();
    // dd($orderedRooms);
    return view('dashboardHotelOwner.allRequests',['requests'=>$data]);
}

public function changeStatus(Order $order,Request $request){
    // dd($room);
BookedRoom::where('order_id',$order->id)->update([
    'room_status'=>$request->status,
]);
Alert::success('Done', 'status udated Successfully ^^');
return redirect()->route("allRequests",['id'=>$request->hotel_id]);
}

public function tourguideRequests(Tourguide $id, Request $request){


    $data= DB::table("regular_booked_tourguide")
    ->select('regular_booked_tourguide.check_in','regular_booked_tourguide.check_out' ,'regular_booked_tourguide.status','users.name as clientName' )
    ->join('users','users.id','=','regular_booked_tourguide.user_id')
     // $order = Order::find($request['order_id']);
 ->where('regular_booked_tourguide.tourguide_id', '=', $id->id)
   ->get();
   return view('dashboardTourguide.allRequests',['requests'=>$data]);
}

public function tourChangeStatus(Tourguide $order,Request $request){
    // dd($room);
RegularBookedTourguide::where('tourguide_id',$order->id)->update([
    'status'=>$request->status,
]);
Alert::success('Done', 'status udated Successfully ^^');
return redirect()->route("allRequests",['id'=>$request->hotel_id]);
}






























    public function allOwnedHotels(){
        // if(Auth::user()->)
        $allHotels =Hotel::where('hotel_owner_id',Auth::user()->HotelOwner[0]->id)->get();


            return view('dashboardHotelOwner.hotels',[
                'allHotels'=>$allHotels,

            ]);
        }


    // public function hotelOwnerInfo(Request $request){
    //     $hotelOwner =HotelOwner::find($request['hotel_owner_id']);
    //         return response()->json([
    //             'hotelOwner Info'=>$hotelOwner,

    //         ]);

    // }
    // public function allUsers(Request $request){
    //     $hotelOwner =HotelOwner::find($request['hotel_owner_id']);
    //         return response()->json([
    //             'hotelOwner Info'=>$hotelOwner,

    //         ]);

    // }
    }






