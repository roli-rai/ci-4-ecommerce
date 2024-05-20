<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php include(APPPATH . 'Views/include/nav.php'); ?>

    <div class="container mt-3">
        <h1 class="text-center mb-6">List of Users</h1>
       
<div class="row">
    <div class="col-sm-2">
        <div class="list-group">
            <a href="<?= base_url('admin/users_data')?>" class="list-group-item list-group-item-action active">Users</a>
        </div>
    </div>
</div>

    </div>
    <?php include(APPPATH . 'Views/include/footer.php'); ?>


</body>
</html>
