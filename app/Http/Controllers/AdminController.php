<?php

namespace App\Http\Controllers;
use App\Models\Violation;
use App\Models\Accident;
use App\Models\Traffic;
use App\Models\Radar;
use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminProfile($id)
    {   

        if ($id !=auth()->user()->id)
        {
            return redirect()->route('admin.profile', ['id' => auth()->user()->id]);
        }
        return view('Admin/profile', ['Admin' =>auth()->user()]);
    }

    public function AdminProfile_Update($id,Request $request)
    {          
        $me=auth()->user();
        $me->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone_number' => $request->phone,
        ]);
        return redirect()->route('admin.profile', ['id' => auth()->id()])->with('success','Your account has been updated successfully ');
    }

    public function ViolationShow()
    {
        return view('Admin/ViolationShow', ['violations'=> Violation::with('radar')->where('is_reviewed',0)->orderBy('created_at', 'desc')->get()]);
    }

    public function ViolationHandle($id , Request $request)
    {
        $violation = Violation::findOrFail($id);
        if ($request->action_type === 'approve') {
            $violation->is_reviewed = 1 ;
            $violation->save();
            $msg="Violation has been approved successfully" ;
        } elseif ($request->action_type === 'decline') {
            $violation->delete();
            $msg="Violation has been deleted successfully" ;
        }
        return redirect()->back()->with('success',$msg);

    }

    public function AccidentShow()
    {
        return view('Admin/AccidentShow', ['Accidents'=> Accident::with('radar')->where('is_reviewed',0)->orderBy('created_at', 'desc')->get()]);
    }

    public function AccidentHandle($id,Request $request)
    {
        $Accident = Accident::findOrFail($id);
        if ($request->action_type === 'approve') {
            $Accident->is_reviewed = 1 ;
            $Accident->save();
            $msg="Accident has been marked as handeled with successfully" ;
        } elseif ($request->action_type === 'decline') {
            $Accident->delete();
            $msg="Accident has been deleted successfully" ;
        }
        return redirect()->back()->with('success',$msg);
    }


    public function ReportShow()
    {
        return view('Admin/ReportShow', ['Reports'=> Report::orderBy('created_at', 'desc')->get()]);
    }


    public function ReportDestroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        $msg="Report has been deleted successfully" ;
        return redirect()->back()->with('success',$msg);
    }
    
    

    public function RadarShow()
    {
        return view('/Admin/RadarList',[
            'Setup_radars'=>Radar::whereNotNull('width')->get(),
            'edit_radars'=>Radar::whereNull('width')->get()
        ]);
    }

    public function RadarSetup($id)
    {
        return view('/Admin/RadarSetup',[
            'radar'=>Radar::findorfail($id),
            'traffics'=>Traffic::all()
        ]);
    }

    public function RadarSetup_Save(Request $request ,$id)
    {
        $radar = Radar::findOrFail($id);
        $radar->update([
            'max_speed' => $request->max_speed,
            'width' => $request->width,
            'lenght' => $request->lenght,
            'traffic_id' => $request->traffic_id,
        ]);
        $msg="Radar has been setuped successfully" ;
        return redirect()->route('radar.show')->with('success',$msg);
    }
    









}
