<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Models\Appointment;
use App\Models\User;
use Auth;
use DateTime;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    /**
     * Display a listing of the appointments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Auth::user()->appointments;
        foreach ($appointments as $appointment) {
            $newDate = new DateTime($appointment->date);
            $appointment->date = $newDate->format('H:i Y-m-d');
        }
        return view('planning/index', ['appointments' => $appointments]);
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
        $appointment = new Appointment([
            'user_id' => Auth::id(),
            'teacher_id' => $request->input('teacher'),
            'title' => strtolower($request->input('title')),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'time_period' => $request->input('time_period'),
            'accepted' => false,
            'school_year' => $request->input('school_year')
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
        $appointment->date = $newDate->format('H:i Y-m-d');
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
        $appointment->title = strtolower($request->input('title'));
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
}
