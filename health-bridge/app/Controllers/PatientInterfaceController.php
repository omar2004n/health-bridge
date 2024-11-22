<?php

namespace App\Controllers;

class PatientInterfaceController extends BaseController
{
    public function index()
    {
        $session=session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        return view('patient/patient_interface');
    }
}
