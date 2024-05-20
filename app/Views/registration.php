<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERCE Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('include/nav.php'); ?>

    <div class="container my-3 p-4">
        <div class="row justify-content-center p-2"> 
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title text-center">Register</h2>
                        <?php if(isset($success_message)): ?>
                        <div class="alert alert-success">
                            <?= $success_message ?>                                      
                        </div>
                        <?php endif ?>

                       <?php $validation = \Config\Services::validation() ?>                                      

                        <form method="POST" action="<?= base_url('registration'); ?>"> 
                            <div class="mb-3">
                                <label for="username">Username:</label>
                                <input type="text" name="username" class="form-control" required>
                                <div class="text-danger"><?= $validation->getError('username') ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                                <div class="text-danger"><?= $validation->getError('email') ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                                <div class="text-danger"><?= $validation->getError('password') ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                                <div class="text-danger"><?= $validation->getError('confirm_password') ?></div>
                            </div>
                            <button type="submit" class="btn btn-success">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/footer.php'); ?>
</body>
</html>
