<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Models\Appointment;
use App\Models\User;
use Auth;
use DateTime;
use Illuminate\Http\Request;

class DocentController extends Controller
{
    public function index()
    {
        return view('docent.index');
    }
    public function vragen()
    {
        return view('docent.vragen');
    }
    public function gesprekken()
    {
        $appointments = Auth::user()->appointments;
        foreach ($appointments as $appointment) {
            $newDate = new DateTime($appointment->date);
            $appointment->date = $newDate->format('H:i Y-m-d');
        }

        return view('docent.gesprekken', ['appointments' => $appointments]);
    }

    public function apmntToCreate(Request $request)
    {
        
        return redirect('/docent/gesprekken');
    }
    
    /**
     * Show the first form/calendar form for creating a new appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('id');
        $calendar = new Calendar(null);
        
        return view('docent/create', ['id' => $id, 'calendar' => $calendar]);
    }

    public function apmntToNav()
    {
        //
    }
    
    /**
     * Show the navigated form for creating a new appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function navigate($ym, Request $request)
    {
        $id = $request->input('id');
        $calendar = new Calendar($ym);
        
        return view('docent/create', ['id' => $id, 'calendar' => $calendar]);
    }
    
    public function apmntToForm()
    {
        //
    }

    /**
     * Show the second form for creating a new appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function followUpAppointment($date, Request $request)
    {
        $appointment = Appointment::find($request->input('id'));
        $teachers = User::all();
        return view('docent/follow_up_appointment', ['appointment' => $appointment, 'date' => $date, 'teachers' => $teachers]);
    }

    /**
     * Store a newly created appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datetime = date(
            'Y-m-d H:i',
            strtotime($request->input('date')) + strtotime($request->input('time'))
        );
        $appointment = new Appointment([
            'user_id' => Auth::id(),
            'teacher_id' => $request->input('teacher'),
            'title' => $request->input('title'),
            'date' => $datetime,
            'description' => $request->input('description'),
            'time_period' => $request->input('time_period'),
            'accepted' => false,
            'school_year' => $request->input('school_year'),
        ]);

        $appointment->save();

        return redirect('/docent/gesprekken')->with('success', 'Afspraak succesvol gepland');
    }
}
