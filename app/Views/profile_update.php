<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ECOMMERCE Update Profile</title>
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

    <div class="container my-3 p-4">
        <div class="row justify-content-center p-2">
            <div class="col-lg-8">
                <div class="card shadow p-4 text-dark border-2">
                    <div class="card-body">
                        <h2 class="card-title text-center">Update Profile</h2>
                        <hr>
                        <?php if (isset($validation)): ?>
                            <div class="alert alert-danger">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($errors)): ?>
                            <div class="alert alert-danger">
                                <?= implode(', ', $errors) ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?= base_url('profile_update') ?>" method="post" enctype="multipart/form-data" class="row g-3">
                            <div class="col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" name="country" value="<?= set_value('country', isset($user['country']) ? $user['country'] : '') ?>" id="country">
                            </div>
                            <div class="col-md-6">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" name="state" value="<?= set_value('state', isset($user['state']) ? $user['state'] : '') ?>" id="state">
                            </div>
                            <div class="col-md-6">
                                <label for="district" class="form-label">District</label>
                                <input type="text" class="form-control" name="district" value="<?= set_value('district', isset($user['district']) ? $user['district'] : '') ?>" id="district">
                            </div>
                            <div class="col-md-6">
                                <label for="pincode" class="form-label">Pincode</label>
                                <input type="text" class="form-control" name="pincode" value="<?= set_value('pincode', isset($user['pincode']) ? $user['pincode'] : '') ?>" id="pincode">
                            </div>
                            <div class="col-md-6">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" name="mobile" value="<?= set_value('mobile', isset($user['mobile']) ? $user['mobile'] : '') ?>" id="mobile">
                            </div>
                            <div class="col-12">
                                <label for="local_address" class="form-label">Local Address</label>
                                <input type="text" class="form-control" name="local_address" value="<?= set_value('local_address', isset($user['local_address']) ? $user['local_address'] : '') ?>" id="local_address">
                            </div>
                            <div class="col-12">
                                <label for="permanent_address" class="form-label">Permanent Address</label>
                                <input type="text" class="form-control" name="permanent_address" value="<?= set_value('permanent_address', isset($user['permanent_address']) ? $user['permanent_address'] : '') ?>" id="permanent_address">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php'); ?>
</body>
</html>
