<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use Auth;
use App\role;
use Carbon\Carbon;
use App\Scheduletiming;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

       public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('doctor');

        
    }
  

     public function index(Request $request)
    {        
        $sun_slots = Scheduletiming::where('user_id', '=', Auth::id())
            ->where('day_in_week', '=', 0) ->orderBy('starting_time')->get();
        $mon_slots = Scheduletiming::where('user_id', '=', Auth::id())
            ->where('day_in_week', '=', 1) ->orderBy('starting_time')->get();
        $tue_slots = Scheduletiming::where('user_id', '=', Auth::id())
            ->where('day_in_week', '=', 2) ->orderBy('starting_time')->get();
        $wed_slots = Scheduletiming::where('user_id', '=', Auth::id())
            ->where('day_in_week', '=', 3) ->orderBy('starting_time')->get();
        $thu_slots = Scheduletiming::where('user_id', '=', Auth::id())
            ->where('day_in_week', '=', 4) ->orderBy('starting_time')->get();
        $fri_slots = Scheduletiming::where('user_id', '=', Auth::id())
            ->where('day_in_week', '=', 5) ->orderBy('starting_time')->get();
        $sat_slots = Scheduletiming::where('user_id', '=', Auth::id())
            ->where('day_in_week', '=', 6) ->orderBy('starting_time')->get();
            
        return view ('medic.schedule.home', compact('sun_slots', 'mon_slots', 'tue_slots', 'wed_slots', 'thu_slots', 'fri_slots','sat_slots'));
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {


        $appointment = Appointment::find($id);
        $proficiencies = Scheduletiming::All();

        return view ('medic.appointment.show', compact('appointment', 'proficiencies'));
       
    }



    public function edit($id) 
    {

        $appointment = Appointment::find($id);
        $proficiencies = Scheduletiming::All();
        //CongThanh fix - khi click vao nut Perform de cap nhat cho appointment
        // return view ('medic.appointment.edit', compact('appointment', 'users', 'proficiencies'));
        return view ('medic.appointment.edit', compact('appointment', 'proficiencies'));

    }

   
    public function update(Request $request, Appointment $appointment, $id)
    {

        
        $this->validate(request(), [
            'sintomas' => 'required|string|max:255',
            'diagnostico' => 'required|string|max:255',
        ]);




        $appointment = Appointment::findOrFail($id);
        $r = $appointment->realizada;

        if ($r == 0){
                       
            $appointment->sintomas = request('sintomas');
            $appointment->diagnostico = request('diagnostico');
            $appointment->realizada = 1 ;   

             $appointment->save();

 
                session()->flash('message', 'Appointment performed successfully!');
        
                return redirect('/medic/appointment/home');
        }
        else 
        {
           session()->flash('message', 'Impossible to perform a medical appointment alredy performed');

            return redirect('/medic/appointment/home');
        }
    }

    public function scheduleSettings(Request $request){
        $response = [];

        $diw = request('diw');
        $duration = request('duration');
        $starts = request('starts');
        $ends = request('ends');

        //xoa cac khung thoi gian (nếu có)
        Scheduletiming::where('user_id', '=', Auth::id())->where('day_in_week', '=', $diw)->delete();
        
        //insert vao
        for ($i = 0; $i < count($starts); $i++){
            //de su dung create thi phai co thuoc tinh fillable hay guard trong Model
            // $sct = Scheduletiming::create([
            //     'user_id' => Auth::id(),
            //     'day_in_week' => $diw,
            //     'starting_time' => $starts[$i],
            //     'ending_time' => $ends[$i]
            // ]);
           
            //khong can fillable
            $scb = new Scheduletiming;
            $scb->user_id = Auth::id();
            $scb->day_in_week = $diw;
            $scb->starting_time = $starts[$i];
            $scb->ending_time = $ends[$i];
            $scb->minutes_per_patient = $duration;
            $scb->save();

            $response[] = $scb;
        }

        //tra ve dsach lich moi cho bac si nay
        // $list_timeslots = Scheduletiming::where('user_id', '=', Auth::id())->where('day_inget();
        return response()->json($response);


    }
}
