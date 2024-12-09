<?php

namespace App\Controllers;

use App\Models\PatientModel;
use App\Models\UserModel;

class PatientController extends BaseController
{
    protected $patientModel;
    protected $userModel;

    public function __construct()
    {
        $this->patientModel = new PatientModel();
        $this->userModel = new UserModel();
    }

    // Display all patients
    public function index()
    {
        $data['patients'] = $this->patientModel->getPatientsWithUserDetails();
        return view('admin/patients', $data);
    }

    // Add a new patient
    public function add()
    {
        if ($this->request->getMethod() === 'post') {
            $validation = $this->validate([
                'name' => 'required|max_length[100]',
                'phone' => 'required|numeric',
                'gender' => 'required|in_list[Male,Female]',
                'address' => 'required',
                'birth_date' => 'required|valid_date',
            ]);

            if (!$validation) {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }

            // Insert the user
            $userId = $this->userModel->insert([
                'name' => $this->request->getPost('name'),
                'email' => null,
                'password' => null,
                'role' => 'Patient'
            ], true);

            // Insert the patient
            $this->patientModel->insert([
                'user_id' => $userId,
                'phone' => $this->request->getPost('phone'),
                'gender' => $this->request->getPost('gender'),
                'address' => $this->request->getPost('address'),
                'birth_date' => $this->request->getPost('birth_date'),
            ]);

            return redirect()->to('/admin-patients')->with('success', 'Patient added successfully.');
        }
    }

    public function update($id)
    {
        log_message('info', "Update method called for Patient ID: $id");
    
        // Fetch the patient to verify existence
        $patient = $this->patientModel->find($id);
        if (!$patient) {
            log_message('error', "Patient with ID $id not found.");
            return redirect()->to('/admin-patients')->with('error', 'Patient not found.');
        }
    
        log_message('info', "Patient data before update: " . json_encode($patient));
    
        // Validate input
        $validation = $this->validate([
            'name' => 'required|max_length[100]',
            'phone' => 'required|numeric',
            'gender' => 'required|in_list[Male,Female]',
            'address' => 'required',
            'birth_date' => 'required|valid_date',
        ]);
    
        if (!$validation) {
            log_message('error', "Validation failed: " . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
    
        // Update the `users` table for the name
        $userId = $patient['user_id'];
        $nameUpdate = $this->userModel->update($userId, [
            'name' => $this->request->getPost('name'),
        ]);
    
        if (!$nameUpdate) {
            log_message('error', "Failed to update user name for User ID: $userId. Errors: " . json_encode($this->userModel->errors()));
        } else {
            log_message('info', "User name updated successfully for User ID: $userId.");
        }
    
        // Update the `patients` table
        $patientUpdate = $this->patientModel->update($id, [
            'phone' => $this->request->getPost('phone'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
            'birth_date' => $this->request->getPost('birth_date'),
        ]);
    
        if (!$patientUpdate) {
            log_message('error', "Failed to update patient details for Patient ID: $id. Errors: " . json_encode($this->patientModel->errors()));
        } else {
            log_message('info', "Patient details updated successfully for Patient ID: $id.");
        }
    
        return redirect()->to('/admin-patients')->with('success', 'Patient updated successfully.');
    }
    
    
    

    // Delete a patient
    public function delete($id)
    {
        $patient = $this->patientModel->find($id);
        if (!$patient) {
            return redirect()->to('/admin-patients')->with('error', 'Patient not found.');
        }

        $this->patientModel->delete($id);
        $this->userModel->delete($patient['user_id']);

        return redirect()->to('/admin-patients')->with('success', 'Patient deleted successfully.');
    }
}
