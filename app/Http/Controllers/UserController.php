<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Car;
use App\Models\Radar;
use App\Models\Violation;
use Illuminate\Support\Facades\Hash;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{

    public function Userprofile($id)
    {   

        if ($id !=auth()->user()->id)
        {
            return redirect()->route('UserProfile', ['id' => auth()->user()->id]);
        }
        return view('User/profile', ['user' =>auth()->user(), 'cars'=>auth()->user()->cars]);
    }




    public function UserProfile_edit($id)
    {   
        if ($id !=auth()->user()->id)
        {
            return redirect()->route('UserProfile.edit', ['id' => auth()->user()->id]);
        }
        return view('User/profile_edit', ['user' =>auth()->user(), 'cars'=>auth()->user()->cars]);
    }




    public function UserProfile_Update($id,Request $request)
    {   
        
        $path=auth()->user()->image ; 
        $image = $request->file('image');
        $image = $request->file('image');

        if ($image) {
        if ($path && $path != 'images/user.png' && File::exists(public_path($path))) {
        File::delete(public_path($path));
        }

        $filename = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('profile_pics'), $filename);

        $path = 'profile_pics/' . $filename;
    }

        
        $me=auth()->user();
        $me->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'image' => $path,
        ]);
        if ($request->car_id)
        {
            $car = Car::firstOrCreate(
                ['car_plate' => $request->car_id],
                ['user_id' =>  auth()->id()]         
            );
        }
        return redirect()->route('UserProfile', ['id' => auth()->id()])->with('success','Your account has been updated successfully ');
    }




    
    public function password_edit($id)
    {   
        if ($id !=auth()->user()->id)
        {
            return redirect()->route('password.edit', ['id' => auth()->user()->id]);
        }
        return view('User/password_edit');
    }





    public function password_update($id , Request $request)
    {   
       $me=auth()->user();
       if (Hash::check($request->current_password, $me->password)) {

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        $me->update([
            'password' => $request->new_password,
        ]);
        return redirect()->route('UserProfile', ['id' => auth()->id()])->with("success", "Password updated successfully.");
    
        } else {
        return back()->with("error", "The password you entered is incorrect, please try again.");
        }
        
    }




    public function ReportUpload()
    {   
        return view('User/reports');
    }






    public function ReportStore(Request $request)
{
    $path = null;

    if ($request->hasFile('report_img')) {
        $image = $request->file('report_img');

        // اسم الصورة مع الوقت لتجنب التكرار
        $filename = time() . '.' . $image->getClientOriginalExtension();

        // انقل الصورة لمجلد public/reports
        $image->move(public_path('reports'), $filename);

        // المسار بالنسبة للموقع
        $path = 'reports/' . $filename;
    }

    $report = Report::create([
        'user_id' => auth()->id(),
        'description' => $request->report,
        'image' => $path,
    ]);

    if ($report) {
        return back()->with('success', 'We received your complaint successfully, thanks for your help.');
    } else {
        return back()->with('error', 'Failed to create the report. Please try again later.');
    }
}


    public function UserViolation_show ($id)
    {
        if ($id !=auth()->user()->id)
        {
            return redirect()->route('UserViolation.show', ['id' => auth()->user()->id]);
        }
        $my_cars = Car::where('user_id',auth()->id())->get()->pluck('car_plate')->toarray();
        $violations = Violation::with('radar')->whereIn('car_plate',$my_cars)->where('is_reviewed',1)->get();
        return view('User/violation_show' , ['violations'=> $violations]);

    }


    
    
}
