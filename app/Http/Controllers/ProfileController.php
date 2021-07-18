<?php

namespace App\Http\Controllers;

use App\Proficiency;
use Auth;
use App\Profile;
use App\User;
use App\role;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\EventListener\ProfilerListener;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('doctor');
        
    }
    
    public function index(Request $request)
    {
        //  $s = $request->input('s');

        //     $proficiencies = Proficiency::with('user')->search($s)
        //     ->paginate(10);
            
            // return view ('help.proficiency.home', compact('proficiencies', 's'));
    }
    public function edit ()
    {
        $user = User::find(Auth::id());
        $profile = Profile::where('user_id', '=', Auth::id())->first();
        $proficiencies = Proficiency::all();
        return view ('medic.profile.edit', compact('user','proficiencies','profile'));
    }

    public function update (Request $request)
    {
    //    $this->validate($request, [
    //         'name' => 'required|string|max:50|unique:proficiencies'
    //     ]);
    $user = User::findOrFail(Auth::id());
    $user->name= request('name');
    $user->email= request('email');
    $user->seg_social= request('seg_social');
    $user->update();

    $profile = Profile::findOrFail(Auth::id());
    $profile->bio = request('bio');
    $profile->clinic_name = request('clinic_name');
    $profile->clinic_address = request('clinic_address');
    $profile->education = request('education');
    $profile->experience = request('experience');
    $profile->awards = request('awards');
    $profile->update();

    session()->flash('message', 'Cập nhật Profile thành công!');
    
    return redirect('/medic/home');

    }

}
