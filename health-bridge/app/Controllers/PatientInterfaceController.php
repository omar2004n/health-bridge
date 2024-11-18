<?php

namespace App\Controllers;

class PatientInterfaceController extends BaseController
{
    public function index()
    {
        return view('patient/patient_interface');
    }
}
