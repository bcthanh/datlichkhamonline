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
        return view('home', compact('proficiencies', 'newdoctors', 'colors'));
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

    public function searchName(Request $request){
        $doctors = User::with(['role'])
        ->whereHas('role', function($query) {
            $query->where('name', 'Doctor');
        })->where('name', 'like', '%' . $request->value . '%')->get();

        return response()->json($doctors); 
    }

    public function searchAddress(Request $request){
        $doctors = User::with(['role, profile'])
        ->whereHas('role', function($query) {
            $query->where('name', 'Doctor');
        })->where('profile.name', 'like', '%' . $request->value . '%')->get();

        return response()->json($doctors); 
    }

    public function searchChuyenkhoa(Request $request){
        $doctors = User::with(['role, proficiencies'])
        ->whereHas('role', function($query) {
            $query->where('name', 'Doctor');
        })
        ->whereHas('proficiencies', function ($q) use ($request) {
            $q->where('proficiencies.id', 'like', '%' . $request->value . '%');
        })
        ->get();

        return response()->json($doctors); 
    }

    // public function showDoctor($id)
    // {
    //     $detail = User::with('profile')->find($id);
    //     // $proficiencies = Proficiency::All();

    //     return view ('doctor.show', compact('deail'));
       
    // }

    public function search(Request $request){
        $s = $request->input('s');

        $doctors = User::with('role', 'proficiencies', 'profile')
        ->whereHas('role', function($query) {
            $query->where('name', 'Doctor');
        })->search($s)->orderByDesc('name')
        ->paginate(10);
        
       return view ('search', compact('doctors', 's'));
        // return view('search');
    }

    public function showDoctor($id){
        return view('doctor-profile');
    }
    public function viewProfile($slug){
        $doctor = User::with('scheduletimings', 'profile', 'proficiencies')->where('slug', '=', $slug)->first();

        return view('doctor-profile', compact('doctor', 'slug'));
    }

    public function booking($slug){
        $doctor = User::with('scheduletimings', 'profile')->where('slug', '=', $slug)->first();

        $slots = array();
        $today_in_week = Carbon::now()->dayOfWeek;
        foreach( $doctor->scheduletimings as $schedule){
            //tim slots theo tung ngay
            if ($schedule->day_in_week == $today_in_week){ 
                $tt = Carbon::parse($schedule->starting_time);
                while ($tt <= Carbon::parse($schedule->ending_time)){
                    $slots[] = $tt->format('H:i');
                    // $tt += $schedule->minutes_per_patient;
                    $tt->addMinutes($schedule->minutes_per_patient);
                }
            }
        }
        //lay du lieu cho 15 ngay toi - cho dat lich
        // $today = Carbon::now();
        // for ($i = 0; $i < 15; $i++){
        //     $d = $today->addDays($i);
        //     // $slots[$d->format('Y-m-d')] = array();
        //     $slots[$d->format('y-m-d')] = array();
        //     $diw = $d->dayOfWeek; //tra ve 0 - 1 - 2...-6

        //     foreach( $doctor->scheduletimings as $schedule){
        //         //tim slots theo tung ngay
        //         if ($schedule->day_in_week == $diw){ 
        //             $tt = Carbon::parse($schedule->starting_time);
        //             while ($tt <= Carbon::parse($schedule->ending_time)){
        //                 $slots[$d->format('y-m-d')][] = $tt->format('H:i');
        //                 // $tt += $schedule->minutes_per_patient;
        //                 $tt->addMinutes($schedule->minutes_per_patient);
        //             }
        //         }
        //     }
        // }

        //lay du lieu 

        if ($doctor && $slots){
            return view('booking', compact('doctor', 'slots'));
        } else {
            return 'Khong tim thay bac si';
        }        
    }

    public function getSlotsByDate(Request $request){
        $choosen_date = request('choosen_date');
        $doctor_id = request('doctor_id');

        $slots = array();
        //co the dung 1 trong 2 cach de chuyen datestring sang date
        $today_in_week = Carbon::createFromFormat('d/m/Y', $choosen_date)->dayOfWeek;
        // $today_in_week = Carbon::parse(date_format($choosen_date, 'd/m/y'))->dayOfWeek;
        $doctor = User::findOrFail($doctor_id);
        foreach( $doctor->scheduletimings as $schedule){
            //tim slots theo tung ngay
            if ($schedule->day_in_week == $today_in_week){ 
                $tt = Carbon::parse($schedule->starting_time);
                while ($tt <= Carbon::parse($schedule->ending_time)){
                    $slots[] = $tt->format('H:i');
                    // $tt += $schedule->minutes_per_patient;
                    $tt->addMinutes($schedule->minutes_per_patient);
                }
            }
        }

        return response()->json($slots);
    }

    public function datlichkham(Request $request){
        $appointment = Appointment::create([
            
            'name' => request('hoten'),
            'sns' => request('sdt'),
            'especialidade' => request ('ghichu'), //-- sau nay dich vu -- request ('especialidade'),
            'data' => request ('giokham'),
            'user_id' => request ('bacsi_id'),
            'realizada' => (0)
        ]);

        session()->flash('message', 'Đặt lịch thành công!');
        
        return view('thanks', compact('appointment'));
    }

    public function dsbacsitheochuyenkhoa($proid){
        $s = "";
        $doctors = User::with('role', 'proficiencies', 'profile')
        ->whereHas('role', function($query) {
            $query->where('name', 'Doctor');
        })->whereHas('proficiencies', function($q2) use ($proid){
            $q2->where('proficiencies.id', $proid);
        })->orderByDesc('name')
        ->paginate(10);
        
       return view ('search', compact('doctors', 's'));
    }
}
