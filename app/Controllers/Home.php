<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $session = session();
        if ($session->has('id')) {
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
            'name' => 'required|min_length[3]|max_length[20]',
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
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' =>$this->request->getVar('password') // Hash the password before saving
            ];
            $model->insert($data);
            echo "<h1>Registration successful..... </h1>";
            return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
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
                    $session->set('id', $result['id']);
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
        if (!$session->has('id')) {
            return redirect()->to('/login');
        }
        $model= new UsersModel();
        $data['user'] = $model->find($session->get('id'));
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
        $model->where('id', $id)->delete();
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
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];
        $model->update($id, $updatedData);
        return redirect()->to(base_url());
    }
    
    // public function encryption()
    // {
    //     $encrypter = \Config\Services::encrypter();
    //     $k = $encrypter->encrypt('roli');
    //     echo "encrypt: " . $k . "<br>";
    //     echo $encrypter->decrypt($k);
    // }

    public function users_data()
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


    // // upload image
    // public function upload()
    // {
    //     $session = session();
    //     if ($session->has('id')) {
    //        // helper(['form', 'url']);

    //         $validationRule = [
    //             'userfile' => [
    //                 'label' => 'Image file',
    //                 'rules' => 'uploaded[userfile]|max_size[userfile,1024]|is_image[userfile]',
    //                 'errors' => [
    //                     'uploaded' => 'You must select an image to upload.',
    //                     'max_size' => 'The file size exceeds the maximum allowed limit (1MB).',
    //                     'is_image' => 'The file you selected is not a valid image file.',
    //                 ],
    //             ],
    //         ];

    //         if ($this->validate($validationRule)) {
    //             $file = $this->request->getFile('userfile');
    //             $newName = $file->getRandomName();
    //             $file->move(WRITEPATH . 'uploads/images', $newName);

    //             // Further processing if needed
    //             echo "successfully uploaded image";
    //            // return redirect()->to(base_url());
    //         } else {
    //             $data['validation'] = $this->validator;
    //             return view('upload', $data);
    //         }
    //     } else {
    //         return redirect()->to('/login');
    //     }
    // }
    // //upload vedio
    // public function uploadvideo()
    // {
    //     $session = session();
    //     if ($session->has('id')) {
    //         $validationRule = [
    //             'userfile' => [
    //                 'label' => 'video file',
    //                 'rules' => 'uploaded[userfile]|max_size[userfile,10240]|ext_in[userfile,mp4,avi,mov,wmv,flv]',
    //                 'errors' => [
    //                     'uploaded' => 'You must select a video to upload.',
    //                     'max_size' => 'The file size exceeds the maximum allowed limit (10MB).',
    //                     'ext_in' => 'The file you selected is not a valid video file.',
    //                 ],
    //             ],
    //         ];
    
    //         if ($this->validate($validationRule)) {
    //             $file = $this->request->getFile('userfile');
    //             $newName = $file->getRandomName();
    //             $file->move(WRITEPATH . 'uploads/videos', $newName);
    
    //             // Further processing if needed
    //             echo "successfully uploaded video";
    //         } else {
    //             $data['validation'] = $this->validator;
    //             return view('upload', $data);
    //         }
    //     } else {
    //         return redirect()->to('/login');
    //     }
    // }
    
    public function upload()
    {
        $session = session();
        if ($session->has('id')) {
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
    

    public function profileUpdate()
    {
        $session = session();
        if ($session->has('id')) {
            $rules = [
                'name' => 'required|min_length[3]|max_length[255]',
                'email' => 'required|valid_email',
            ];
    
            if ($this->validate($rules)) {
                $model = new UsersModel();
    
                $data = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                ];
    
                // Assuming you have a session variable for user ID
                $userId = session()->get('id');
    
                if ($model->update($userId, $data)) {
                    // Update successful
                    return redirect()->to('/profile')->with('success', 'Profile updated successfully');
                } else {
                    // Update failed
                    return redirect()->back()->withInput()->with('error', 'Failed to update profile');
                }
            } else {
                // Validation failed, show errors
                $validation = $this->validator;
                return view('profile_update', ['validation' => $validation]);
            }
        } else {
            return redirect()->to('/login');
        }
    }
    

    public function profile(){
        $session = session();
        if (!$session->has('id')) {
            return redirect()->to('/login');
        }
        $model= new UsersModel();
        $data['user'] = $model->find($session->get('id'));
        return view('profile', $data);
    }


    public function change_password()
    {
        $session = session();
        if (!$session->has('id')) {
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
            $userId = $session->get('id');
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
        if (!$session->has('id')) {
            return redirect()->to('/login');
        }
        $model= new UsersModel();
        $data['user'] = $model->find($session->get('id'));
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
    
    
}