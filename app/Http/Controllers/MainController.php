<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hotel;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        return view('home');
    }
    public function submit(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'bail|required|email|unique:users',
            'address' => 'required',
            'nearBstop' => 'required',
            'phone' => 'required',
            'password' => 'bail|required|min:6',
            ]);

        $password = bcrypt($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'nearBstop' => $request->nearBstop,
            'password' => $password,
            ]);
         return $user;
    }
    public function submitHotel(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'bail|required|email|unique:users',
            'address' => 'required',
            'phoneNo' => 'required',
            'state_id' => 'required',
            'nearStop' => 'required',
            ]);

        $password = bcrypt($request->password);
        $user = Hotel::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phoneNo' => $request->phoneNo,
            'state_id' => $request->state_id,
            'nearStop' => $request->nearStop,
            ]);
         return $user;
    }
    public function submitState(Request $request)
    {
        $this->validate($request,[
            'stateName'=>'required'
        ]);
        $state = States::create([
            'stateName' =>$request->stateName,
        ]);
    }
    public function adminLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
        }
        return $user;
    }
    public function adminPage(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = Auth::user();
        if(Auth::check() && $user->userType != "Admin"){
            return redirect('/');
        }
        return view('home');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function getStates()
    {
        return States::orderBy('id', 'desc')->get();
    }
    public function checkAdmin()
    {
        if (!Auth::check()) {
            return response()->json([
                'msg' => 'Login First',
            ], 401);
        }
        if(Auth::check() && Auth::user()->userType == "User"){
            return response()->json([
                'msg' => 'You are not Permitted to Carry Out this Action'
            ], 401);
        }
        if(Auth::check() && Auth::user()->userType == "Admin"){
            return response()->json([
                'msg' => 'You can now add extra Rooms'
            ], 200);
        }
    }
    public function getHotels(Request $request, $id)
    {
       return Hotel::where('state_id', $id)->get();
    }
}
