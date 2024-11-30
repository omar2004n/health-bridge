<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'message', 'created_at'];
    protected $useTimestamps = true;
}
