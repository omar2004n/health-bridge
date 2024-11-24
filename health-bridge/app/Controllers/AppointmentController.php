<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\DoctorModel;
use CodeIgniter\Controller;

class AppointmentController extends Controller
{
    protected $appointmentModel;

    public function __construct()
    {
        $this->appointmentModel = new AppointmentModel();
        helper(['form', 'url']);
    }

    // Display the user's appointments
    public function myAppointments()
{
    $session = session();

    if (!$session->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $patient_id = $session->get('userId');

    // Fetch appointments with doctor details
    $appointments = $this->appointmentModel
        ->select('appointments.*, doctors.name as doctor_name, doctors.specialty')
        ->join('doctors', 'doctors.id = appointments.doctor_id')
        ->where('appointments.patient_id', $patient_id)
        ->orderBy('appointments.appointment_date', 'DESC')
        ->findAll();

    // Pass data to the view
    return view('patient/my_appointments', [
        'appointments' => $appointments
    ]);
}


    // Show the booking interface
    public function bookingAppointment()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $appointment_date = $this->request->getGet('date') ?? date('Y-m-d');
        $doctor_id = 1; // Example: Default doctor ID. This could be dynamic.

        // Fetch reserved time slots for the selected date and doctor
        $reservedSlots = $this->appointmentModel
            ->select('time_slot')
            ->where('doctor_id', $doctor_id)
            ->where('appointment_date', $appointment_date)
            ->findAll();

        $reservedTimes = array_column($reservedSlots, 'time_slot');

        $data = [
            'doctors' => $this->getDoctorsList(),
            'open_time' => $this->getOpenTime(),
            'close_time' => $this->getCloseTime(),
            'reserved_times' => $reservedTimes,
            'appointment_date' => $appointment_date
        ];

        return view('patient/booking_appointment', $data);
    }

    // Handle booking submission
    public function book()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $rules = [
            'doctor_id' => 'required|integer',
            'appointment_date' => 'required|valid_date',
            'time_slot' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'patient_id' => $session->get('userId'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'appointment_date' => $this->request->getPost('appointment_date'),
            'time_slot' => $this->request->getPost('time_slot'),
            'status' => 'pending',
            'notes' => $this->request->getPost('notes') ?? null // Optional field
        ];
        

        // Check if the selected time slot is already booked
        if ($this->isSlotBooked($data['doctor_id'], $data['appointment_date'], $data['time_slot'])) {
            return redirect()->back()->with('error', 'The selected time slot is already booked. Please choose another.');
        }

        if ($this->appointmentModel->save($data)) {
            return redirect()->to('/my_appointments')->with('success', 'Appointment booked successfully. Your appointment on '.$data['appointment_date'].' at '.$data['time_slot'].' needs to be confirmed by the admins.');
        } else {
            return redirect()->back()->with('error', 'Failed to book appointment.');
        }
    }

    // Fetch all doctors
    private function getDoctorsList()
    {
        $doctorModel = new DoctorModel();
        return $doctorModel->findAll();
    }

    // Get opening time
    private function getOpenTime()
    {
        return '08:00'; // Example: 8 AM
    }

    // Get closing time
    private function getCloseTime()
    {
        return '17:00'; // Example: 5 PM
    }

    // Check if a time slot is already booked
    private function isSlotBooked($doctor_id, $appointment_date, $time_slot)
    {
        return $this->appointmentModel->where([
            'doctor_id' => $doctor_id,
            'appointment_date' => $appointment_date,
            'time_slot' => $time_slot
        ])->countAllResults() > 0;
    }
}
