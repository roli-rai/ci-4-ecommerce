<?php namespace Admin\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        $session = session();
        if ($session->has('id')) {
            $model = new UsersModel();
            // Fetch all users
            $data['users'] = $model->findAll();
            // Load view passing the data
            return view('users_data', $data);
        } else {
            return redirect()->to('/login');
        }
    }



    public function admin_dashboard()
    {
        $session = session();
        if ($session->has('id')) {
                $model = new UsersModel();
                $data['users'] = $model->where('user_type', 'admin')->findAll();
                // Load view passing the data
                return view('admin/admin_dashboard', $data);
        } else {
            return redirect()->to('/login');
        }            
       
    }





}

