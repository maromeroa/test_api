<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentsController extends Controller
{
    public function index() {
        return "debe seleccionar una fecha para agendar";
    }

    public function get($date) {
        $appointments = Appointment::where('date', $date)->pluck('start_time')->toArray();
        //dd($appointments);
        return json_encode($this->getAvailableHours($appointments));
    }

    public function save(Request $request) {
        $appointment = Appointment::create($request->all());
        return response()->json($appointment, 201);
    }

    public function update($datetime) {
        //return $appointment;
        return "actualiza uno";
    }

    public function delete($datetime) {
        return "borra uno";
    }

    private function getAvailableHours($appointments){
        $startHour = "09";
        $finishHour = "18";
        $availablesHours = array();
        for ($h = $startHour; $h < $finishHour; $h++){
            if( ! in_array($h . ':00:00', $appointments)){
                $availablesHours[] = $h . ':00';
            }
        }
        return $availablesHours;

    }
    
}
