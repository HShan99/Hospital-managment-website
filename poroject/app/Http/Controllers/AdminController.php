<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use BaconQrCode\Renderer\Path\Move;
use Illuminate\Http\Request;
use Illuminate\Notifications\Events\NotificationSent;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;
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

    public function showdoctors(){
        $data = Doctor::all();
        return view('admin.showdoctor',compact('data'));
    }

    public function deletedoctor($id){
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id){
        $data = Doctor::find($id);
        return view('admin.updatedoctor',compact('data'));
    }

    public function editdoctor(Request $request,$id ){
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->specialty = $request->specialty;
        $doctor->room = $request->room;

        $image = $request->file;
        if($image){
        $imagename = time(). '.' . $image->getClientOriginalExtension;

        $request->file->Move('doctorimage',$imagename);
        $doctor->image = $imagename;
    }
        $doctor->save();
        return redirect()->back()->with('message','Updated Successfully');
    }

    public function email_view($id){
        $data = Appointment::find($id);

        return view('admin.email_view',compact('data'));
    }

    public function send_email(Request $request,$id){
        $data = Appointment::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart

        ];

        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with('message','Email send Successfully');


    }
}