<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'phone', 'gender', 'address', 'birth_date'];

    // Optionally enable soft deletes
    protected $useSoftDeletes = false;

    /**
     * Get all patients with their user details (name).
     *
     * @return array
     */
    public function getPatientsWithUserDetails()
    {
        return $this->select('patients.id, patients.phone, patients.gender, patients.address, patients.birth_date, users.name')
            ->join('users', 'users.id = patients.user_id')
            ->findAll();
    }
}
