<?php namespace App\Models;

use CodeIgniter\Model;

class UserDetailsModel extends Model
{
    protected $table = 'user_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'username', 'email', 'country', 'state', 'district', 'pincode',
     'mobile', 'local_address', 'permanent_address'];
}
