<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PatientModel; // Ensure this model is created
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function register()
    {
        return view('auth/register'); // Load the signup view
    }

    public function store()
    {
        $session = session();
        $userModel = new UserModel();
        $patientModel = new PatientModel();

        // Validation rules for signup
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
            'phone' => 'permit_empty|max_length[20]',
            'gender' => 'permit_empty|in_list[male,female,other]',
            'address' => 'permit_empty|max_length[255]',
            'birth_date' => 'permit_empty|valid_date'
        ];

        if ($this->validate($rules)) {
            // Insert basic user info into users table
            $userData = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => 'patient' // Assuming role is patient
            ];

            $userModel->insert($userData);
            $userId = $userModel->insertID();

            // Insert additional patient info into patients table
            $patientData = [
                'user_id' => $userId,
                'phone' => $this->request->getVar('phone'),
                'gender' => $this->request->getVar('gender'),
                'address' => $this->request->getVar('address'),
                'birth_date' => $this->request->getVar('birth_date')
            ];

            $patientModel->insert($patientData);

            $session->setFlashdata('success', 'Registration successful! Please login.');
            return redirect()->to('/login');
        } else {
            $session->setFlashdata('validation', $this->validator);
            return redirect()->to('/register')->withInput();
        }
    }

    public function login()
    {
        return view('auth/login'); // Load the login view
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel();

        // Validation rules
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if ($this->validate($rules)) {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            // Check if user exists
            $user = $model->where('email', $email)->first();

            if ($user) {
                // Verify password
                if (password_verify($password, $user['password'])) {
                    $session->set('isLoggedIn', true);
                    $session->set('userId', $user['id']);
                    return redirect()->to('/'); // Redirect to root path
                } else {
                    // Incorrect password
                    $session->setFlashdata('msg', 'Incorrect Password');
                }
            } else {
                // User not found
                $session->setFlashdata('msg', 'Email not found');
            }
        } else {
            // Validation failed
            $session->setFlashdata('msg', 'Validation failed');
        }

        // Redirect back to login
        return redirect()->to('/login'); 
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login'); // Redirect to login page after logout
    }
}
