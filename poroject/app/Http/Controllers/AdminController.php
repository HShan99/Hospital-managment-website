<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }

    public function upload(Request $request){
        $doctor = new doctor;
        $image = $request->image;
        $imagename = time(). '.' . $image->getClientOriginalExtension();
        $request->image->move('doctorimage',$imagename);

        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->specialty = $request->specialty;

        $doctor->save();
        return redirect()->back()->with('message','Doctor Add Successfully');
    }

    public function showappointment(){
        $data = Appointment::all();
        return view('admin.showappointment',compact('data'));
    }

    public function approved($id){
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();

    }

    public function canceled($id){
        $data = Appointment::find($id);
        $data->status = 'Canceled';
        $data->save();
        return redirect()->back();

    }
}
