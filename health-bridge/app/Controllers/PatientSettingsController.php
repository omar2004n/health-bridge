<?php

namespace App\Controllers;

use App\Models\PatientSettingsModel;
use App\Models\PatientModel;
use CodeIgniter\Controller;

class PatientSettingsController extends Controller
{
    protected $settingsModel;
    protected $patientModel;

    public function __construct()
    {
        $this->settingsModel = new PatientSettingsModel();
        $this->patientModel = new PatientModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = $session->get('userId');
        $role = $session->get('userRole');
        

        if ($role === 'patient') {
            // Fetch patient ID from the patients table
            $patient = $this->patientModel->where('user_id', $userId)->first();

            if (!$patient) {
                return redirect()->to('/dashboard')->with('error', 'Patient not found.');
            }

            $patientId = $patient['id'];

            // Fetch settings or create default
            $settings = $this->settingsModel->where('patient_id', $patientId)->first();
            if (!$settings) {
                $settings = [
                    'patient_id' => $patientId,
                    'notification_preference' => 'email',
                    'theme_preference' => 'light',
                    'language_preference' => 'en',
                ];
                $this->settingsModel->insert($settings);
            }

            return view('patient/settings', ['settings' => $settings]);
        } else {
            // Redirect admin users to a different view
            echo 'role :'.$role;
        }
    }

    public function update()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = $session->get('userId');
        $role = $session->get('role');

        if ($role === 'patient') {
            // Fetch patient ID from the patients table
            $patient = $this->patientModel->where('user_id', $userId)->first();

            if (!$patient) {
                return redirect()->to('/dashboard')->with('error', 'Patient not found.');
            }

            $patientId = $patient['id'];

            $rules = [
                'notification_preference' => 'required|in_list[email,sms,none]',
                'theme_preference' => 'required|in_list[light,dark]',
                'language_preference' => 'required|max_length[50]',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }

            $data = [
                'notification_preference' => $this->request->getPost('notification_preference'),
                'theme_preference' => $this->request->getPost('theme_preference'),
                'language_preference' => $this->request->getPost('language_preference'),
            ];

            $this->settingsModel->where('patient_id', $patientId)->set($data)->update();

            return redirect()->to('/settings')->with('success', 'Settings updated successfully.');
        } else {
            return redirect()->to('/dashboard');
        }
    }
}
