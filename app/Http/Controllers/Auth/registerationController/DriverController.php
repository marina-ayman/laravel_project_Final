<?php

namespace App\Http\Controllers\Auth\registerationController;
use App\Http\Controllers\Auth\registerationControlle\userController;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 



class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all(); //fk
        $driver=driver::all();
        return view("driverRegistrations.index",[ "driver" => $driver->paginate(15)],["users"=> $users->paginate(15)]);

      
     }
     public function indexDriver()
     {
        //  $users=User::all(); //fk
        //  $driver=driver::all();
      
         return view("dashboardAdmin.Driver.driver");
         //show table from DB
      }



     public function indexprofile()
     {
        
         return view("dashboardDriver.driverindex");
         //show table from DB

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("MUT.driverSignUp");
    }

    public function createDriver()
    {
        return view("dashboardAdmin.Driver.driverform");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request, StoreUserRequest $requestUser)
    {

        $user=  User::create([
            'name' => $requestUser['name'] ,
            'email' => $requestUser['email'],
            'password' =>  Hash::make($requestUser['password']),
            'gender' => $requestUser['gender'],
            'phone' => $requestUser['phone'],
             'image'=>isset($requestUser['image'])?$requestUser['image']-> storeAs("public/imgs",md5(microtime()).$requestUser['image']->getClientOriginalName()):null,
            ]);

      $driver= driver::create([
        'license' => $request['license'],
        'user_id' => $user['id']
       ]);

       $newUser = User::find($user->id);
       if(!empty ($driver)){
           $role =Role::where('name','driver')->first();
           $newUser->update(['role_id'=>$role->id]);
       }

  return redirect(route('login.create',['role'=>$role->name]));
    }





    public function storeDriver(StoreDriverRequest $request, StoreUserRequest $requestUser)
    {

        $user=  User::create([
            'name' => $requestUser['name'] ,
            'email' => $requestUser['email'],
            'password' =>  Hash::make($requestUser['password']),
            'gender' => $requestUser['gender'],
            'phone' => $requestUser['phone'],
             'image'=>isset($requestUser['image'])?$requestUser['image']-> storeAs("public/imgs",md5(microtime()).$requestUser['image']->getClientOriginalName()):null,
            ]);

      $driver= driver::create([
        'license' => $request['license'],
        'user_id' => $user['id']
       ]);

       $newUser = User::find($user->id);
       if(!empty ($driver)){
           $role_id =Role::where('name','driver')->limit(1)->get();
           $newUser->update(['role_id'=>$role_id[0]->id]);
       }

  return redirect('dashboardDriver.driverindex',['role'=>$request->role]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(driver $id)
    {
        // $users=User::all($driver); //fk
        $driver=$id;

        return view('dashboardDriver.editDriver',['driver'=>$driver]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, driver $driver)
    {

       $user= User::where('id',$driver->user_id)->update([
            'name' => $request['name'] ,
            'email' => $request['email'],
            'password' => $request['password'],
            'gender' => $request['gender'] ,
            'phone' => $request['phone'],
            'image'=>isset($request['image'])?$request['image']-> storeAs("public/imgs",md5(microtime()).$request['image']->getClientOriginalName()):null,
            ]);

        $driver->update([

        'license' => $request['license'],
        'user_id' => $user['id']
       ]);
       return redirect(route('driverprofileDash.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(driver $id)
    {
        $DelID= $id->delete();
        if($DelID){
            User::where ('user_id',$id)->delete();
        }

        return back();
    }
}

