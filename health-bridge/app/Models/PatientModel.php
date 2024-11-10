<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'phone', 'gender', 'address', 'birth_date'];

    // Disable automatic timestamps, as patients might not need them
    protected $useTimestamps = false;
}
