<?php

namespace App\Http\Controllers\Auth\registerationController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Controllers\Controller;
use App\Models\TourGuide;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTourgideRequest;
use App\Models\Role;
use App\Models\TourguideLanguage;
use App\Models\User;

class TourguideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all(); //fk
        $tourGides=tourguide::all();

        return view("dashboardAdmin.Tourguide.tourguide",[ "tourGides" => $tourGides],["users"=> $users]);
        //show table from DB

    }

    public function indexprofile()
    {

        return view("dashboardTourguide.tourguideProfile",[ "tourGides" => $tourGides],["users"=> $users]);
        //show table from DB

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("MUT.tourguideSignUp");
    }

    public function createTourguide()
    {
        return view("dashboardAdmin.Tourguide.Tourguideform");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourgideRequest $request,StoreUserRequest $requestUser)
    {
// dd($request);
$name=md5(microtime()).$request['image']->getClientOriginalName();
        $request['image']->storeAs("public/imgs",$name);

       $user=  User::create([
        'name' => $requestUser['name'] ,
        'email' => $requestUser['email'],
        'password' => $requestUser['password'],
        'gender' => $requestUser['gender'] ,
        'phone' => $requestUser['phone'],
        'image'=>isset($name)?$name:null,
        ]);

       $tourguide= TourGuide::create([
        'price_per_day' =>(int)$request['price_per_day'] ,
        'syndicate_No' => $request['syndicate_No'] ,
        'bio' => $request['bio']  ,
          // 'bio' =>isset($request['bio'])?$request['bio']:null  ,
        'user_id' => $user['id']
       ]);
       if($request['language']){

           foreach ($request['language'] as  $lang) {
            // dd($value->getClientOriginalName());

            TourguideLanguage::create([
               'tourguide_id'=>$tourguide["id"],'language'=>$lang],
               );
        }
       }
// print_r($request['language']);
    //    if(is_array($request['language'])){
    //     foreach($request['language'] as $lang){

    //      $tourguide= TourguideLanguage::create([
    //            'language' => $lang ,
    //            'tourguide_id' => $tourguide['id']
    //           ]);
    //     }
    //    }else{
    //    TourguideLanguage::create([
    //         'language' => $request['language'] ,
    //         'tourguide_id' => $tourguide['id']
    //        ]);
    //    }
    // dd($user);
       $newUser = User::find($user->id);
    //    dd($newUser);
       if(!empty ( $tourguide)){
           $role=Role::where('name','tourguide')->first();
        //    dd($role->id);
           $newUser->update(['role_id'=>$role->id]);
       }

  return redirect(route('login.create',['role'=>$role->name]));
    }
















    public function storeTourguide(StoreTourgideRequest $request,StoreUserRequest $requestUser)
    {
// dd($request);
if(!empty($request->image)){

    $name=md5(microtime()).$request['image']->getClientOriginalName();
            $request['image']->storeAs("public/imgs",$name);
}

       $user=  User::create([
        'name' => $requestUser['name'] ,
        'email' => $requestUser['email'],
        'password' => $requestUser['password'],
        'gender' => $requestUser['gender'] ,
        'phone' => $requestUser['phone'],
        'image'=>isset($name)?$name:null,
        ]);

       $tourguide= TourGuide::create([
        'price_per_day' =>(int)$request['price_per_day'] ,
        'syndicate_No' => $request['syndicate_No'] ,
        'bio' => $request['bio']  ,
          // 'bio' =>isset($request['bio'])?$request['bio']:null  ,
        'user_id' => $user['id']
       ]);
// dd($request['language']);
foreach ($request['language'] as  $lang) {
    // dd($value->getClientOriginalName());

    TourguideLanguage::create([
       'tourguide_id'=>$tourguide["id"],'language'=>$lang],
       );
}
    //    if(is_array($request['language'])){
    //     foreach($request['language'] as $lang){

    //    $tourguide=TourguideLanguage::create([
    //            'language' => $lang ,
    //            'tourguide_id' => $tourguide['id']
    //           ]);
    //     }
    //    }else{
    //    TourguideLanguage::create([
    //         'language' => $request['language'] ,
    //         'tourguide_id' => $tourguide['id']
    //        ]);
    //    }
       $newUser = User::find($user->id);

       if(!empty ($tourguide)){
           $role_id =Role::where('name','tourguide')->first();
           $newUser->update(['role_id'=>$role_id->id]);
       }

       return redirect()->route('TourguideProfile.index');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tourgide  $tourgide
     * @return \Illuminate\Http\Response
     */
    public function show(TourGuide $tourgide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tourgide  $tourgide
     * @return \Illuminate\Http\Response
     */
    public function edit(TourGuide $ID)
    {

        $users=User::find($ID);
        $tourGides=tourguide::find($tourGides['user_id']);

        return view('dashboardTourguide.updateform',['users'=>$users],['tourGides'=>$tourGides]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tourgide  $tourgide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,tourguide $ID)
    {
        $name=md5(microtime()).$request['image']->getClientOriginalName();
        $request['image']->storeAs("public/imgs",$name);

       User::where('id',$ID->user_id)->update([
            'name' => $request['name'] ,
            'email' => $request['email'],
            'password' => $request['password'],
            'gender' => $request['gender'] ,
            'phone' => $request['phone'],
            'image'=>isset($name)?$name:null,
            ]);

        $ID->update([
            'price_per_day' =>(int)$request['price_per_day'] ,
            'syndicate_No' => $request['syndicate_No'] ,
            'bio' => $request['bio']  ,
              // 'bio' =>isset($request['bio'])?$request['bio']:null  ,

           ]);
    // print_r($request['language']);
    foreach ($request['language'] as  $lang) {
        // dd($value->getClientOriginalName());

        TourguideLanguage::where('tourguide_id',$ID->id)->update([
           'language'=>$lang],
           );
    }
        //    if(is_array($request['language'])){
        //     foreach($request['language'] as $lang){

        //         TourGuide::where('tourguide_id',$ID)->update([
        //            'language' => $lang ,
        //            'tourguide_id' => $tourguide['id']
        //           ]);
        //     }
        //    }else{
        //     TourGuide::where('tourguide_id',$ID)->update([
        //         'language' => $request['language'] ,
        //         'tourguide_id' => $tourguide['id']
        //        ]);
        //    }


          return redirect('dashboardTourguide.tourguideProfile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tourgide  $tourgide
     * @return \Illuminate\Http\Response
     */
    public function destroy(TourGuide $id)
    {
        $DelID= $id->delete();
        if($DelID){
            User::where ('user_id',$id)->delete();
        }

        return back();
    }
}
