<?php

namespace App\Controllers;

use App\Models\DoctorModel;

class DoctorController extends BaseController
{
    protected $doctorModel;

    public function __construct()
    {
        $this->doctorModel = new DoctorModel();
    }

    // Handle update doctor logic
    public function update()
{
    $id = $this->request->getPost('id');
    $doctor = $this->doctorModel->find($id);

    if (!$doctor) {
        return redirect()->to('/admin-doctors')->with('error', 'Doctor not found.');
    }

    $this->doctorModel->update($id, [
        'name' => $this->request->getPost('name'),
        'specialty' => $this->request->getPost('specialty'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone')
    ]);

    return redirect()->to('/admin-doctors')->with('success', 'Doctor updated successfully.');
}


    // Handle delete doctor logic
    public function delete($id)
    {
        $doctor = $this->doctorModel->find($id);

        if (!$doctor) {
            return redirect()->to('/admin-doctors')->with('error', 'Doctor not found.');
        }

        $this->doctorModel->delete($id);

        return redirect()->to('/admin-doctors')->with('success', 'Doctor deleted successfully.');
    }
}
