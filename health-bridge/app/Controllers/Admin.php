<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;
use Config\App;

class Admin extends Controller
{




    public function dashboard(){
    
        // Pass the admin data to the view
        return view('admin/dashboard');
    }

//     public function save()
//     {
//         // Get the data from the POST request
//         $username = $this->request->getPost('username');
//         $email = $this->request->getPost('email');
//         $datenaissance = $this->request->getPost('datenaissance');
//         $city = $this->request->getPost('city');
//         $gender = $this->request->getPost('gender');
//         $specialisation = $this->request->getPost('specialisation');
//         $qualification = $this->request->getPost('qualification');
//         $experience = $this->request->getPost('experience');
//         $password = $this->request->getPost('password');
//         $confpassword = $this->request->getPost('confpassword');

//         // Validate the form data (basic validation)
//         if ($password !== $confpassword) {
//             return redirect()->back()->with('fail', 'Password and confirm password do not match.');
//         }

//         // Hash the password before storing it
//         // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

//         // Prepare the data to be saved in the database
//         $data = [
//             'username' => $username,
//             'email' => $email,
//             'datenaissance' => $datenaissance,
//             'city' => $city,
//             'gender' => $gender,
//             'specialisation' => $specialisation,
//             'qualification' => $qualification,
//             'experience' => $experience,
//             'password' => $password,
//         ];

//         // Load the UserModel to interact with the database
//         $adminModel = new AdminModel();

//         // Insert the data into the users table
//         if ($adminModel->insert($data)) {
//             return redirect()->to('/Adminregister')->with('success', 'You are now registered successfully.');
//         } else {
//             return redirect()->back()->with('fail', 'Something went wrong. Please try again.');
//         }
//     }

//    // Process the login form submission
//    public function check()
//    {
//        // Validate the login form
//        $validation = $this->validate([
//            'email' => [
//                'rules' => 'required|valid_email|is_not_unique[admin.email]',
//                'errors' => [
//                    'required' => 'Email is required.',
//                    'valid_email' => 'Please enter a valid email address.',
//                    'is_not_unique' => 'This email is not registered in our system.',
//                ],
//            ],
//            'password' => [
//                'rules' => 'required|min_length[5]',
//                'errors' => [
//                    'required' => 'Password is required.',
//                    'min_length' => 'Password must be at least 5 characters long.',
//                ],
//            ]
//        ]);

//        // If validation fails, return back with validation errors
//        if (!$validation) {
//            return view('admin/login', ['validation' => $this->validator]);
//        }

//        // Retrieve email and password from form
//        $email = $this->request->getPost('email');
//        $password = $this->request->getPost('password');

//        // Load the model to check user credentials
//        $usermodel = new \App\Models\AdminModel();
//        $user = $usermodel->where('email', $email)->first();

//        // If user exists and password matches
//        if ($user && $user['password'] == $password) {
//            // Successful login, set session data
//            session()->set([
//                'user_id' => $user['id'],
//                'email' => $user['email'],
//                'logged_in' => true,
//            ]);

//            return redirect()->to('/Admindashboard');  // Redirect to dashboard
//        } else {
//            // Invalid credentials
//            session()->setFlashdata('error', 'Invalid email or password');
//            return redirect()->to('/Adminlogin');
//        }
//    }
}
