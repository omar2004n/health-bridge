<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'doctor_id',
        'patient_id',
        'appointment_date',
        'time_slot',
        'status',
        'notes',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true; // Enable automatic handling of created_at and updated_at

    /**
     * Get appointments for a specific doctor.
     *
     * @param int $doctorId
     * @return array
     */
    public function getAppointmentsByDoctor($doctorId)
    {
        return $this->where('doctor_id', $doctorId)->findAll();
    }

    /**
     * Get appointments for a specific patient.
     *
     * @param int $patientId
     * @return array
     */
    public function getAppointmentsByPatient($patientId)
    {
        return $this->where('patient_id', $patientId)->findAll();
    }

    /**
     * Check if a specific time slot is available for a doctor.
     *
     * @param int $doctorId
     * @param string $date
     * @param string $time
     * @return bool
     */
    public function isTimeSlotAvailable($doctorId, $date, $time)
    {
        return !$this->where([
            'doctor_id' => $doctorId,
            'appointment_date' => $date,
            'appointment_time' => $time
        ])->first();
    }
}
