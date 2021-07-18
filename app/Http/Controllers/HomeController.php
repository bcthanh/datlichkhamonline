<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proficiency;
use App\User;
use App\Appointment;
use DateTime;
use Carbon\Carbon;
 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('doctor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $colors = ["green", "blue", "red", "yellow"];
        $proficiencies = Proficiency::all();    
        // $newdoctors = User::has('role', 1)->orderBy('created_at', 'desc')->take(5)->get();
        // $newdoctors = User::with(['role' => function($q){
        //     $q->where('id', 1);
        //     }])->get();
        $newdoctors = User::with(['role'])
        ->whereHas('role', function($query) {
            $query->where('name', 'Doctor');
        })
        ->get();
        // $newdoctors = User::with(->having('role_id', 1)->get();
        return view('welcome', compact('proficiencies', 'newdoctors', 'colors'));
    }

    public function findUsersDate(Request $request)
    {
        
        $dt  = $request->data;
        $e = $request->proficiency;

        //$createDate = new DateTime($dt);
        $dtparse =  str_replace('T', ' ', $dt);
        $date = date('H:i:s', strtotime($dtparse));

        $dtcarbon = Carbon::parse($dt);

        // define a 30 minute interval between apointments

        $parsetry =  str_replace('T', ' ', $dt);
        $try2 = strtotime($parsetry);

        $try = $try2 - (15 * 100);
        $dtstart = date("Y-m-d H:i:s", $try);

        $try4 = $try2 + (15 * 100);
        $dtend = date("Y-m-d H:i:s", $try4);

        $users=User::select('id', 'name', 'hora_in', 'hora_out')
        ->whereHas('proficiencies', function ($q) use ($e) {
            $q->where('proficiencies.id', $e);
        })
        ->where('hora_in', '<=', $date)
        ->where('hora_out', '>', $date)->get();

        return response()->json($users);
    }

    public function store(Request $request)
    {
        $now = Carbon::now();
        $this->validate(request(),  [
            'name' => 'required|string|max:255',
            'sns' => 'required|string',
            'especialidade' => 'required',
            'data' => 'required|date|after_or_equal:tomorrow',
            'user_id' => 'required|integer',
        ]);

        $appointment = Appointment::create([
            
            'name' => request('name'),
            'sns' => request ('sns'),
            'especialidade' => request ('especialidade'),
            'data' => request ('data'),
            'user_id' => request ('user_id'),
            'realizada' => (0)
        ]);

        session()->flash('message', 'Đặt lịch thành công!');
        
        return redirect('/thanks');
    }

    public function thanks(){
        return view('thanks');
    }
}
