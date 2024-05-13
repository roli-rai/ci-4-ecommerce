<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>  
</head>
<body>
<?php include('include/nav.php'); ?>

    <div class="container my-3 p-4">
        <div class="row justify-content-center p-2"> 
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-body">
                    <h2 class="card-title text-center">Register</h2>
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo base_url('registration'); ?>" > 
                        <div class="mb-0">
                            <label for="name">Name:</label><br>
                            <input type="text"  name="name" class="form-control"  required><br>
                        </div>
                        <div class="mb-0">
                            <label for="email">Email:</label><br>
                            <input type="email"  name="email" class="form-control"  required><br>
                        </div>
                        <div class="mb-0">
                            <label for="password">Password:</label><br>
                            <input type="password"  name="password" class="form-control" required><br>
                        </div>
                        <div class="mb-0">
                            <label for="confirm_password">Confirm Password:</label><br>
                            <input type="password"  name="confirm_password" class="form-control" required><br><br>
                        </div>
                        <div class="mb-0">
                            <button type="submit" class ="btn btn-success">Register</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
