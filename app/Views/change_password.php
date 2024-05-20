<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERCE - Change_Password</title>
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
                        <h1>Change Password</h1>
                        <form action="change_password " method="post">
                                                     
                            <div class="input-group mb-3"><span class="input-group-text">
                                <input class="form-control" required type="password" placeholder="new_password" name="new_password" id="new_password" >
                            </div>
                            <div class="input-group mb-4"><span class="input-group-text">                                       
                                <input class="form-control" required type="password" placeholder="confirm_password" name="confirm_password" id="confirm_password">
                            </div>
                            <button class="btn btn-primary px-4" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/footer.php'); ?>

</body>
</html>

       