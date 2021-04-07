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

    /**
     * Show the second form for creating a new appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $appointment = Appointment::find($id);
        $teachers = User::all();
        
        return view('docent/create', ['appointment' => $appointment, 'teachers' => $teachers]);
    }

    /**
     * Store a newly created appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);
        
        //format input date and time
        $date = $request->input('date');
        $time = $request->input('timeHour') . ":" . $request->input('timeMinute');
        
        //create new dateTime for calculation
        $timeDt = new DateTime($time);
        $endTime = date_add($timeDt, date_interval_create_from_date_string($request->input('time_period') . ' minutes'))->format('H:i');
        
        //combine date and time into one variable
        $datetime = date(
            'Y-m-d H:i',
            strtotime($date . $time)
        );

        //find appointments from teacher
        $teacher = User::find($request->input('teacher'));
        $teacherAppointments = Appointment::where('teacher_id', '=', $teacher->id)->orwhere('user_id', '=', $teacher->id)->get();

        //compare per appointment if date and time overlap with input
        for ($i = 0; $i < count($teacherAppointments); $i++) {
            $dt = new DateTime($teacherAppointments[$i]->date);
            $appLength = $teacherAppointments[$i]->time_period;
            $appDate = $dt->format('Y-m-d');
            $appTime = $dt->format('H:i');
            $appEndTime = date_add($dt, date_interval_create_from_date_string($appLength . ' minutes'))->format('H:i');

            //if overlap, return with error
            if ($appDate == $date && $time < $appEndTime && $appTime < $endTime) {
                $error = 'De opgegeven docent "' . $teacher->name . '" heeft al een afspraak staan van ' . $appTime . ' tot ' . $appEndTime . '.';

                return back()->withErrors($error)->withInput();
            }
        }

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
