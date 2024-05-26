<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;


class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
           if(Auth::user()->userType == '0'){
            $doctor = doctor::all();
            return view('user.home',compact('doctor'));
           }
           else{
            return view('admin.home');
           }
        }
        else{
            return redirect()->back();
        }
    }

    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
            $doctor = doctor::all();
            return view('user.home',compact('doctor'));
        }
    }

    // public function appointment(Request $request){
    // $data = new appointment;
    // $data->name  = $request->name;
    // $data->email  = $request->email;
    // $data->phone  = $request->number;
    // $data->doctor  = $request->doctor;
    // $data->date  = $request->date;
    // $data->message  = $request->message;
    // $data->status  = 'In Progress';

    // if(Auth::id())
    // {
    // $data->user_id  = Auth::user()->id;
    // }

    // $data->save();
    // return redirect()->back();

    // }

    public function appointment(Request $request){
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string|max:20',
            'doctor' => 'required|string|max:255',
            'date' => 'required|date',
            'message' => 'nullable|string|max:1000',
        ]);

        // Create a new appointment instance
        $data = new Appointment;
        $data->name = $validated['name'];
        $data->email = $validated['email'];
        $data->phone = $validated['number'];
        $data->doctor = $validated['doctor'];
        $data->date = $validated['date'];
        $data->message = $validated['message'];
        $data->status = 'In Progress';

        // If the user is authenticated, add their ID to the appointment
        if (Auth::check()) {
            $data->user_id = Auth::user()->id;
        }

        // Save the appointment to the database
        $data->save();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Appointment booked successfully!');
    }

    public function my_appointment(){
        if(Auth::id()){
            if(Auth::user()->userType == 0){
                $userid = Auth::user()->id;
                $appoint = appointment::where('user_id',$userid)->get();
                return view('user.my_appointment',compact('appoint'));
            }
            else{
                return redirect()->back();
            }

        }
        else{
            return redirect()->back();
        }

    }

    public function cancel_appoint($id){
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function aboutus(){
        return view('user.aboutus');
    }

    public function contactus(){
        return view('user.contactus');
    }
}