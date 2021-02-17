<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Calendar;
use Auth;
use Illuminate\Http\Request;
use Session;

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
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'time_period' => $request->input('time_period'),
            'accepted' => false,
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
        return view('planning/show', ['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
