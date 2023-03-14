<?php

namespace App\Http\Controllers\placesController;
use App\Http\Controllers\Controller;
use App\Models\HotelImg;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Models\PlaceImg;




class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places= Place::all();
        $placeImg=PlaceImg::all();
        // return response()->json([
        //     'allPlaces '=> $places,

        // ]);


        return view("dashboardAdmin\allPlaces\placesTable",["places"=> $places],['placeImg'=>$placeImg]);
    }

    public function create()
    {
        return view("dashboardAdmin\allPlaces\placesForm");

    }


    public function edit(place $id)
    {
        // dd($id->id);
        // $places =Place::find($Place);
        $PlaceImg=PlaceImg::where('place_id',$id->id)->get();

        return view('dashboardAdmin.allPlaces.Editplaces',['places'=>$id],['PlaceImg'=>$PlaceImg]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required','min:10',
            // 'price'=>'numric'
        ]);
// dd($request['image']);
        $place = Place::create([
            'name' => $request['name'],
            'description' =>$request['description'],
            'price' =>$request['price'],
            'cover_img' =>$request['cover_img']->storeAs("public/imgs",md5(microtime()).$request['cover_img']->getClientOriginalName()),
            'type'=>$request['type']
        ]);

        foreach( $request['image'] as $img){

            // dd($img);
               PlaceImg::create([
                    'image'=> $img->storeAs("public/imgs",md5(microtime()).$img->getClientOriginalName()),
                    'place_id'=>$place->id
                    //
                  ]);

        }


     return   redirect(route('PlaceeDash.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        // $place = Place::find($placeID);
        // dd($placeID);
        return  view('MUT.placeDetails',[
            'place'=> $place,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Place $id)
    {

          $id->update([
            'name' => $request['name'],
            'description' =>$request['description'],
            'price' =>$request['price'],
            'cover_img' =>$request['cover_img']->storeAs("public/imgs",md5(microtime()).$request['cover_img']->getClientOriginalName()),
            'type'=>$request['type']

          ]);

          foreach( $request['image'] as $img){

            // dd($img);
            PlaceImg::where('place_id',$id->id)->update([
                    'image'=> $img->storeAs("public/imgs",md5(microtime()).$img->getClientOriginalName()),
                    'place_id'=>$id->id
                    //
                  ]);

        }

        // $place=Place::find($place);
        // $placeID->update($request->all());
        // dd($placeID->id);

        // return response()->json([
        //       'place updated successfully'=>$placeID
        //   ]);

return back();

          }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $id)
    {
        // dd($id);
        $DelplaceID=  $id->delete();
        // Place::($id)->delete();



        if($DelplaceID){
            PlaceImg::where ('place_id',$id->id)->delete();
        }


        // return response()->json([
        //     'message' =>'place deleted'
        // ]);
        return back();
    }
}
