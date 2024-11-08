<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Ensure this matches your database table name
    protected $primaryKey = 'id'; // This should match your primary key
    protected $allowedFields = [
        'name', 'email', 'password', 'phone', 'gender', 'address', 'birth_date']; // Ensure these fields exist in your table

    // Optionally, you can add a method to check for user existence
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
