<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\PatientModel;
use App\Models\DoctorModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class ContactController extends Controller
{
    protected $contactModel;
    protected $patientModel;
    protected $doctorModel;
    protected $userModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
        $this->patientModel = new PatientModel();
        $this->doctorModel = new DoctorModel();
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Fetch contacts for doctors from the `doctors` table
        $doctors = $this->doctorModel->findAll();

        // Fetch admins from the `users` table
        $admins = $this->userModel->where('role', 'admin')->findAll();

        return view('patient/contacts', [
            'doctors' => $doctors,
            'admins' => $admins,
        ]);
    }

    public function submit()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $rules = [
            'message' => 'required|max_length[1000]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $patientId = $this->patientModel
            ->where('user_id', $session->get('userId'))
            ->first()['id'];

        $data = [
            'patient_id' => $patientId,
            'message' => $this->request->getPost('message'),
        ];

        $this->contactModel->insert($data);

        return redirect()->to('/contacts')->with('success', 'Your message has been sent successfully.');
    }
}
