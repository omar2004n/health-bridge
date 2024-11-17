<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorModel extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'specialty',
        'email',
        'phone_number',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true; // Enable automatic handling of created_at and updated_at

    /**
     * Get a doctor by their specialty.
     *
     * @param string $specialty
     * @return array
     */
    public function getDoctorsBySpecialty($specialty)
    {
        return $this->where('specialty', $specialty)->findAll();
    }
}
