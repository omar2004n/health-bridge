<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Simulate some data for the dashboard
        $data = [
            'upcomingAppointments' => 2,
            'medicalRecords' => 12,
            'activePrescriptions' => 3,
            'healthStatus' => 'Stable'
        ];

        return view('patient/dashboard', $data);
    }
}
