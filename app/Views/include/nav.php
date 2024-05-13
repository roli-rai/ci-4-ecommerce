
<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary"> -->
<nav class="navbar navbar-expand-lg" style="background-color: #F6E3FC;">

  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo base_url();?>"><strong class="text-primary">MY PROJECT</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" >
        <?php if (session()->has('id')) : ?>

          <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>" title="Home">Home</a>
        </li>
        <?php endif; ?>

        <?php if (!session()->has('id')) : ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('login'); ?>" title="Login">login</a>
        </li>
        
       
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('registration'); ?>" title="Registration">Registration</a>
        </li>
        <?php endif; ?>
        <?php if (session()->has('id')) : ?>

        <li class="nav-item">
          <a class="nav-link"  aria-current="page" href="<?php echo base_url('users_data'); ?>" title="users_data ">UsersData</a>
        </li>
       
        <?php endif; ?>

        <!-- <li class="nav-item">
          <a class="nav-link"  aria-current="page" href="<?php //echo base_url('index.php/user/contact'); ?>" title="Contact">Contact</a>
        </li> -->
      
        <?php if (session()->has('id')) : ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('dashboard'); ?>" title="Dashboard">Dashboard</a>
        </li>
        <?php endif; ?>
        <?php if (session()->has('id')) : ?>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('upload'); ?>" title="Upload">Upload</a>
        </li>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
           User
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url('profile');?>">Profile</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('profileUpdate');?>">Profile Update</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('change_password');?>">Change Password</a></li>             
            </ul>
            <?php endif; ?>
          </div>
          <div class="mx-2">            
          <?php if (session()->has('id')) : ?>
          <a class="nav-link" aria-current="page" href="<?php echo base_url('logout');?>">
            <button class="btn btn-outline-danger">Logout</button>
          </a>
          <?php endif; ?>
          </div>
        </ul>
    </div>
  </div>
</nav>