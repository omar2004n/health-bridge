<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PatientModel;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    protected $userModel;
    protected $patientModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->patientModel = new PatientModel();
        helper(['form', 'url']);
    }

    // Display the user profile
    public function index()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = $session->get('userId');

        // Fetch user and patient data
        $userData = $this->userModel->find($userId);
        $patientData = $this->patientModel->where('user_id', $userId)->first();

        if (!$userData) {
            return redirect()->to('/dashboard')->with('error', 'User not found.');
        }

        return view('patient/profile', [
            'user' => $userData,
            'patient' => $patientData
        ]);
    }

    // Update profile information
    public function update()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = $session->get('userId');

        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'phone' => 'required|regex_match[/^[0-9]{10,15}$/]',
            'address' => 'max_length[255]',
            'birth_date' => 'valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Update user table
        $userUpdateData = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        // Update patient table
        $patientUpdateData = [
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'birth_date' => $this->request->getPost('birth_date'),
        ];

        $this->userModel->update($userId, $userUpdateData);
        $this->patientModel->where('user_id', $userId)->set($patientUpdateData)->update();

        return redirect()->to('/profile')->with('success', 'Profile updated successfully.');
    }
}
