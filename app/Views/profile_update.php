<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .error {
            color: red; /* Set error message color to red */
        }
    </style>
</head>
<body>
<?php include('include/nav.php'); ?>
   

    <div class="container my-3 p-4 ">
            <div class="row justify-content-center p-2 "> 
                <div class="col-lg-6 ">
                    <div class="card shadow p-4  bg-primary text-light border-2">
                        <div class="card-body ">
                            <h2 class="card-title text-center ">Update Profile</h2><hr>
                            <?php if(isset($validation)): ?>
                            <div style="color: red;">
                                <?= \Config\Services::validation()->listErrors() ?>
                            </div>
                                <?php endif; ?>
                                <form action="<?php  echo base_url('profileUpdate') ?>" method="post" enctype="multipart/form-data">

                                <label for="name"> Name:</label><br>
                                <input type="text" name="name" value="<?php echo set_value('name'); ?>"><br>
                                
                                <label for="email">Email:</label><br>
                                <input type="email" name="email" value="<?php echo set_value('email'); ?>"><br>
                                <div class="mb-3"> 
                                <input type="submit" class="btn btn-success btn-block m-3 "   value="Update Profile">

                                </div>
                                
                                <?php //echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
   

</body>
</html>
