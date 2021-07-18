<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MedicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('doctor');
        $this->middleware('help');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return view('medic.home');
        $s = $request->input('s');

            $doctors = User::with(['role', 'proficiencies'])->search($s)->orderByDesc('name')
            ->whereHas('role', function($query) {
                $query->where('name', 'Doctor');
            })
            ->paginate(10);
            
           return view ('help.users.home', compact('doctors', 's'));
    }

    public function destroy($id)
    {
        $doctor = User::findOrFail($id);
        // $doctor->proficiencies()->detach();
        // $doctor->role()->detach();
        // $doctor->appointment()->detach();
        /*$proficiency->user()->detaching(Proficiency::where($id, $proficiency_id)->first());*/
        // $doctor->delete();
        $doctor->active = 0;
        $doctor->update();

        session()->flash('message', 'Vô hiệu hóa Tài khoản Thành công!');
    
        return redirect('/help/users/home');

    }

    public function active($id)
    {
        $doctor = User::findOrFail($id);
        // $doctor->proficiencies()->detach();
        // $doctor->role()->detach();
        // $doctor->appointment()->detach();
        /*$proficiency->user()->detaching(Proficiency::where($id, $proficiency_id)->first());*/
        // $doctor->delete();
        $doctor->active = 1;
        $doctor->update();

        session()->flash('message', 'Kích hoạt Tài khoản Thành công!');
    
        return redirect('/help/users/home');

    }

    //hien thi cho bac si
    public function home(){
        return view('medic.home');
    }
}
