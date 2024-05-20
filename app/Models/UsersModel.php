<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'email', 'password'];

    // // User details table configuration
    // protected $detailsTable = 'user_details';
    // protected $detailsPrimaryKey = 'id';
    // protected $detailsAllowedFields = ['user_id', 'country', 'state', 'district', 'pincode', 'mobile', 
    // 'local_address', 'permanent_address'];

}


