<?php

namespace App\Controllers;

class PatientInterfaceController extends BaseController
{
    
    public function index()
    {
        $data['title'] = 'Dashboard'; // Optional dynamic title
        $data['content'] = view('patient/dashboard'); // Pass the dynamic view content

        $session=session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        return view('patient/base_layout', $data);
    }
}
