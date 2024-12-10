<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\ContactModel;
use App\Models\DoctorModel;

class DashboardController extends BaseController
{
    public function index()
    {
        // Simplified session handling
        $session = session();
        $patientId = $session->get('patientId'); // Assume patientId is always set if logged in

        // Fetch models
        $appointmentModel = new AppointmentModel();
        $contactModel = new ContactModel();
        $doctorModel = new DoctorModel();

        // Prepare data for the view
        $data = [
            'upcomingAppointmentsCount' => $appointmentModel->where('patient_id', $patientId)->where('status', 'pending')->countAllResults(),
            'messagesCount' => $contactModel->where('patient_id', $patientId)->countAllResults(),
            'doctorsCount' => $doctorModel->countAllResults(),
            'appointments' => $appointmentModel
                ->select('appointments.*, doctors.name as doctor_name, doctors.specialty')
                ->join('doctors', 'appointments.doctor_id = doctors.id')
                ->where('appointments.patient_id', $patientId)
                ->orderBy('appointments.appointment_date', 'DESC')
                ->limit(3)
                ->findAll(),
        ];

        return view('patient/dashboard', $data);
    }
}
