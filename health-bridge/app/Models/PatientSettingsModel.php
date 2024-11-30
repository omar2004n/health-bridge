<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientSettingsModel extends Model
{
    protected $table = 'patient_settings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'notification_preference', 'theme_preference', 'language_preference', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
