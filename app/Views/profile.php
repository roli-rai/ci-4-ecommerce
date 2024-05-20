<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERCE - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .profile-placeholder {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #dac;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #aff;
        }
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .card{
            border: 2px solid #ddfe26;        
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
                        <h2 class="card-title text-center">Profile</h2>
                        <hr>
                        <div class="d-flex align-items-top">
                            <div class="me-5">
                                <?php if (!empty($user['profile']) && file_exists('uploads/profile/' . $user['profile'])): ?>
                                    <img src="<?= base_url('uploads/profile/' . $user['profile']) ?>" alt="Profile Image" class="profile-image">
                                <?php else: ?>
                                    <div class="profile-placeholder">
                                        <span><?= substr($user['username'], 0, 1) ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <div class="profile-info mb-2">
                                    <strong>Username:</strong> <?= $user['username'] ?>
                                </div>
                                <div class="profile-info mb-2">
                                    <strong>Email:</strong> <?= $user['email'] ?>
                                </div>
                                <div class="profile-info mb-2">
                                    <strong>Country:</strong> <?= $details['country'] ?>
                                </div>
                                <div class="profile-info mb-2">
                                    <strong>State:</strong> <?= $details['state'] ?>
                                </div>
                                <div class="profile-info mb-2">
                                    <strong>District:</strong> <?= $details['district'] ?>
                                </div>
                                <div class="profile-info mb-2">
                                    <strong>Pincode:</strong> <?= $details['pincode'] ?>
                                </div>
                                <div class="profile-info mb-2">
                                    <strong>Mobile:</strong> <?= $details['mobile'] ?>
                                </div>
                                <div class="profile-info mb-2">
                                    <strong>Local Address:</strong> <?= $details['local_address'] ?>
                                </div>
                                <div class="profile-info mb-2">
                                    <strong>Permanent Address:</strong> <?= $details['permanent_address'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php'); ?>
</body>
</html>
