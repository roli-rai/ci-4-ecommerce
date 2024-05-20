<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce ci4 Project</title>
    <style>
        body {
            background-color: #F6E3FC;
        }
        nav {
            background-color: #0AFCD7;
        }
    </style>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><strong class="text-primary">CI4 ECOMMERCE</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php if (session()->has('user_id')) : ?>
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>" title="Home"><i class="fas fa-home"></i> Home</a>
                    </li>
                <?php endif; ?>

                <?php if (session()->has('user_id')) : ?>
                <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('products'); ?>" title="products"><i class="fas fa-box-open"></i>  Products</a>
                    </li>
                <?php endif; ?>

                <?php if (!session()->has('user_id')) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('login'); ?>" title="Login"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('registration'); ?>" title="Registration"><i class="fas fa-user-plus"></i> Registration</a>
                    </li>
                <?php endif; ?>
                <?php if (session()->has('user_id')) : ?>
                    <li class="nav-item">
                        <a class="nav-link"  aria-current="page" href="<?php echo base_url('users_data'); ?>" title="users_data "><i class="fas fa-users"></i> UsersData</a>
                    </li>
                <?php endif; ?>
                <?php if (session()->has('user_id')) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('dashboard'); ?>" title="Dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                <?php endif; ?>
                <?php if (session()->has('user_id')) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('upload'); ?>" title="Upload"><i class="fas fa-cloud-upload-alt"></i> Upload</a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="btn-group">
                <?php if (session()->has('user_id')) : ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle fas fa-user"  data-bs-toggle="dropdown" aria-expanded="false">
                        <?php $username = session()->get('username'); echo ucfirst($username);  ?>  
                    </button>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="<?php echo base_url('profile');?>"><i class="fas fa-user"></i> Profile</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url('profile_update');?>"><i class="fas fa-user-edit"></i> Profile Update</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url('change_password');?>"><i class="fas fa-key"></i> Change Password</a></li>             
                </ul>
                <?php endif; ?>

            </div>

            <div class="mx-2">
                <?php if (session()->has('user_id')) : ?>
                    <a class="nav-link" aria-current="page" href="<?php echo base_url('logout');?>">
                        <button class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
</body>
</html>
