<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Crimecar;
use App\Models\Crimehistory;
use App\Models\Radar;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function ControlAdmins()
    {   
        return view('SuperAdmin/AdminControl', ['Admins' => User::where('role', 'admin')->get()]);
    }


    public function AdminAdd(Request $request)
    {
        
        $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6|same:password',
        ],[
        'email.unique' => 'This email is already registered , please try another one.',
        'password.confirmed' => 'Two passwords must be the same , please try again .',
        'password_confirmation.same' => 'Two passwords must be the same , please try again .',
        ]
        );

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password, 
            'role'=>'admin'
        ]);
        return redirect()->route('admins.control',['id'=>auth()->id()])->with('success','An admin has been added successfully');
        
    }


    public function AdminRemove($id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Admin removed successfully.');
    }

    public function FeatureControl()
    {
        return view('SuperAdmin/FeatureControl',['radars'=>Radar::all()]);        
    }

    public function FeatureUpdate($id,Request $request)
    {

        $radar=Radar::findorfail($id);
        $radar->update([
            'is_violation' => ($request->has('violation_ctrl') ? true : false),
            'is_accident' => ($request->has('accident_ctrl') ? true : false),
            'is_crime_cars' =>($request->has('crime_ctrl') ? true : false)
        ]);
        return back()->with('success', 'Radar updated successfully!');

    }

    
    public function CrimecarsManage()
    {
        return view('SuperAdmin/CrimeCars', ['CrimeCars' => CrimeCar::all() 
                                            , 'CrimeHistories'=>CrimeCar::with('crimehistory.radar')->whereHas('crimehistory')->get()]);
    }


    public function CrimecarAdd( Request $request)
    {
        $request->validate([
            'car_plate' => 'required|unique:crimecars,car_plate', // Apply unique validation
        ], [
            'car_plate.unique' => 'The car plate is already being observed.',
        ]);

       Crimecar::create([
        'car_plate'=>$request->car_plate
        ]);
        return redirect()->route('crimecars.manage')->with('success' , 'Crime car has been added to observation process successfully'); 
    }

    public function CrimecarDelete($id)
    {
        $car = Crimecar::findorfail($id);
        $car->delete();
        return redirect()->route('crimecars.manage')->with('success' , "Crime car & it's records have been deleted from database successfully"); 
    }

}
