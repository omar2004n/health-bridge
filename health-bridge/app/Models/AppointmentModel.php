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

      // Get count of appointments for the current month
      public function countMonthlyAppointments()
      {
          return $this->where('MONTH(appointment_date)', date('m'))
                      ->where('YEAR(appointment_date)', date('Y'))
                      ->countAllResults();
      }
      // Get count of appointments for the current day

    public function countTodayAppointments()
    {
        return $this->where('appointment_date', date('Y-m-d'))->countAllResults();
    }

    public function getPatientsPerDay()
    {
        return $this->select("DATE(appointment_date) as date, COUNT(*) as count")
                    ->groupBy("DATE(appointment_date)")
                    ->orderBy("DATE(appointment_date)", "ASC")
                    ->get()
                    ->getResultArray();
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
