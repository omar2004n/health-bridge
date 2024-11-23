<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\DoctorModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class AppointmentController extends Controller
{
    protected $appointmentModel;

    public function __construct()
    {
        $this->appointmentModel = new AppointmentModel();
        helper(['form', 'url']);
        
    }
    

    // Show the booking interface

    public function index()
{
    $session = session();

    // Ensure user is logged in
    if (!$session->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    // Default to today's date unless a specific date is passed as a query parameter
    $appointment_date = $this->request->getGet('date') ?? date('Y-m-d'); 

    $doctor_id = 1; // Example doctor

    // Fetch reserved time slots (HH:mm:ss format)
    $reservedSlots = $this->appointmentModel
        ->select('time_slot')
        ->where('doctor_id', $doctor_id)
        ->where('appointment_date', $appointment_date)
        ->findAll();

    $reservedTimes = array_column($reservedSlots, 'time_slot'); // Extract time slots as array

    $data = [
        'title' => 'Book an Appointment',  // Dynamic title for this page
        'content' => view('patient/booking_appointment', [
            'open_time' => $this->getOpenTime(),
            'close_time' => $this->getCloseTime(),
            'reserved_times' => $reservedTimes, // Reserved time slots
            'doctors' => $this->getDoctorsList(),
            'appointment_date' => $appointment_date, // Pass selected/default date to view
        ])
    ];

    // Return the base layout view with dynamic content
    return view('base_layout', $data);
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
            'time_slot' => 'required|valid_time',
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
        ];

        // Check if the slot is already booked
        if ($this->isSlotBooked($data['doctor_id'], $data['appointment_date'], $data['time_slot'])) {
            return redirect()->back()->with('error', 'The selected time slot is already booked. Please choose another.');
        }

        if ($this->appointmentModel->save($data)) {
            return redirect()->to('/personal-space')->with('success', 'Appointment booked successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to book appointment.');
        }
    }

    // Fetch all doctors
    private function getDoctorsList()
{
    $doctorModel = new DoctorModel();
    return $doctorModel->findAll(); // Fetch all doctors
}

    private function getOpenTime()
    {
        return '08:00'; // Example: 8 AM
    }

    // Fetch close time
    private function getCloseTime()
    {
        return '17:00'; // Example: 5 PM
    }

    // Check if a time slot is booked
    private function isSlotBooked($doctor_id, $appointment_date, $time_slot)
    {
        return $this->appointmentModel->where([
            'doctor_id' => $doctor_id,
            'appointment_date' => $appointment_date,
            'time_slot' => $time_slot,
        ])->countAllResults() > 0;
    }
}
