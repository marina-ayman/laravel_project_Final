<?php

namespace App\Http\Controllers\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\RegularBookedPlace;
use App\Models\RegularBookedRoom;
use App\Models\RegularBookedTourguide;
use App\Models\Room;
use App\Models\Tourguide;
use Illuminate\Http\Request;

class regularController extends Controller
{
    public function storeRegRoom(Room $id,Request $request)
    {
        dd($id);
        $request->validate([
            'check_in'=>'required',
            'check_out'=>'required',

        ]);

        $check_in = $request['check_in'];
        $check_out =$request['check_out'];
        $n_of_adults =isset($request['n_of_adults'])?(int)$request['n_of_adults']:0;
        $nOfChild = isset($request['n_of_childeren'])?(int)$request['n_of_childeren']:0;
        $booking = RegularBookedRoom::create([
            'check_in' => $check_in,
            'check_out' =>$check_out,
            'n_of_childeren' => $nOfChild,
            'n_of_adults' => $n_of_adults,
            'room_id'=>$id->id,
            'user_id'=>auth()->user()->id
        ]);
        Alert::sucess('Thanks^^', 'Ur Reservation has been sent successfully^^');
        return back();
    }
    public function storeRegTourguide(Tourguide $id,Request $request)
    {
        $request->validate([
            'check_in'=>'required',
            'check_out'=>'required',

        ]);

        $check_in = $request['check_in'];
        $check_out =$request['check_out'];

        $booking = RegularBookedTourguide::create([
            'check_in' => $check_in,
            'check_out' =>$check_out,

            'n_of_people' => (int)$request->n_of_people,
            'tourguide_id'=>$id->id,
            'user_id'=>auth()->user()->id
        ]);
        return back();
    }
    public function storeRegPlace(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'check_in'=>'required',
        //     'check_out'=>'required',

        // ]);

        $check_in = $request['check_in'];
        $check_out =$request['check_out'];
foreach($request->place_id as $place){
    dd($place);
            $booking = RegularBookedPlace::create([
                'check_in' => $check_in,
                'check_out' =>$check_out,
                'place_id'=>$place,
                'user_id'=>auth()->user()->id
            ]);

}
        return back();
    }
}
