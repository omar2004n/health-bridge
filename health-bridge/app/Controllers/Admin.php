<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\AppointmentModel;
use App\Models\DoctorModel;
use App\Models\PatientModel;
use CodeIgniter\Controller;
use Config\App;

class Admin extends BaseController
{

    public function chart() {
        $appointmentModel = new AppointmentModel();

        $dailyPatients = $appointmentModel->getDailyPatientData(); // Implement this method
        $data['chart_labels'] = array_keys($dailyPatients); // Dates or days
        $data['chart_data'] = array_values($dailyPatients); // Patient cou

        return view('admin/chart',$data);
     
    }

    public function appointments(){

    $appointmentModel = new AppointmentModel();
    $appointments = $appointmentModel->getAppointmentsWithDetails();

    return view('admin/appointment', [
        'appointments' => $appointments
    ]);

    }


    //confirm appointements 

    public function confirmAppointment()
    {
        $appointmentId = $this->request->getPost('appointment_id');
        if ($appointmentId) {
            $appointmentModel = new AppointmentModel();
            $appointmentModel->update($appointmentId, ['status' => 'confirmed']);
            return redirect()->to('admin-appointments')->with('message', 'Appointment confirmed successfully.');
        }
        return redirect()->to('admin-appointments')->with('error', 'Failed to confirm the appointment.');
    }

        //cancel Appoitements 

        public function cancelAppointment()
        {
            $appointmentId = $this->request->getPost('appointment_id');
        
            if ($appointmentId) {
                $appointmentModel = new AppointmentModel();
        
                // Update the status of the appointment to canceled
                $updated = $appointmentModel->update($appointmentId, ['status' => 'cancelled']);
        
                if ($updated) {
                    return redirect()->to('/admin-appointments')->with('message', 'Appointment canceled successfully.');
                } else {
                    return redirect()->to('/admin-appointments')->with('error', 'Failed to cancel the appointment.');
                }
            }
        
            return redirect()->to('/admin-appointments')->with('error', 'Appointment ID is missing.');
        }
        


    //fetch doctores in pages doctors 
    public function doctors(){
        
        $model = new DoctorModel();
        $data['doctors'] = $model->findAll();
    
        // Pass the admin data to the view
        return view('admin/doctors',$data);
    }
  

    public function dashboard()
    {
        // Instantiate models
        $appointmentModel = new AppointmentModel();
        $doctorModel = new DoctorModel();
    
        // Fetch key metrics
        $data['today_appointments'] = $appointmentModel->countTodayAppointments();
        $data['total_doctors'] = $doctorModel->countAll();
        $data['month_appointments'] = $appointmentModel->countMonthlyAppointments();
    
        // Fetch patient data for the chart
        $dailyPatients = $appointmentModel->getDailyPatientData(); // Implement this method
        $data['chart_labels'] = array_keys($dailyPatients); // Dates or days
        $data['chart_data'] = array_values($dailyPatients); // Patient counts
    
        // Pass the data to the view
        return view('admin/dashboard', $data);
    }
    

  
    public function updatePatient($id)
    {
        $patientModel = new \App\Models\PatientModel();
    
        // Get the POST data
        $data = [
            'phone'      => $this->request->getPost('phone'),
            'gender'     => $this->request->getPost('gender'),
            'address'    => $this->request->getPost('address'),
            'birth_date' => $this->request->getPost('birth_date'),
        ];
    
        // Log data to debug
        log_message('debug', 'Updating patient with data: ' . json_encode($data));
    
        if ($patientModel->update($id, $data)) {
            $updatedPatient = $patientModel->find($id);
    
            return $this->response->setJSON([
                'success' => true,
                'patient' => $updatedPatient,
            ]);
        } else {
            // Log failure
            log_message('error', 'Failed to update patient with ID: ' . $id);
            return $this->response->setJSON(['success' => false]);
        }
    }
    
}
