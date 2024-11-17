<?php

namespace App\Models;

use CodeIgniter\Model;

class AvailabilityModel extends Model
{
    protected $table = 'availability';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'doctor_id',
        'available_date',
        'start_time',
        'end_time',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true; // Enable automatic handling of created_at and updated_at

    /**
     * Get availability for a specific doctor.
     *
     * @param int $doctorId
     * @return array
     */
    public function getAvailabilityByDoctor($doctorId)
    {
        return $this->where('doctor_id', $doctorId)->findAll();
    }

    /**
     * Check if a specific date and time slot is available for a doctor.
     *
     * @param int $doctorId
     * @param string $date
     * @param string $startTime
     * @param string $endTime
     * @return bool
     */
    public function isSlotAvailable($doctorId, $date, $startTime, $endTime)
    {
        return !$this->where('doctor_id', $doctorId)
                     ->where('available_date', $date)
                     ->where('start_time <=', $startTime)
                     ->where('end_time >=', $endTime)
                     ->first();
    }
}
