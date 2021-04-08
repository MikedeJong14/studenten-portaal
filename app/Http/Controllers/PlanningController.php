<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Models\Appointment;
use App\Models\User;
use Auth;
use DateTime;
use DB;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    /**
     * Display a listing of the appointments made BY the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Auth::user()->appointments;
        foreach ($appointments as $appointment) {
            $newDate = new DateTime($appointment->date);
            $appointment->date = $newDate->format('d/m/Y H:i');
        }
        return view('planning/index', ['appointments' => $appointments]);
    }

        /**
     * Display a listing of the appointments made WITH the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function appointments()
    {
        $appointments = DB::table('appointments')
                                    ->where('teacher_id', '=', Auth::id())
                                    ->get();
        foreach ($appointments as $appointment) {
            $newDate = new DateTime($appointment->date);
            $appointment->date = $newDate->format('H:i Y-m-d');
        }
        return view('planning/appointments', ['appointments' => $appointments]);
    }

    /**
     * Show the first form/calendar form for creating a new appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calendar = new Calendar(null);

        return view('planning/create', ['calendar' => $calendar]);
    }

    /**
     * Show the navigated form for creating a new appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function navigate($ym)
    {
        $calendar = new Calendar($ym);

        return view('planning/create', ['calendar' => $calendar]);
    }

    /**
     * Show the second form for creating a new appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAppointment($date)
    {
        $teachers = User::all();
        return view('planning/create_appointment', ['date' => $date, 'teachers' => $teachers]);
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
            'teacher' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
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
        $teacherAppointments = DB::table('appointments')
            ->where('teacher_id', '=', $teacher->id)
            ->orwhere('user_id', '=', $teacher->id)
            ->get();

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

                return back()
                    ->withErrors($error)
                    ->withInput();
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

        return redirect('/planning')->with('success', 'Afspraak succesvol gepland');
    }

    /**
     * Display the specified appointment.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::find($id);
        $newDate = new DateTime($appointment->date);
        $appointment->date = $newDate->format('d/m/Y H:i');
        return view('planning/show', ['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $appointment->teacher = User::find($appointment->teacher_id);
        $teachers = User::all();
        return view('planning/edit', ['appointment' => $appointment, 'teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->teacher_id = $request->input('teacher');
        $appointment->title = $request->input('title');
        $appointment->description = $request->input('description');
        $appointment->time_period = $request->input('time_period');
        $appointment->date = $request->input('date');
        $appointment->school_year = $request->input('school_year');

        $appointment->save();

        return redirect()->route('planning/show', ['id' => $id])->with('success', 'Afspraak succesvol geupdated');

    }

    /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $appointment = Appointment::find($id);
        return view('planning/delete', ['appointment' => $appointment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return redirect('/planning')->with('success', 'Afspraak succesvol verwijdert');
    }

    /**
     * Get all appointments from a user.
     *
     * @param  int $userId
     * @return \Illuminate\Http\Response
     */
    public function getAppointmentsFromUser($userId) {
        $appointments = DB::table('appointments')
            ->where('teacher_id', '=', $userId)
            ->orwhere('user_id', '=', $userId)
            ->get();
        
        if (!empty($appointments)) {
            for ($i = 0; $i < count($appointments); $i++) {
                $dt = new DateTime($appointments[$i]->date);
                $appTime = $dt->format('H:i');
                $appEndTime = date_add($dt, date_interval_create_from_date_string($appointments[$i]->time_period . ' minutes'))->format('H:i');
                $data[$i]["startTime"] = $appTime;
                $data[$i]["endTime"] = $appEndTime;
            }
            return response()->json($data, 200);
        }        
    }
}
