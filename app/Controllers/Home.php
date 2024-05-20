<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $session = session();
        if ($session->has('user_id')) {
            $model = new UsersModel();
            // Fetch all users
            $data['users'] = $model->findAll();
            // Load view passing the data
            return view('home', $data);
        } else {
            return redirect()->to('/login');
        }
    }



    public function registration()
    {
        helper(['form']);

        // Load validation library
        $validation = \Config\Services::validation();

        // Validate the inputs
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[3]|max_length[255]',
            'confirm_password' => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            // If validation fails, retrieve and display validation errors
            return view('registration', ['validation' => $validation]);
        } else {
            // Validation passed, proceed with registration logic
            $model = new UsersModel();

            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' =>$this->request->getVar('password'), PASSWORD_DEFAULT // Hash the password before saving
            ];
            $model->insert($data);

            // Prepare success message
            $success_message = 'Registration successful. Please login.';

            // Return the registration view with success message
            return view('registration', ['success_message' => $success_message]);
        }
    }


    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required'
            ];
            if (!$this->validate($rules)) {
                // If validation fails, return to login page with errors
                return view('login', ['validation' => $this->validator]);
            } else {
                $model = new UsersModel();
                $result = $model->where('email', $this->request->getVar('email'))
                                ->where('password', $this->request->getVar('password'))
                                ->first();
                $session = session();
                if ($result) {
                    $session->set('user_id', $result['user_id']);
                    return redirect()->to('/dashboard');
                } else {
                    $session->setFlashdata('msg', 'Invalid email or password');
                    return redirect()->to('/login');
                }
            }
        }
        return view('login');
    }


   
    public function dashboard()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login');
        }
        $model= new UsersModel();
        $data['user'] = $model->find($session->get('user_id'));
        return view('dashboard', $data);
    }

    
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function delete($id) {
        $model = new UsersModel();
        $model->where('user_id', $id)->delete();
        return redirect()->to(base_url());
    }

    public function edit($id)
    {
        $model = new UsersModel();
        $data['user'] = $model->find($id);
        return view('edit', $data);
    }
    
    public function update($id)
    {
        $model = new UsersModel();
        $updatedData = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];
        $model->update($id, $updatedData);
        return redirect()->to(base_url());
    }
    

   
    public function users_data()
    {
        $session = session();
        if ($session->has('user_id')) {
            $model = new UsersModel();
            // Fetch all users with user_type 'user'
            $data['users'] = $model->where('user_type', 'user')->findAll();
            // Load view passing the data
            return view('users_data', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function admin_dashboard()
    {
        $session = session();
        if ($session->has('user_id')) {
                $model = new UsersModel();
                $data['users'] = $model->where('user_type', 'admin')->findAll();
                // Load view passing the data
                return view('admin/admin_dashboard', $data);
        } else {
            return redirect()->to('/login');
        }            
       
    }

    
    public function upload()
    {
        $session = session();
        if ($session->has('user_id')) {
           // helper(['form', 'url']);

            $validationRule = [
                'userfile' => [
                    'label' => 'Image file',
                    'rules' => 'uploaded[userfile]|max_size[userfile,1024]|is_image[userfile]',
                    'errors' => [
                        'uploaded' => 'You must select an image to upload.',
                        'max_size' => 'The file size exceeds the maximum allowed limit (1MB).',
                        'is_image' => 'The file you selected is not a valid image file.',
                    ],
                ],
            ];

            if ($this->validate($validationRule)) {
                $file = $this->request->getFile('userfile');
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/images', $newName);
            } else {
                $data['validation'] = $this->validator;
                return view('upload', $data);
            }
           echo "successfully uploaded image<br>";

            $validationRuleVideo = [
                'videofile' => [
                    'label' => 'video file',
                    'rules' => 'uploaded[videofile]|max_size[videofile,10240]|ext_in[videofile,mp4,avi,mov,wmv,flv]',
                    'errors' => [
                        'uploaded' => 'You must select a video to upload.',
                        'max_size' => 'The file size exceeds the maximum allowed limit (110MB).',
                        'ext_in' => 'The file you selected is not a valid video file.',
                    ],
                ],
            ];
    
            if ($this->validate($validationRuleVideo)) {
                $videofile = $this->request->getFile('videofile');
                $newName = $videofile->getRandomName();
                $videofile->move(WRITEPATH . 'uploads/videos', $newName);
    
                // Further processing if needed
               // echo "successfully uploaded video";
            } else {
                $data['validation'] = $this->validator;
                return view('upload', $data);
            }
            echo "successfully uploaded video";

        } else {
            return redirect()->to('/login');
        }
    }
    

    // public function profileUpdate()
    // {
    //     $session = session();
    //     if ($session->has('user_id')) {
    //         $rules = [
    //             'username' => 'required|min_length[3]|max_length[255]',
    //             'email' => 'required|valid_email',
    //         ];
    
    //         if ($this->validate($rules)) {
    //             $model = new UsersModel();
    
    //             $data = [
    //                 'username' => $this->request->getPost('username'),
    //                 'email' => $this->request->getPost('email'),
    //             ];
    
    //             // Assuming you have a session variable for user ID
    //             $userId = session()->get('user_id');
    
    //             if ($model->update($userId, $data)) {
    //                 // Update successful
    //                 return redirect()->to('/profile')->with('success', 'Profile updated successfully');
    //             } else {
    //                 // Update failed
    //                 return redirect()->back()->withInput()->with('error', 'Failed to update profile');
    //             }
    //         } else {
    //             // Validation failed, show errors
    //             $validation = $this->validator;
    //             return view('profile_update', ['validation' => $validation]);
    //         }
    //     } else {
    //         return redirect()->to('/login');
    //     }
    // }
    
    public function profile(){
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login');
        }
        $model= new UsersModel();
        $data['user'] = $model->find($session->get('user_id'));
        $userDetailsModel = new \App\Models\UserDetailsModel();
        $data['details'] = $userDetailsModel->find($session->get('user_id'));
        // Fetch user details
       // $user = $userDetailsModel->where('user_id', $user_id)->first();
        
        return view('profile', $data);
    }

    public function change_password()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login');
        }
    
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'new_password' => 'required|min_length[3]|max_length[255]',
                'confirm_password' => 'required|matches[new_password]',
            ];
    
            if (!$this->validate($rules)) {
                // Validation failed, show errors
                return redirect()->to(base_url('change_password'))->with('validation', $this->validator);
            }
    
            $model = new UsersModel();
            $userId = $session->get('user_id');
           // $newPassword = $this->request->getPost('new_password');
            $data = [
                'password'=>$this->request->getVar('new_password')
            ];
    
            if ($model->update($userId, $data)) {
                return redirect()->to(base_url('profile'))->with('success', 'Password changed successfully');
            } else {
                return redirect()->to(base_url('change_password'))->with('error', 'Failed to change password');
            }
        }
    
        return view('change_password');
    }

    public function about_us(){
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login');
        }
        $model= new UsersModel();
        $data['user'] = $model->find($session->get('user_id'));
        return view('about_us', $data);
    }
    
    public function contact(){
        $session = session();
        if (!$session->has('id')) {
            return redirect()->to('/login');
        }
        $model= new UsersModel();
        $data['user'] = $model->find($session->get('id'));
        return view('contact', $data);
    }
    
    // public function profile_update()
    // {
    //   //  helper(['form', 'url']);
    //     $session = session();

    //     if ($this->request->getMethod() === 'post') {
    //         // Validation rules
    //         $rules = [

    //             'country' => 'required',
    //             'state' => 'required',
    //             'district' => 'required',
    //             'pincode' => 'required|numeric',
    //             'mobile' => 'required|numeric',
    //             'local_address' => 'required',
    //             'permanent_address' => 'required',
    //         ];

    //         if (!$this->validate($rules)) {
    //             return view('profile_update', ['validation' => $this->validator]);
    //         } else {
    //             $usersModel = new UsersModel();
                                
    //             $data = [
    //                 'user_id' => $session->get('user_id'),
    //                // 'username' => $this->request->getPost('username'),
    //                // 'email' => $this->request->getPost('email'),
    //                 'country' => $this->request->getVar('country'),
    //                 'state' => $this->request->getVar('state'),
    //                 'district' => $this->request->getVar('district'),
    //                 'pincode' => $this->request->getVar('pincode'),
    //                 'mobile' => $this->request->getVar('mobile'),
    //                 'local_address' => $this->request->getVar('local_address'),
    //                 'permanent_address' => $this->request->getVar('permanent_address'),
    //             ];

    //             $usersModel->update($session->get('user_id'), $data);
    //             $session->setFlashdata('msg', 'Profile updated successfully');
    //             return redirect()->to('/profile');
    //         }
    //     }

    //     return view('profile_update');
    // }


    





    // public function profile_update()
    // {
    //     $session = session();
    //     $user_id = $session->get('user_id');
        
    //     // Load models
    //     $userDetailsModel = new \App\Models\UserDetailsModel();
        
    //     // Fetch user details
    //     $user = $userDetailsModel->where('user_id', $user_id)->first();
        
    //     if ($this->request->getMethod() === 'post') {
    //         // Validation rules
    //         $rules = [
    //             'country' => 'required',
    //             'state' => 'required',
    //             'district' => 'required',
    //             'pincode' => 'required|numeric',
    //             'mobile' => 'required|numeric',
    //             'local_address' => 'required',
    //             'permanent_address' => 'required',
    //         ];

    //         if (!$this->validate($rules)) {
    //             $data['validation'] = $this->validator;
    //         } else {
    //             // Data for user_details table
    //             $detailsData = [
    //                 'user_id' => $user_id,
    //                 'country' => $this->request->getVar('country'),
    //                 'state' => $this->request->getVar('state'),
    //                 'district' => $this->request->getVar('district'),
    //                 'pincode' => $this->request->getVar('pincode'),
    //                 'mobile' => $this->request->getVar('mobile'),
    //                 'local_address' => $this->request->getVar('local_address'),
    //                 'permanent_address' => $this->request->getVar('permanent_address'),
    //             ];

    //             // Update user details data
    //             if ($userDetailsModel->insert($user_id, $detailsData)) {
    //                 $session->setFlashdata('msg', 'Profile updated successfully');
    //                print_r($detailsData);
    //                // return redirect()->to('/profile');
    //             } else {
    //                 $data['errors'] = $userDetailsModel->errors();
    //             }
    //         }
    //     }

    //     $data['user'] = $user;
        
    //     return view('profile_update', $data);
    // }


    // public function profile_update()
    // {
    //     $session = session();
    //     $user_id = $session->get('user_id');
        
    //     // Load models
    //     $userDetailsModel = new \App\Models\UserDetailsModel();
        
    //     // Fetch user details
    //     $user = $userDetailsModel->where('user_id', $user_id)->first();
        
    //     if ($this->request->getMethod() === 'post') {
    //         // Validation rules
    //         $rules = [
    //             'country' => 'required',
    //             'state' => 'required',
    //             'district' => 'required',
    //             'pincode' => 'required|numeric',
    //             'mobile' => 'required|numeric',
    //             'local_address' => 'required',
    //             'permanent_address' => 'required',
    //         ];
    
    //         if (!$this->validate($rules)) {
    //             $data['validation'] = $this->validator;
    //         } else {
    //             // Data for user_details table
    //             $detailsData = [
    //                 'user_id' => $user_id,
    //                 'country' => $this->request->getVar('country'),
    //                 'state' => $this->request->getVar('state'),
    //                 'district' => $this->request->getVar('district'),
    //                 'pincode' => $this->request->getVar('pincode'),
    //                 'mobile' => $this->request->getVar('mobile'),
    //                 'local_address' => $this->request->getVar('local_address'),
    //                 'permanent_address' => $this->request->getVar('permanent_address'),
    //             ];


    //             // $userDetailsModel->insert($detailsData);
    //             // $userDetailsModel->update($detailsData);
    //             $data['user'] = $user;

    //             if ( is_null($user)){
    //                 $userDetailsModel->update($detailsData);
    //             }else{
    //                 $userDetailsModel->insert($detailsData);

    //             }
    //             // Update user details data
    //             // if ($userDetailsModel->where('user_id', $user_id)->set($detailsData)->update()) {
    //             //     $session->setFlashdata('msg', 'Profile updated successfully');
    //             //   // echo "Profile updated successfully";
    //             //     // return redirect()->to('/profile');
    //             // } else {
    //             //     $data['errors'] = $userDetailsModel->errors();
    //             // }
    //         }
    //     }
    
    //     // $data['user'] = $user;
        
    //     return view('profile_update', $data);
    // }
    

    public function profile_update()
{
    $session = session();
    $user_id = $session->get('user_id');
    
    // Load models
    $userDetailsModel = new \App\Models\UserDetailsModel();
    
    // Fetch user details
    $user = $userDetailsModel->where('user_id', $user_id)->first();
    
    if ($this->request->getMethod() === 'post') {
        // Validation rules
        $rules = [
            'country' => 'required',
            'state' => 'required',
            'district' => 'required',
            'pincode' => 'required|numeric',
            'mobile' => 'required|numeric',
            'local_address' => 'required',
            'permanent_address' => 'required',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {
            // Data for user_details table
            $detailsData = [
                'user_id' => $user_id,
                'country' => $this->request->getVar('country'),
                'state' => $this->request->getVar('state'),
                'district' => $this->request->getVar('district'),
                'pincode' => $this->request->getVar('pincode'),
                'mobile' => $this->request->getVar('mobile'),
                'local_address' => $this->request->getVar('local_address'),
                'permanent_address' => $this->request->getVar('permanent_address'),
            ];

            // Check if user exists and update or insert accordingly
            if ($user) {
                // Update existing user details
                if ($userDetailsModel->where('user_id', $user_id)->set($detailsData)->update()) {
                    $session->setFlashdata('msg', 'Profile updated successfully');
                    return redirect()->to('/profile');
                } else {
                    $data['errors'] = $userDetailsModel->errors();
                }
            } else {
                // Insert new user details
                if ($userDetailsModel->insert($detailsData)) {
                    $session->setFlashdata('msg', 'Profile created successfully');
                    return redirect()->to('/profile');
                } else {
                    $data['errors'] = $userDetailsModel->errors();
                }
            }
        }
    }

    $data['user'] = $user;
    
    return view('profile_update', $data);
}

    
}